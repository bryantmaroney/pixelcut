<?php

Route::group(['prefix' => 'client','middleware' => 'client', 'namespace' => 'Client'], function () {
    Route::get('/', 'ClientController@index')->name('client-dash');
    Route::get('/edit-profile', 'UserController@editProfile')->name('editProfile');
    Route::post('/profile-update', 'UserController@updateProfile')->name('updateProfile');
    Route::get('/content-assignment/{id}', 'UserController@contentAssigment')->name('content-review');
    Route::post('/content-save', 'ContentController@contentReviewSave')->name('contentReviewSave');



//    Route::get('/edit-content/{id}', 'ContentController@editDash')->name('edit');
//    Route::post('/content-update', 'ContentController@updateContent')->name('Content-update');
    Route::post('/update-project', 'ProjectController@updateProject')->name('client.updateProject');
});
