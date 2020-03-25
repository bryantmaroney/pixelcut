<?php

Route::group(['middleware' => 'client', 'namespace' => 'Client'], function () {

    Route::get('/projects-list', 'ClientController@index')->name('client-dash');
    Route::get('/edit/profile', 'UserController@editProfile')->name('editProfile');
    Route::post('/client-profile-update', 'UserController@updateProfile')->name('updateProfile');
    Route::get('/content-assignment/{id}', 'UserController@contentAssigment')->name('content-review');
    Route::post('/client-content-save', 'ContentController@contentReviewSave')->name('contentReviewSave');



//    Route::get('/edit-content/{id}', 'ContentController@editDash')->name('edit');
//    Route::post('/content-update', 'ContentController@updateContent')->name('Content-update');
    Route::post('/client-update-project', 'ProjectController@updateProject')->name('client.updateProject');
});
