<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {

/*
* This is the main app route 
*/
Route::get('/chat', [MessagesController::class, 'index'])->name('chat');

/**
 *  Fetch info for specific id [user/group]
 */
    Route::group(['prefix' => 'chat'], function () {
    Route::post('/idInfo', [MessagesController::class,'idFetchData']);

    /**
     * Send message route
     */
    Route::post('/sendMessage', [MessagesController::class,'send'])->name('send.message');

    /**
     * Fetch messages 
     */
    Route::post('/fetchMessages', [MessagesController::class,'fetch'])->name('fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', [MessagesController::class,'download'])->name('attachments.download');

    /**
     * Authintication for pusher private channels
     */
    Route::post('/chat/auth', [MessagesController::class,'pusherAuth'])->name('pusher.auth');

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', [MessagesController::class,'seen'])->name('messages.seen');

    /**
     * Get contacts
     */
    Route::post('/getContacts', [MessagesController::class,'getContacts'])->name('contacts.get');

    /**
     * Update contact item data
     */
    Route::post('/updateContacts', [MessagesController::class,'updateContactItem'])->name('contacts.update');


    /**
     * Star in favorite list
     */
    Route::post('/star', [MessagesController::class,'favorite'])->name('star');

    /**
     * get favorites list
     */
    Route::post('/favorites', [MessagesController::class,'getFavorites'])->name('favorites');

    /**
     * Search in messenger
     */
    Route::post('/search', [MessagesController::class,'search'])->name('search');

    /**
     * Get shared photos
     */
    Route::post('/shared', [MessagesController::class,'sharedPhotos'])->name('shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', [MessagesController::class,'deleteConversation'])->name('conversation.delete');

    /**
     * Delete Conversation
     */
    Route::post('/updateSettings', [MessagesController::class,'updateSettings'])->name('avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', [MessagesController::class,'setActiveStatus'])->name('activeStatus.set');






    /*
    * [Group] view by id
    */
    Route::get('/group/{id}', [MessagesController::class,'index'])->name('group');

    /*
    * user view by id.
    * Note : If you added routes after the [User] which is the below one,
    * it will considered as user id.
    *
    * e.g. - The commented routes below :
    */
    // Route::get('/route', function(){ return 'Munaf'; }); // works as a route
    Route::get('/{id}', [MessagesController::class,'index'])->name('user');
    // Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
    });
});

