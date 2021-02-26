<?php

use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\SearchFeedbackController;
use Illuminate\Support\Facades\Route;
use Statamic\Facades\Site;
use Statamic\Statamic;

Statamic::booted(function () {
    Route::name('latest-version.')->group(function () {
        $latestVersion = Site::get('v2.2');

        Route::redirect('/{any}', url($latestVersion->url(), request()->segment(1)), 301);
        Route::redirect('/tags/{any}', url($latestVersion->url(), request()->segment(1)), 301);
    });

    foreach (Site::all() as $site) {
        Route::name($site->handle().'.')->prefix($site->handle())->group(function () {
            Route::get('/changelog', [ChangelogController::class, 'show'])->name('changelog');
        });
    }
});

Route::redirect('/github', 'https://github.com/doublethreedigital/simple-commerce');
Route::redirect('/discord', 'https://github.com/doublethreedigital/simple-commerce/discussions');

Route::post('/search-feedback', [SearchFeedbackController::class, 'store']);

Route::statamic('/sitemap.xml', 'sitemap', [
    'layout' => null,
    'content_type' => 'xml',
]);
