<?php

use App\Http\Controllers\SongsController;

Route::resource('/songs', 'SongsController')->only([
    'index', 'create', 'show', 'update', 'delete'
]);



