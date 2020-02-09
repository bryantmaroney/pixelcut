<?php

Route::group(['prefix' => 'writer','middleware' => 'writer', 'namespace' => 'Writer'], function () {

    Route::get('/', 'ContentController@writterDash')->name('writter-dash');
    Route::get('/writer-edit-content/{id}', 'ContentController@editDash')->name('writer-edit-content');
    Route::post('/article-save', 'ArticleController@addArticle')->name('addArticle');
    Route::get('/edit-profile', 'UserController@editProfile')->name('writerEditProfile');
    Route::post('/profile-update', 'UserController@updateProfile')->name('writerUpdateProfile');
    Route::get('/content-assignment-finalize', 'UserController@contentAssigmentFinalize')->name('content-assignment-finalize');
    Route::get('/get-content-log/{id}', 'ContentController@getLog');

//    Route::post('/content-update', 'TeamController@updateContent')->name('updateContent');
//    Route::get('/content-assignment-finalize', 'UserController@contentAssigmentFinalize')->name('content-assignment-finalize');

});


