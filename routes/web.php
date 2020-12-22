<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Site;
use Statamic\Statamic;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('current_release_redirects')->group(function () {
    $currentSite = array_first(config('statamic.sites.sites'));

    Route::redirect('/', $currentSite['url']);
    Route::redirect('/home', $currentSite['url']);
	Route::redirect('/installation', $currentSite['url'].'installation');
	Route::redirect('/configuring', $currentSite['url'].'configuring');
	Route::redirect('/multi-site', $currentSite['url'].'multi-site');
	Route::redirect('/gateways', $currentSite['url'].'gateways');
	Route::redirect('/shipping', $currentSite['url'].'shipping');
	Route::redirect('/tags', $currentSite['url'].'tags');
	Route::redirect('/email', $currentSite['url'].'email');
	Route::redirect('/how-it-works', $currentSite['url'].'how-it-works');
	Route::redirect('/knowledge-base/version-control-strategies', $currentSite['url'].'knowledge-base/version-control-strategies');
	Route::redirect('/extending', $currentSite['url'].'how-it-works');
	Route::redirect('/product-variants', $currentSite['url'].'product-variants');
});

Statamic::booted(function () {
    foreach (Site::all() as $site) {
        Route::statamic($site->url().'/search', 'search', [
            'title' => 'Search results',
            'site' => $site,
        ]);
    }
});

Route::redirect('/github', 'https://github.com/doublethreedigital/simple-commerce');

Route::statamic('/sitemap.xml', 'sitemap', [
    'layout' => null,
    'content_type' => 'xml',
]);
