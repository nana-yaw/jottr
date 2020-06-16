<?php

Auth::routes();

Route::get('/logout-manual', function () {

    request()->session()->invalidate();
    return redirect('/login');
});

Route::get('{any}', 'AppController@index')->where('any', '.*');
