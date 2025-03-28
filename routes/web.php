<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\Filament;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ReferrerController;
use App\Http\Controllers\CouponController;
use Illuminate\Http\Request;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Pa11yUrlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/{any}.html', function () {
    return redirect('/', 301);
})->where('any', '.*');*/

// redirect all logins from filament dashbord logins to centralized login
// Umleitung für /admin/login
/*
Route::get('/admin/login', function () {
    return redirect('/login');
})->name('login.show');


// Umleitung für /dashboard/login
Route::get('/dashboard/login', function () {
    return redirect('/login');
})->name('filament.admin.auth.login');

Route::get('/dashboard/login', function () {
    return redirect('/login');
})->name('filament.dashboard.auth.login');

Route::get('/dashboard/logout', function () {
    return redirect('/logout');
})->name('filament.admin.auth.logout');


// Route für das Admin-Panel Login
Route::get('/admin/login', function () {
    return redirect('/login');
})->name('filament.admin.auth.login');

// Route für das Dashboard Login
Route::get('/dashboard/login', function () {
    return redirect('/login');
})->name('filament.dashboard.auth.login');

// Route für das Admin-Panel Logout
Route::get('/admin/logout', function () {
    return redirect('/logout');
})->name('filament.admin.auth.logout');

// Route für das Dashboard Logout
Route::get('/dashboard/logout', function () {
    return redirect('/logout');
})->name('filament.dashboard.auth.logout');
*/

// ---


use App\Http\Controllers\PublishStatsController;
//Route::get('/export/csv/{id}', [PublishStatsController::class, 'exportCsv'])->name('export.csv');
Route::middleware(['auth', 'tenantcompany'])->group(function () {
    Route::get('/export/all-issues-csv/{id}', [PublishStatsController::class, 'exportAllIssuesCsv'])->name('all_issues_export.csv');
});
Route::middleware(['auth', 'tenantcompany'])->group(function () {
    Route::get('/export/all-stats-csv/{id}', [PublishStatsController::class, 'exportAllStatsCsv'])->name('all_stats_export.csv');
});

Route::middleware(['auth', 'compurl'])->group(function () {
    Route::get('/export/issues-csv/{id}', [PublishStatsController::class, 'exportIssuesCsv'])->name('issues_export.csv');
});
Route::middleware(['auth', 'compurl'])->group(function () {
    Route::get('/export/stats-csv/{id}', [PublishStatsController::class, 'exportStatsCsv'])->name('stats_export.csv');
});


use App\Http\Controllers\FixsternController;
Route::post('/eztext', [FixsternController::class, 'eztext']);

Route::get('/service/{ulid}/{tool}.js', [ScriptController::class, 'serveScript'])
    ->name('serveScript')
    ->middleware('service');

Route::get('/service/{tool}.css', [ScriptController::class, 'serveCss'])->name('serve.css');

use App\Http\Controllers\TestController;

Route::get('test-artisan-command/{id?}', [TestController::class, 'testArtisanCommand']);
Route::get('test', [TestController::class, 'test']);

// -----------------------------------------------
use App\Http\Controllers\AccessibilityRuleScraperController;

Route::get('/scrape/{ruleId}', [AccessibilityRuleScraperController::class, 'fetchAdditionalData'])->middleware(['auth']);
Route::get('/scrape-update', [AccessibilityRuleScraperController::class, 'updateAllAdditionalData'])->middleware(['auth']);

Route::get('/test-output/{ruleId}', [AccessibilityRuleScraperController::class, 'testOutput'])->middleware(['auth']);
// -----------------------------------------------


use App\Http\Controllers\PublicAccessibilityCheckController;

Route::get('/public-check', [PublicAccessibilityCheckController::class, 'showForm'])->name('accessibility.check.form');
Route::post('/public-check', [PublicAccessibilityCheckController::class, 'check'])->name('accessibility.check');
Route::get('/public-check/progress', [PublicAccessibilityCheckController::class, 'getProgress'])->name('accessibility.check.progress');

