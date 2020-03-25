<?php

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/persona', 'TeamController@persona');
    Route::get('/content', 'TeamController@teamDash')->name('team-dash');
    Route::get('/add-content', 'TeamController@addContent')->name('team-add-content');
    Route::post('/content-save', 'TeamController@contentSave')->name('contentSave');
    Route::get('/edit-content/{id}', 'TeamController@editDash')->name('team-edit-content');
    Route::post('/content-update', 'TeamController@updateContent')->name('updateContent');
    Route::get('/content-log/{id}', 'TeamController@getLog')->name('getLog');

    Route::get('/add-new-user', 'UserController@newUser')->name('add-user');
    Route::get('/user-edit/{id}', 'UserController@editUser')->name('editUser');
    Route::get('/user-deactivate/{id}/{bit}', 'UserController@blockUser')->name('blockUser');
    Route::get('/invite-user/{id}', 'UserController@InviteUser')->name('inviteUser');
    Route::post('/user-update', 'UserController@updateUser')->name('updateUser');
    Route::post('/insert-user', 'UserController@insertUser')->name('insert-user');
    Route::get('/users', 'UserController@listUsers')->name('list-users');

    Route::get('/add-new-project', 'ProjectController@newProject')->name('add-new-project');
    Route::get('/projects', 'ProjectController@listProjects')->name('list-projects');
    Route::post('/save-project', 'ProjectController@projectSave')->name('save-project');
    Route::get('/project-status/{id}/{bit}', 'ProjectController@changeStatus')->name('changeStatus');
    Route::get('/edit-project/{id}', 'ProjectController@editProject')->name('editProject');
    Route::post('/update-project', 'ProjectController@updateProject')->name('updateProject');
    Route::get('/get-project/{id}', 'ProjectController@getProject');
    //persona routes
    Route::get('/add-new-persona', 'PersonaController@newPersona')->name('add-persona');
    Route::post('persona-save', 'PersonaController@savePersona')->name('savePersona');
    Route::get('/persona-edit/{id}', 'PersonaController@editPersona')->name('editPersona');
    Route::get('/persona-delete/{id}', 'PersonaController@deletePersona')->name('deletePersona');
    Route::post('persona-update', 'PersonaController@UpdatePersona')->name('UpdatePersona');
    Route::get('/list-persona', 'PersonaController@listPersona')->name('list-Persona');






});


