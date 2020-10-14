<?php

use Illuminate\Support\Facades\Route;

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

Route::statamic('search', 'search');

Route::name('current_release_redirects')->group(function () {
	$currentSite = \Statamic\Facades\Site::get('v2.1');

	Route::redirect('/', $currentSite->url());
	Route::redirect('/installation', $currentSite->url().'/installation');
	Route::redirect('/configuring', $currentSite->url().'/configuring');
	Route::redirect('/gateways', $currentSite->url().'/gateways');
	Route::redirect('/shipping', $currentSite->url().'/shipping');
	Route::redirect('/tags', $currentSite->url().'/tags');
	Route::redirect('/email', $currentSite->url().'/email');
	Route::redirect('/how-it-works', $currentSite->url().'/how-it-works');
	Route::redirect('/knowledge-base/version-control-strategies', $currentSite->url().'/knowledge-base/version-control-strategies');
	Route::redirect('/extending', $currentSite->url().'/how-it-works');
});