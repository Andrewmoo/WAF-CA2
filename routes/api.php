<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

    Vue JS components consist of templates and a script containing mounted() method, data array, and methods.

    Mounted() is executed when it's loaded, contains variables and axios requests etc

    Data should return objects and/or arrays of objects from axios responses, they are left blank to be filled by the axios methods

    Methods in this exam should only contain saveForm() method executed on form submission.

    The app.js needs to import all components and define their routes

    install node.js, python, run git bash as admin, npm install, composer update, make db "college", php artisan migrate, php artisan db:seed, npm run watch, edit the code
|
*/

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\PassportController@user');
    Route::get('logout', 'API\PassportController@logout');

    Route::resource('courses', 'API\CourseController')->except([
        'create', 'edit'
    ]);
    Route::resource('students', 'API\StudentController')->except([
        'create', 'edit'
    ]);
    Route::resource('enrolments', 'API\EnrolmentController')->except([
        'create', 'edit'
    ]);
});
