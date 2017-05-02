<?php

Route::group(['prefix' => 'supportchat'], function () {

    Route::group(['prefix' => 'conversations'], function () {
        Route::get('/', ['as' => 'conversations.index', 'uses' => '\Aidaskni\Supportchat\Controllers\SupportchatController@index'])->middleware(['web', 'auth']);
        Route::get('/{id}', ['as' => 'conversations.show', 'uses' => '\Aidaskni\Supportchat\Controllers\SupportchatController@show'])->middleware(['web', 'auth']);
        Route::get('/create', ['as' => 'conversations.create', 'uses' => '\Aidaskni\Supportchat\Controllers\SupportchatController@create']);
        Route::post('/create', ['as' => 'conversations.store', 'uses' => '\Aidaskni\Supportchat\Controllers\SupportchatController@store']);
        Route::get('/{id}/clear', ['as' => 'conversations.clear', 'uses' => '\Aidaskni\Supportchat\Controllers\SupportchatController@clearMessages'])->middleware(['web', 'auth']);
    });

    Route::get('messages/{id}', ['uses' => 'Aidaskni\Supportchat\Controllers\SupportchatController@getMessagesById'])->middleware(['web', 'auth']);
    Route::post('messages/{id}', ['uses' => 'Aidaskni\Supportchat\Controllers\SupportchatController@sendMessage'])->middleware(['web', 'auth']);

});


