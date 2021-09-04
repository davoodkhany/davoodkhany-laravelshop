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


Route::get('comments/noapproved', 'CommentController@noApproved')->name('comments.noapproved');

Route::post('comments/noapproved', 'CommentController@noApprovedUpdate')->name('comments.noApprovedUpdate');
Route::post('comments/noapproved', 'CommentController@noApprovedUpdate')->name('comments.noApprovedUpdate');
Route::resource('comments', 'CommentController');






