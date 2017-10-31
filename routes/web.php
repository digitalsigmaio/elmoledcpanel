<?php

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




Route::get('/welcome', function () {
    return view('welcome');
});


/* Artist routes */
Route::get('/artists', 'ArtistController@index')->name('artists');
Route::get('/artistList', 'ArtistController@artistList')->name('artistList');
Route::get('/artist', 'ArtistController@newArtist')->name('newArtist');
Route::post('/artist', 'ArtistController@store');
Route::post('/artistSearch', 'ArtistController@search')->name('artistSearch');
Route::get('/artist/{id}', 'ArtistController@editArtist');
Route::post('/artist/{id}', 'ArtistController@update');
Route::get('/artist/{id}/delete', 'ArtistController@delete');

/* Album routes */
Route::get('/albums', 'AlbumController@index')->name('albums');
Route::get('/albumList', 'AlbumController@albumList')->name('albumList');
Route::get('/album', 'AlbumController@newAlbum')->name('newAlbum');
Route::post('/album', 'AlbumController@store');
Route::post('/albumSearch', 'AlbumController@search')->name('albumSearch');
Route::get('/album/{id}/delete', 'AlbumController@delete');
Route::get('/album/{id}', 'AlbumController@editAlbum');
Route::post('/album/{id}', 'AlbumController@update');

/* Track routes */
Route::get('/tracks', 'TrackController@index')->name('tracks');
Route::get('/trackList', 'TrackController@trackList')->name('trackList');
Route::get('/track', 'TrackController@newTrack')->name('newTrack');
Route::post('/track', 'TrackController@store');
Route::post('/trackSearch', 'TrackController@search')->name('trackSearch');
Route::get('/track/{id}/delete', 'TrackController@delete');
Route::get('/track/{id}', 'TrackController@editTrack');
Route::post('/track/{id}', 'TrackController@update');

/* User routes */
Route::get('/', 'UserController@index')->name('home');


Route::get('/login', 'UserController@loginForm')->name('login');
Route::get('/register', 'UserController@register')->name('register');

Route::post('/login', 'UserController@signin')->name('signin');
Route::post('register', 'UserController@store')->name('signup');

Route::get('logout', 'UserController@logout')->name('logout');
