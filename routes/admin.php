<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('admin.index');
});


Route::resource('users','UserController');

Route::get('users/{$user}/permission', 'Permission/PermissionController@create')->name('admin.users.permission');
Route::post('users/{$user}/permission', 'Permission/PermissionController@store')->name('admin.users.permission.store');

Route::resource('permission', 'PermissionController');
Route::resource('rule', 'RuleController');