// -----------------------------------------------

Route::get('/documents/fixstern-integration/{ulid}', [PdfController::class, 'generateInstruction'])->name('download.instruction')->middleware(['auth']);
// -----------------------------------------------
// pa11y - wcag

Route::post('/pa11y/url/{url}/rescan', [Pa11yUrlController::class, 'rescan'])->name('pa11y.url.rescan');
Route::post('pa11y/urls/rescan/all', [Pa11yUrlController::class, 'rescanAllUrls'])->name('pa11y.urls.rescan.all');
// -----------------------------------------------


Route::post('storeReferrer', [ReferrerController::class, 'storeReferrer'])->name('storeReferrer');
Route::post('storeDownloadReferrer', [ReferrerController::class, 'storeDownloadReferrer'])->name('storeDownloadReferrer');
Route::post('storeTts', [ReferrerController::class, 'storeTts'])->name('storeTts');

Route::post('sitemap/generate', [PageController::class, 'sitemap'])->name('sitemap.generate');

// -----------------------------------------------

Route::get('/subscribe/{company_id}', [NewsletterSubscriptionController::class, 'showForm'])->name('subscribe.show');
Route::post('/store-geolocation', [NewsletterSubscriptionController::class, 'storeGeolocation']);

Route::get('/unsubscribe/{token}', [NewsletterSubscriptionController::class, 'unsubscribe'])->name('subscribe.delete');

Route::post('/subscribe/{company_id}', [NewsletterSubscriptionController::class, 'register'])->name('subscribe.register');

Route::get('/subscription/confirm/{company_id}/{token}', [NewsletterSubscriptionController::class, 'confirm'])->name('subscribe.confirm');

// testroute
Route::get('/showPromo', [QrCodeController::class, 'show'])->name('testQrHelper');

// -----------------------------------------------


//Route::get('/index', [PageController::class, 'getIndex'])->name('index');


Route::get('/dash', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dash');


Route::middleware('auth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

// embed subscribe nl images
Route::get('/promo-src/{ulid}', [QrCodeController::class, 'streamPromoImg'])->name('streamimg');


// theme demo
Route::prefix('assan')->middleware(['auth'])->group(function () {
    Route::get('/{slug}.html', 'App\Http\Controllers\ThemeController@index')->where('slug', '[A-Za-z0-9\-]+');
});
//Route::get('assan', [App\Http\Controllers\ThemeController::class, 'index']);


require __DIR__ . '/auth.php';

require __DIR__ . '/payment.php';

//tinymce image upload
Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');
// ende image upload


Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');


// -----------------------------------------------
// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// -----------------------------------------------
// code einlösen
Route::get('/code/einloesen', [CouponController::class, 'showRedeemForm'])->name('coupon.redeem');
Route::post('/code/einloesen', [CouponController::class, 'redeem'])->name('coupon.redeem');

// -----------------------------------------------
Route::post('/clear-session', function (Request $request) {
    $keys = $request->input('keys');

    if ($keys && is_array($keys))
    {
        foreach ($keys as $key)
        {
            session()->forget($key);
        }

        return response()->json(['status' => 'success', 'message' => 'Session variables removed']);
    }

    return response()->json(['status' => 'error', 'message' => 'No session keys provided or invalid format'], 400);
});
// -----------------------------------------------

Route::get('/{slug}', [PageController::class, 'getIndex'])->name('frontend');
Route::get('/', [PageController::class, 'getIndex'])->name('home');


//Route::get('/home/impressum-page', [PageController::class, 'getIndex'])->name('page.show2');
// Definieren der Route
Route::get('/{segment1?}/{segment2?}/{slug?}', [PageController::class, 'getIndex'])
    ->where('slug', '[^/]+') // Erlaubt alles außer einem Slash
    ->where('segment1', '[^/]+') // Optional: Erlaubt alles außer einem Slash
    ->where('segment2', '[^/]+') // Optional: Erlaubt alles außer einem Slash
    ->name('page.show');
