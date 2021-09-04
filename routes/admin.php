<?php


Route::get('/', function () {
return view('admin.index');
});


Route::resource('users','UserController');

Route::get('/users/{user}/permission', 'Permission\PermissionController@create')->name('user.permission.create');

Route::post('/users/{user}/permission', 'Permission\PermissionController@store')->name('user.permission.store');

Route::resource('permission', 'PermissionController');

Route::resource('rule', 'RuleController');

Route::resource('products', 'ProductController')->except(['show']);


Route::get('comments/noapproved', 'CommentController@noapproved')->name('comments.noapproved');

Route::resource('comments', 'CommentController');






