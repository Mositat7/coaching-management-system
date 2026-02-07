# کامیت جداگانه برای هر ویوی تغییر یافته (استفاده از اَسِت لوکال به‌جای CDN)
# اجرا: اول برو تو coaching بعد اسکریپت رو بزن:
#   cd coaching
#   .\scripts\commit-views-offline.ps1
# اگر index.lock بود: از پوشه management-system حذفش کن: Remove-Item ..\.git\index.lock -Force

# ریشه ریپو = یک پوشه بالاتر از coaching
$coachingDir = if ($PSScriptRoot) { $PSScriptRoot -replace '\\scripts$','' } else { (Get-Location).Path }
$root = (Get-Item $coachingDir).Parent.FullName
if (-not (Test-Path "$root\.git")) {
    $root = "c:\xampp\htdocs\management-system"
}
Set-Location $root

$commits = @(
    @{ path = "coaching/resources/views/admin/auth/coach-login.blade.php"; msg = "refactor(views): coach-login use local assets instead of CDN" },
    @{ path = "coaching/resources/views/admin/auth/coach-verify.blade.php"; msg = "refactor(views): coach-verify use local assets instead of CDN" },
    @{ path = "coaching/resources/views/layouts/auth.blade.php"; msg = "refactor(views): auth layout use local assets instead of CDN" },
    @{ path = "coaching/resources/views/admin/plans/workout/create.blade.php"; msg = "refactor(views): workout create use local icons instead of CDN" },
    @{ path = "coaching/resources/views/admin/plans/workout/show.blade.php"; msg = "refactor(views): workout show use local avatar instead of ui-avatars" },
    @{ path = "coaching/resources/views/admin/plans/nutrition/show.blade.php"; msg = "refactor(views): nutrition show use local avatar instead of ui-avatars" },
    @{ path = "coaching/resources/views/admin/plans/list.blade.php"; msg = "refactor(views): plans list use local avatars instead of ui-avatars" },
    @{ path = "coaching/resources/views/admin/plans/assign.blade.php"; msg = "refactor(views): plans assign use local avatars instead of ui-avatars" }
)

Write-Host "Repo root: $root" -ForegroundColor Cyan
foreach ($c in $commits) {
    $fullPath = Join-Path $root $c.path
    if (Test-Path $fullPath) {
        git add $c.path
        git commit -m $c.msg
        if ($LASTEXITCODE -ne 0) {
            Write-Host "Failed: $($c.path)" -ForegroundColor Red
            break
        }
        Write-Host "Committed: $($c.path)" -ForegroundColor Green
    } else {
        Write-Host "Skip (not found): $($c.path)" -ForegroundColor Yellow
    }
}

Write-Host "Done."
