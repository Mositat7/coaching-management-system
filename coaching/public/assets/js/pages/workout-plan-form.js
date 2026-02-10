/**
 * فرم ساخت و ویرایش برنامه ورزشی (Workouts-add / Workouts-edit)
 * وابسته به: window.exerciseLibraryFromServer, window.plansStoreUrl, window.plansStoreToken,
 *            window.plansAssignUrl, window.plansLibraryUrl, window.initialPlanState,
 *            window.plansUpdateUrl, window.editingPlanId
 */
(function() {
    'use strict';

    const DAY_NAMES = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنج‌شنبه', 'جمعه'];

    let programState = {
        currentDay: 0,
        days: {},
        exerciseCount: 0,
        draggedExercise: null
    };

    function showToast(message, type) {
        type = type || 'info';
        const toast = document.createElement('div');
        toast.className = 'toast align-items-center text-bg-' + type + ' border-0 position-fixed top-0 end-0 m-3';
        toast.style.zIndex = '9999';
        toast.innerHTML = '<div class="d-flex"><div class="toast-body">' + message + '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div>';
        document.body.appendChild(toast);
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        toast.addEventListener('hidden.bs.toast', function() { toast.remove(); });
    }

    function parseRestToSeconds(val) {
        if (!val) return null;
        val = String(val).trim().toLowerCase();
        var num = parseInt(val, 10);
        if (!isNaN(num)) return num;
        if (val.indexOf('s') !== -1) return parseInt(val, 10) || null;
        if (val.indexOf('m') !== -1) return (parseInt(val, 10) || 0) * 60;
        return null;
    }

    function getLibraryExercises() {
        if (window.exerciseLibraryFromServer && window.exerciseLibraryFromServer.length > 0) {
            return window.exerciseLibraryFromServer.map(function(ex) {
                return { id: ex.id, name: ex.name, muscle: ex.muscle || '—', sub_group: ex.sub_group || '', difficulty: 'medium' };
            });
        }
        return [
            { id: null, name: 'پرس سینه با هالتر', muscle: 'سینه', sub_group: '', difficulty: 'medium' },
            { id: null, name: 'زیربغل هالتر خم', muscle: 'پشت', sub_group: '', difficulty: 'medium' },
            { id: null, name: 'اسکوات با هالتر', muscle: 'پا', sub_group: '', difficulty: 'hard' },
            { id: null, name: 'پرس سرشانه دمبل', muscle: 'شانه', sub_group: '', difficulty: 'medium' },
            { id: null, name: 'جلوبازو هالتر', muscle: 'بازو', sub_group: '', difficulty: 'easy' },
            { id: null, name: 'پشت بازو سیمکش', muscle: 'بازو', sub_group: '', difficulty: 'easy' },
            { id: null, name: 'لانگز دمبل', muscle: 'پا', sub_group: '', difficulty: 'medium' },
            { id: null, name: 'فیله کمر', muscle: 'پشت', sub_group: '', difficulty: 'easy' },
            { id: null, name: 'کرانچ', muscle: 'میان تنه', sub_group: '', difficulty: 'easy' },
            { id: null, name: 'پول آپ', muscle: 'پشت', sub_group: '', difficulty: 'hard' }
        ];
    }

    function initializeLibrary() {
        var exercises = getLibraryExercises();
        var library = document.getElementById('exercise-library');
        if (!library) return;
        library.innerHTML = '';
        exercises.forEach(function(exercise, index) {
            var item = document.createElement('div');
            item.className = 'exercise-library-item';
            item.draggable = true;
            item.dataset.exerciseIndex = index;
            var sub = exercise.sub_group ? ' • ' + exercise.sub_group : '';
            item.innerHTML = '<div><div class="fw-medium">' + exercise.name + '</div><small class="text-muted">' + exercise.muscle + sub + '</small></div><button class="btn btn-sm btn-outline-primary" type="button" data-add-index="' + index + '"><i class="ri-add-line"></i></button>';
            item.addEventListener('dragstart', function(e) { e.dataTransfer.setData('exerciseIndex', index); });
            item.querySelector('[data-add-index]').addEventListener('click', function() { addLibraryExercise(index); });
            library.appendChild(item);
        });
    }

    function addLibraryExercise(index) {
        var exercises = getLibraryExercises();
        var ex = exercises[index];
        if (!ex) return;
        addExerciseToDOM({ name: ex.name, workoutExerciseId: ex.id || null });
        showToast('تمرین اضافه شد', 'success');
    }

    function saveCurrentDayToState() {
        var dayIndex = programState.currentDay;
        if (!programState.days[dayIndex]) programState.days[dayIndex] = { exercises: [], duration_minutes: 60, difficulty: 'easy', notes: '', title: '', focus: '' };
        var container = document.getElementById('exercises-container');
        if (!container) return;
        var cards = container.querySelectorAll('.exercise-card');
        programState.days[dayIndex].exercises = [];
        cards.forEach(function(card) {
            var titleEl = card.querySelector('.exercise-title');
            var setsInput = card.querySelectorAll('.quick-input')[0];
            var repsInput = card.querySelectorAll('.quick-input')[1];
            var restInput = card.querySelector('.input-group input');
            var notesEl = card.querySelector('.mt-2 textarea, textarea[placeholder*="نکات"]');
            programState.days[dayIndex].exercises.push({
                name: titleEl ? titleEl.value : '',
                workout_exercise_id: card.dataset.workoutExerciseId || null,
                custom_name: titleEl && !card.dataset.workoutExerciseId ? titleEl.value : null,
                sets_count: setsInput ? (parseInt(setsInput.value, 10) || 3) : 3,
                reps_text: repsInput ? repsInput.value : '',
                rest_seconds: parseRestToSeconds(restInput ? restInput.value : ''),
                notes: notesEl ? notesEl.value : ''
            });
        });
        var durEl = document.getElementById('day-duration');
        var notesEl = document.getElementById('day-notes');
        var titleEl = document.getElementById('day-title-input');
        var focusEl = document.getElementById('day-focus');
        var diffRadio = document.querySelector('input[name="dayDifficulty"]:checked');
        programState.days[dayIndex].duration_minutes = durEl ? (parseInt(durEl.value, 10) || 60) : 60;
        programState.days[dayIndex].notes = notesEl ? notesEl.value : '';
        programState.days[dayIndex].title = titleEl ? titleEl.value : '';
        programState.days[dayIndex].focus = focusEl ? focusEl.value : '';
        programState.days[dayIndex].difficulty = diffRadio ? diffRadio.value || 'medium' : 'medium';
    }

    function loadDaySettings(dayIndex) {
        var d = programState.days[dayIndex] || {};
        var durEl = document.getElementById('day-duration');
        var notesEl = document.getElementById('day-notes');
        var titleEl = document.getElementById('day-title-input');
        var focusEl = document.getElementById('day-focus');
        if (durEl) durEl.value = d.duration_minutes ?? 60;
        if (notesEl) notesEl.value = d.notes ?? '';
        if (titleEl) titleEl.value = d.title ?? '';
        if (focusEl) focusEl.value = d.focus ?? '';
        var diff = d.difficulty || 'easy';
        var r = document.querySelector('input[name="dayDifficulty"][value="' + diff + '"]');
        if (r) r.checked = true;
    }

    function updateDayCount(dayIndex) {
        var count = (programState.days[dayIndex] && programState.days[dayIndex].exercises) ? programState.days[dayIndex].exercises.length : 0;
        var el = document.querySelector('.day-count[data-day="' + dayIndex + '"]');
        if (el) el.textContent = count + ' تمرین';
    }

    function loadDayExercises(dayIndex) {
        var container = document.getElementById('exercises-container');
        if (!container) return;
        container.innerHTML = '';
        if (programState.days[dayIndex] && programState.days[dayIndex].exercises) {
            programState.days[dayIndex].exercises.forEach(function(exercise) { addExerciseToDOM(exercise); });
        }
    }

    function addExerciseToDOM(exerciseData) {
        exerciseData = exerciseData || {};
        var template = document.getElementById('exercise-template');
        if (!template) return null;
        var clone = template.content.cloneNode(true);
        var exerciseCard = clone.querySelector('.exercise-card');
        if (!exerciseCard) return null;
        var workoutExId = exerciseData.workoutExerciseId != null ? exerciseData.workoutExerciseId : exerciseData.workout_exercise_id;
        if (workoutExId != null) exerciseCard.dataset.workoutExerciseId = workoutExId;
        if (exerciseData.name) {
            var titleEl = exerciseCard.querySelector('.exercise-title');
            if (titleEl) titleEl.value = exerciseData.name;
        }
        var qInputs = exerciseCard.querySelectorAll('.quick-input');
        if (exerciseData.sets_count && qInputs[0]) qInputs[0].value = exerciseData.sets_count;
        if (exerciseData.reps_text && qInputs[1]) qInputs[1].value = exerciseData.reps_text;
        var restInput = exerciseCard.querySelector('.input-group input');
        if (restInput && exerciseData.rest_seconds != null) restInput.value = exerciseData.rest_seconds + 's';
        var notesTa = exerciseCard.querySelector('.mt-2 textarea, textarea[placeholder*="نکات"]');
        if (notesTa && exerciseData.notes) notesTa.value = exerciseData.notes;
        exerciseCard.addEventListener('dragstart', handleExerciseDragStart);
        exerciseCard.addEventListener('dragover', handleExerciseDragOver);
        exerciseCard.addEventListener('drop', handleExerciseDrop);
        exerciseCard.addEventListener('dragend', handleExerciseDragEnd);
        document.getElementById('exercises-container').appendChild(exerciseCard);
        exerciseCard.style.animation = 'fadeIn 0.5s ease-out';
        updateStats();
        return exerciseCard;
    }

    function removeExercise(button) {
        if (!confirm('آیا از حذف این تمرین مطمئن هستید؟')) return;
        var exerciseCard = button.closest('.exercise-card');
        if (!exerciseCard) return;
        exerciseCard.style.animation = 'fadeOut 0.3s ease-out';
        setTimeout(function() {
            exerciseCard.remove();
            updateStats();
            showToast('تمرین حذف شد', 'warning');
        }, 300);
    }

    function duplicateExercise(button) {
        var exerciseCard = button.closest('.exercise-card');
        if (!exerciseCard) return;
        var clone = exerciseCard.cloneNode(true);
        clone.querySelector('.exercise-title').value += ' (کپی)';
        exerciseCard.after(clone);
        updateStats();
        showToast('تمرین کپی شد', 'success');
    }

    function handleExerciseDragStart(e) {
        programState.draggedExercise = this;
        this.classList.add('dragging');
        e.dataTransfer.effectAllowed = 'move';
    }

    function handleExerciseDragOver(e) {
        e.preventDefault();
        this.classList.add('drag-over');
    }

    function handleExerciseDrop(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
        if (programState.draggedExercise && programState.draggedExercise !== this) {
            var container = this.closest('#exercises-container');
            if (!container) return;
            var draggedIndex = Array.from(container.children).indexOf(programState.draggedExercise);
            var dropIndex = Array.from(container.children).indexOf(this);
            if (draggedIndex < dropIndex) this.after(programState.draggedExercise);
            else this.before(programState.draggedExercise);
            showToast('ترتیب تمرین تغییر کرد', 'info');
        }
    }

    function handleExerciseDragEnd() {
        this.classList.remove('dragging');
        programState.draggedExercise = null;
    }

    function updateStats() {
        var container = document.getElementById('exercises-container');
        var exercises = container ? container.querySelectorAll('.exercise-card').length : 0;
        var statEx = document.getElementById('stat-exercises');
        var statSets = document.getElementById('stat-sets');
        if (statEx) statEx.textContent = exercises;
        if (statSets) statSets.textContent = document.querySelectorAll('.set-row').length;
        var dayCountEl = document.querySelector('.day-count[data-day="' + programState.currentDay + '"]');
        if (dayCountEl) dayCountEl.textContent = exercises + ' تمرین';
    }

    function updateCompletionProgress() {
        var progressBar = document.getElementById('completion-progress');
        var progressText = document.getElementById('completion-text');
        if (!progressBar || !progressText) return;
        var filledFields = document.querySelectorAll('input[value], textarea[value], select option:checked').length;
        var progress = Math.min(100, Math.round((filledFields / 10) * 100));
        progressBar.style.width = progress + '%';
        progressText.textContent = progress + '٪ تکمیل شده';
        progressBar.classList.remove('bg-warning', 'bg-success', 'bg-danger');
        if (progress < 30) progressBar.classList.add('bg-danger');
        else if (progress < 70) progressBar.classList.add('bg-warning');
        else progressBar.classList.add('bg-success');
    }

    function selectDay(dayIndex, dayName) {
        saveCurrentDayToState();
        document.querySelectorAll('.day-tab').forEach(function(tab) { tab.classList.remove('active'); });
        var tab = document.querySelector('.day-tab[data-day="' + dayIndex + '"]');
        if (tab) tab.classList.add('active');
        programState.currentDay = dayIndex;
        var header = document.getElementById('current-day-header');
        if (header) header.style.display = 'block';
        var titleEl = document.getElementById('current-day-title');
        if (titleEl) titleEl.textContent = dayName;
        loadDayExercises(dayIndex);
        loadDaySettings(dayIndex);
        updateDayCount(dayIndex);
        updateCompletionProgress();
    }

    function hydrateFromInitialPlan() {
        var s = window.initialPlanState;
        if (!s) return;
        programState.name = s.name || '';
        programState.description = s.description || '';
        var nameInput = document.querySelector('input[placeholder*="نام برنامه"]');
        if (nameInput) nameInput.value = s.name || '';
        var descEl = document.querySelector('textarea[placeholder*="توضیحات"]');
        if (descEl) descEl.value = s.description || '';
        var weeksEl = document.getElementById('weeks-count-input');
        if (weeksEl) weeksEl.value = s.weeks_count ?? 4;
        var levelEl = document.getElementById('level-input');
        if (levelEl) levelEl.value = s.level || 'medium';
        var caloriesEl = document.getElementById('estimated-calories-input');
        if (caloriesEl) caloriesEl.value = (s.estimated_calories != null ? s.estimated_calories : '');
        var equipmentEl = document.getElementById('equipment-input');
        if (equipmentEl) equipmentEl.value = s.equipment || '';
        var safetyEl = document.getElementById('safety-notes-input');
        if (safetyEl) safetyEl.value = s.safety_notes || '';
        (s.days || []).forEach(function(d) {
            programState.days[d.day_index] = {
                day_index: d.day_index,
                title: d.title || null,
                focus: d.focus || null,
                duration_minutes: d.duration_minutes ?? 60,
                difficulty: d.difficulty || 'medium',
                notes: d.notes || null,
                exercises: (d.exercises || []).map(function(e) {
                    return {
                        workout_exercise_id: e.workout_exercise_id,
                        custom_name: e.custom_name,
                        name: e.name,
                        sets_count: e.sets_count ?? 3,
                        reps_text: e.reps_text || null,
                        rest_seconds: e.rest_seconds ?? null,
                        notes: e.notes || null
                    };
                })
            };
        });
        var firstDayIndex = (s.days && s.days.length) ? s.days[0].day_index : 0;
        programState.currentDay = firstDayIndex;
        document.querySelectorAll('.day-tab').forEach(function(tab) {
            tab.classList.remove('active');
            if (parseInt(tab.dataset.day, 10) === firstDayIndex) tab.classList.add('active');
        });
        var header = document.getElementById('current-day-header');
        if (header) header.style.display = 'block';
        var titleEl = document.getElementById('current-day-title');
        if (titleEl) titleEl.textContent = DAY_NAMES[firstDayIndex];
        loadDayExercises(firstDayIndex);
        loadDaySettings(firstDayIndex);
        for (var i = 0; i < 7; i++) {
            var count = (programState.days[i] && programState.days[i].exercises) ? programState.days[i].exercises.length : 0;
            var el = document.querySelector('.day-count[data-day="' + i + '"]');
            if (el) el.textContent = count + ' تمرین';
        }
    }

    function collectProgramData() {
        var nameEl = document.querySelector('input[placeholder*="نام برنامه"]');
        var descEl = document.querySelector('textarea[placeholder*="توضیحات اختیاری"]');
        var equipmentEl = document.getElementById('equipment-input');
        var safetyEl = document.getElementById('safety-notes-input');
        var weeksEl = document.getElementById('weeks-count-input');
        var levelEl = document.getElementById('level-input');
        var caloriesEl = document.getElementById('estimated-calories-input');
        var days = [];
        for (var i = 0; i < 7; i++) {
            var d = programState.days[i] || {};
            days.push({
                day_index: i,
                title: d.title || null,
                focus: d.focus || null,
                duration_minutes: d.duration_minutes ?? 60,
                difficulty: d.difficulty || 'medium',
                notes: d.notes || null,
                exercises: (d.exercises || []).map(function(ex) {
                    return {
                        workout_exercise_id: ex.workout_exercise_id ? parseInt(ex.workout_exercise_id, 10) : null,
                        custom_name: ex.custom_name || ex.name || null,
                        sets_count: ex.sets_count ?? 3,
                        reps_text: ex.reps_text || null,
                        rest_seconds: ex.rest_seconds ?? null,
                        notes: ex.notes || null
                    };
                })
            });
        }
        return {
            name: nameEl ? nameEl.value.trim() : '',
            description: descEl ? descEl.value.trim() : '',
            weeks_count: weeksEl ? (parseInt(weeksEl.value, 10) || 4) : 4,
            level: levelEl ? levelEl.value : 'medium',
            estimated_calories: caloriesEl && caloriesEl.value.trim() ? parseInt(caloriesEl.value, 10) : null,
            equipment: equipmentEl ? equipmentEl.value.trim() : '',
            safety_notes: safetyEl ? safetyEl.value.trim() : '',
            days: days
        };
    }

    function submitProgram(redirectAfter) {
        saveCurrentDayToState();
        var programData = collectProgramData();
        var nameInput = document.querySelector('input[placeholder*="نام برنامه"]');
        if (!programData.name || !programData.name.trim()) {
            showToast('نام برنامه را وارد کنید.', 'danger');
            if (nameInput) nameInput.focus();
            return;
        }
        var isEdit = !!window.editingPlanId;
        var url = isEdit ? window.plansUpdateUrl : window.plansStoreUrl;
        var method = isEdit ? 'PUT' : 'POST';
        showToast(isEdit ? 'در حال به‌روزرسانی برنامه...' : 'در حال ذخیره برنامه...', 'info');
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.plansStoreToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(programData)
        })
        .then(function(r) {
            if (r.ok || r.redirected) {
                showToast(isEdit ? 'برنامه با موفقیت به‌روزرسانی شد.' : 'برنامه با موفقیت ذخیره شد.', 'success');
                if (redirectAfter) {
                    if (isEdit && window.plansLibraryUrl) window.location.href = window.plansLibraryUrl;
                    else if (window.plansAssignUrl) window.location.href = window.plansAssignUrl;
                }
                return;
            }
            return r.text().then(function(text) {
                var err = { message: isEdit ? 'خطا در به‌روزرسانی.' : 'خطا در ذخیره.' };
                try { err = JSON.parse(text); } catch (e) {}
                throw { message: err.message || (err.errors && Object.values(err.errors).flat().join(' ')) || text };
            });
        })
        .catch(function(err) {
            showToast(err && err.message ? err.message : (isEdit ? 'خطا در به‌روزرسانی.' : 'خطا در ذخیره.'), 'danger');
        });
    }

    function previewProgram() {
        var programData = collectProgramData();
        var w = window.open('', '_blank');
        if (w) w.document.write('<html><head><title>پیش‌نمایش برنامه</title><style>body{font-family:system-ui;padding:20px;}</style></head><body><h1>پیش‌نمایش: ' + (programData.name || '') + '</h1><p>' + (programData.description || 'بدون توضیحات') + '</p></body></html>');
    }

    function addCustomDay() { showToast('روز سفارشی از تب‌های بالا انتخاب کنید.', 'info'); }
    function markDayComplete() { showToast('روز به عنوان تکمیل علامت زده شد.', 'success'); }
    function showExerciseModal() { addExerciseToDOM({}); showToast('تمرین خالی اضافه شد.', 'info'); }
    function openLibrary() {
        var card = document.querySelector('.col-xl-3 .card:nth-child(2)');
        if (card) card.scrollIntoView({ behavior: 'smooth' });
    }
    function addQuickExercise() { addExerciseToDOM({}); }
    function showStats() { updateStats(); showToast('آمار به‌روز شد.', 'info'); }
    function addSet() { showToast('افزودن ست به نسخه‌های بعدی اضافه می‌شود.', 'info'); }
    function editExerciseSets() { showToast('ویرایش ست‌ها به زودی.', 'info'); }
    function scrollToTop() { window.scrollTo({ top: 0, behavior: 'smooth' }); }
    function updateDayFocus() {}
    function updateDayStats() {}

    window.workoutPlanForm = {
        selectDay: selectDay,
        saveProgram: function() { submitProgram(false); },
        sendProgram: function() { submitProgram(true); },
        addExerciseToDOM: addExerciseToDOM,
        removeExercise: removeExercise,
        duplicateExercise: duplicateExercise,
        addLibraryExercise: addLibraryExercise,
        clearCurrentDay: function() {
            if (!confirm('پاک کردن تمام تمرینات این روز؟')) return;
            saveCurrentDayToState();
            programState.days[programState.currentDay].exercises = [];
            loadDayExercises(programState.currentDay);
            loadDaySettings(programState.currentDay);
            updateStats();
            updateDayCount(programState.currentDay);
            showToast('روز خالی شد.', 'warning');
        },
        filterExercises: function(q) {
            var lib = document.getElementById('exercise-library');
            if (!lib) return;
            q = (q || '').toLowerCase();
            lib.querySelectorAll('.exercise-library-item').forEach(function(el) {
                el.style.display = q ? (el.textContent.toLowerCase().indexOf(q) !== -1 ? '' : 'none') : '';
            });
        },
        showAllExercises: function() { window.workoutPlanForm.filterExercises(''); },
        refreshLibrary: function() { initializeLibrary(); showToast('کتابخانه به‌روز شد.', 'info'); },
        previewProgram: previewProgram,
        updateProgramName: function(v) { programState.name = v; },
        updateProgramDescription: function(v) { programState.description = v; },
        addCustomDay: addCustomDay,
        markDayComplete: markDayComplete,
        showExerciseModal: showExerciseModal,
        openLibrary: openLibrary,
        addQuickExercise: addQuickExercise,
        showStats: showStats,
        addSet: addSet,
        editExerciseSets: editExerciseSets,
        scrollToTop: scrollToTop,
        updateDayFocus: updateDayFocus,
        updateDayStats: updateDayStats
    };

    function handleDrop(e) {
        e.preventDefault();
        e.currentTarget.classList.remove('drag-over');
        var idx = e.dataTransfer.getData('exerciseIndex');
        if (idx !== '') addLibraryExercise(parseInt(idx, 10));
    }

    function handleDragOver(e) {
        e.preventDefault();
        e.currentTarget.classList.add('drag-over');
    }

    document.addEventListener('DOMContentLoaded', function() {
        initializeLibrary();
        if (window.initialPlanState) hydrateFromInitialPlan();
        else selectDay(0, DAY_NAMES[0]);
        updateStats();

        document.querySelectorAll('input, textarea, select').forEach(function(el) {
            el.addEventListener('input', updateCompletionProgress);
            el.addEventListener('change', updateCompletionProgress);
        });

        var addArea = document.querySelector('.add-exercise-area');
        if (addArea) {
            addArea.addEventListener('dragover', handleDragOver);
            addArea.addEventListener('drop', handleDrop);
        }
    });
})();
