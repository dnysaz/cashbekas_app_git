<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'verify' => true
]);

// routing without middleware
Route::get('/', [PageController::class, 'index']);
Route::get('all_page', [PageController::class, 'all_page']);
Route::get('{category}/{location}/{link}/{user_id}', [PageController::class, 'ads_page']);

Route::get('c/{category}', [PageController::class, 'show_category']);
Route::get('l/{location}', [PageController::class, 'show_location']);

// show ads by category and sub category 
Route::get('show_ads/{category}/{sub_category}', [PageController::class, 'show_ads_category']);



Route::post('filter_ads',[PageController::class, 'filter_ads']);
Route::get('search_ads',[PageController::class, 'search_ads']);

// membuka tampilan pencarian di mobile view
Route::get('search_page',[PageController::class, 'search_page']);




Route::get('test', [PageController::class, 'test']);







Route::middleware(['admin'])->group(function () {

    Route::post('admin_logout', [AdminController::class, 'admin_logout']);
    Route::post('login_admin', [AdminController::class, 'login_admin']);
    Route::get('admin_dashboard', [AdminController::class, 'admin_dashboard']);
    Route::get('admin_settings', [AdminController::class, 'admin_settings']);

    Route::get('new_ads', [AdminController::class, 'new_ads']);
    Route::get('preview_ads/{user_id}/{ads_id}', [AdminController::class, 'preview_ads']);

    Route::get('actived_ads', [AdminController::class, 'actived_ads']);
    Route::get('rejected_ads', [AdminController::class, 'rejected_ads']);

    Route::get('deactived_ads', [AdminController::class, 'deactived_ads']);

    Route::get('deleted_ads', [AdminController::class, 'deleted_ads']);

    // change status ads 

    Route::get('approve_ads/{ads_id}', [AdminController::class, 'approve_ads']);
    Route::post('reject_ads', [AdminController::class, 'reject_ads']);
    Route::post('stop_ads', [AdminController::class, 'stop_ads']);


    // show users route 

    Route::get('new_user', [AdminController::class, 'new_user']);
    Route::get('verified_user', [AdminController::class, 'verified_user']);
    Route::get('all_user', [AdminController::class, 'all_user']);


    // view category , location and banner menu
    Route::get('view_category', [AdminController::class, 'view_category']);
    Route::get('edit_category/{slug}', [AdminController::class, 'edit_category']);

    Route::get('delete_category/{slug}', [AdminController::class, 'delete_category']);
    
    Route::post('create_new_category', [AdminController::class, 'create_new_category']);
    Route::post('update_category/{slug}', [AdminController::class, 'update_category']);


    Route::get('view_location', [AdminController::class, 'view_location']);


    Route::get('view_banner', [AdminController::class, 'view_banner']);
    Route::post('update_banner/{id}', [AdminController::class, 'update_banner']);









});



Route::middleware(['auth','verified'])->group(function () {


    Route::get('create_ads', [PageController::class, 'create']);
    Route::post('create_ads', [PageController::class, 'create_post_ads']);

    // testing
    // Route::get('create', [PageController::class, 'create']);
    Route::get('create/{category}/{sub_category}', [PageController::class, 'create_new_ads']);

    Route::get('delete_ads/{ads_id}', [PageController::class, 'delete_ads']);
    Route::get('edit_ads/{ads_id}', [PageController::class, 'edit_ads']);



    // user dashboard web routes
    Route::get('user_dashboard', [UserController::class, 'user_dashboard']);
    Route::get('view_user/{user_id}', [UserController::class, 'view_user']);
    Route::get('update_profile/{user_id}', [UserController::class, 'update_profile']);
    Route::post('simpan_profile/{user_id}', [UserController::class, 'simpan_profile']);




    // changer status ads by user 
    Route::post('stop_ads', [PageController::class, 'stop_ads']);

});











