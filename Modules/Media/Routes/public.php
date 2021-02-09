<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('download/vces/{product_id}/{resource_id}', 'FileDownloadController@downloadFile')->name('download.file.vce');
});