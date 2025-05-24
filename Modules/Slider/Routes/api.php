<?php


Route::group(['prefix' => 'sliders'], function () {

    Route::get('/'      , 'WebService\SliderController@slider')->name('api.slider.index');

});
