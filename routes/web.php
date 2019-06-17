<?php


/* --------------------- Common/User Routes START -------------------------------- */

Route::get('/', 'SearchController@Welcome');

// Default Login for Normal Users
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//listing
Route::get('my-listings', 'HomeController@getMyListings')->name('listing.index');
Route::get('submit-listing', 'HomeController@getCreate');  //get listing
Route::post('submit-listing', 'HomeController@Store');   //submit Listing
Route::get('my-account', 'HomeController@getAccount');   //going to my account
Route::get('change-password/', 'HomeController@getChangePassword');
Route::post('change-password', 'HomeController@postChangePassword');
Route::get('listings/{slug}', ['uses' => 'SearchController@getListing'])->where('slug', '[\w\d\-\_]+'); // READING MORE LISTING
Route::get('blogs/{slug}', ['uses' => 'SearchController@getBlog'])->where('slug', '[\w\d\-\_]+'); // READING MORE Blog
Route::get('blog', 'SearchController@Blogs'); // Get All Blog

//Search Listing
Route::get('search', 'SearchController@getSearch');

//Posting Contact Info Send
Route::post('contact', 'SearchController@postContact');

/* ----------------------- Admin Routes START -------------------------------- */

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Register Routes
        // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
        // Route::post('/register','RegisterController@register');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');


    });

    // Managing the Users Here

    Route::resource('users', 'UserController');

    Route::resource('listings', 'ListingController'); //Food

    Route::resource('orders', 'OrderController');

    Route::resource('slides', 'SlideController');

    Route::resource('pages', 'PageController');

    Route::resource('services', 'ServiceController');

    Route::resource('blogs', 'BlogController'); // Blog Section


    // Comments
    Route::post('comments/{$listing_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


    Route::get('/dashboard','HomeController@index')->name('home');

    // Backend above material

    //example route for testing intended() redirect
    Route::get('/new',function(){
        return 'hello admin route!';
    })->middleware('auth:admin');

    //Put all of your admin routes here...

});

/* ----------------------- Admin Routes END -------------------------------- */
