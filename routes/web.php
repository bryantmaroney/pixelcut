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
    return redirect('/login');
});

Auth::routes();

Route::get('logout', [
    'name' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);


Route::get('/forgot-pass', 'AuthenticationController@forgotPassword')->name('forgot-pass');
Route::get('/setup-pass/{token}', 'AuthenticationController@registerPassword')->name('registerPassword');
Route::post('/setup-pass-save', 'AuthenticationController@passwordSave')->name('passwordSave');

Route::group(['middleware' => 'auth'], function () {

//    Route::get('/setup-pass', 'AuthenticationController@setupPass')->name('setup-pass');
    Route::get('/home', 'HomeController@index')->name('home');

//    Route::group(['prefix' => 'admin','middleware' => 'admin', 'namespace' => 'Admin'], function () {
//
//        Route::get('/', 'TeamController@teamDash')->name('team-dash');
//        Route::get('/team-add-content', 'TeamController@addContent')->name('team-add-content');
//        Route::get('/team-edit-content', 'TeamController@editDash')->name('team-edit-content');
//
//        Route::get('/add-new-user', 'UserController@newUser')->name('add-user');
//        Route::get('/user-edit/{id}', 'UserController@editUser')->name('editUser');
//        Route::get('/user-deactivate/{id}/{bit}', 'UserController@blockUser')->name('blockUser');
//        Route::get('/invite-user/{id}', 'UserController@InviteUser')->name('inviteUser');
//        Route::post('/user-update', 'UserController@updateUser')->name('updateUser');
//        Route::post('/insert-user', 'UserController@insertUser')->name('insert-user');
//        Route::get('/list-users', 'UserController@listUsers')->name('list-users');
//
//        Route::get('/add-new-project', 'ProjectController@newProject')->name('add-new-project');
//        Route::get('/list-projects', 'ProjectController@listProjects')->name('list-projects');
//        Route::post('/save-project', 'ProjectController@projectSave')->name('save-project');
//        Route::get('/project-status/{id}/{bit}', 'ProjectController@changeStatus')->name('changeStatus');
//        Route::get('/edit-project/{id}', 'ProjectController@editProject')->name('editProject');
//        Route::get('/view-project/{id}', 'ProjectController@viewProject')->name('viewProject');
//
//        Route::get('/content-assignment-finalize', 'UserController@contentAssigmentFinalize')->name('content-assignment-finalize');
//
//    });

//    Route::group(['prefix' => 'client','middleware' => 'client', 'namespace' => 'Client'], function () {
//        Route::get('/', 'ClientController@index')->name('client-dash');
//        Route::get('/edit-profile', 'UserController@editProfile')->name('editProfile');
//        Route::post('/profile-update', 'UserController@updateProfile')->name('updateProfile');
//        Route::get('/content-assignment', 'UserController@contentAssigment')->name('content-assignment');
//        Route::get('/my-content-assignments', 'UserController@myContentAssigment')->name('my-content-assignments');
//    });

});
/**
 *
 * CLIENT DEISNG:
 * http://localhost:8000/team-dash
 * http://localhost:8000/team-add-content
 * http://localhost:8000/team-edit-dash
 * http://localhost:8000/team-projects
 * http://localhost:8000/my-content-assignments
 *
 * ADMIN DESIGN:
 * http://localhost:8000/client-dash
 * http://localhost:8000/add-new-project
 * http://localhost:8000/add-new-user
 * http://localhost:8000/content-assignment
 * http://localhost:8000/content-assignment-finalize
 * http://localhost:8000/list-users
 *
 **/





