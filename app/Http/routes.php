<?php

Route::group(['prefix' => 'api'], function () {
    Route::get('convert/{integer}', 'ApiController@convert')
            ->middleware('checkinteger') // Only accept an integer between 1-3999
            ->where('integer', '[0-9]+'); // Accept the integer, convert to Roman numerals and return result
    
    Route::group(['prefix' => 'stats'], function () {
        Route::get('recent', 'ApiController@showRecent'); // Return recently converted integers (limit 50)
        Route::get('top',    'ApiController@showTop'); // Return top 10 converted integers
    });
});