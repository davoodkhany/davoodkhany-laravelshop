<?php

Route::get('/', function () {
return view('admin.index');
});

Route::get('/users', function () {
    return view('admin.users.all');
});
