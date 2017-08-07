<?php

Route::group(['prefix' => 'api'], function () {
    Route::get('convert/{integer}', 'ApiController@convert')
            ->where('integer', '[0-9]+'); // Accept the integer, convert to Roman numerals and return result
    
    Route::group(['prefix' => 'stats'], function () {
        Route::get('recent', 'ApiController@showRecent'); // Return recently converted integers (limit 10)
        Route::get('top',    'ApiController@showTop'); // Return top 10 converted integers
    });
});