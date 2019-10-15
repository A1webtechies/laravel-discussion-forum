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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum', 'ForumController@index')->name('home');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('github/redirect', 'Auth\LoginController@handleProviderCallback');
Route::get('channel/{slug}', [
    'uses' => 'ForumController@channel',
    'as' => 'channel'
]);
Route::get('discussion/{slug}', [
    'uses' => 'DiscussionController@show',
    'as' => 'discussion'
]);
Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelController');

    Route::get('discussion/create/new', [
        'uses' => 'DiscussionController@create',
        'as' => 'discussion.create'

    ]);

    Route::post('discussion/store', [
        'uses' => 'DiscussionController@store',
        'as' => 'discussion.store'
    ]);

    Route::post('discussion/reply/{id}', [
        'uses' => 'DiscussionController@reply',
        'as' => 'discussion.reply'
    ]);
    Route::get('/reply/like/{id}', [
        'uses' => 'RepliesController@like',
        'as' => 'reply.like'
    ]);
    Route::get('/reply/unlike/{id}', [
        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);

    Route::get('/discussion/watch/{id}', [
        'uses' => 'WatcherController@watch',
        'as' => 'discussion.watch'
    ]);
    Route::get('/discussion/unwatch/{id}', [
        'uses' => 'WatcherController@unwatch',
        'as' => 'discussion.unwatch'
    ]);
    Route::get('/reply/best/{id}', [
        'uses' => 'RepliesController@markBest',
        'as' => 'reply.mark'
    ]);
});
