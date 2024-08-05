<?php 

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Configuration\ConfigurationController;

/**
 * Configuration routes.
 */

Route::group(['middleware' => ['user', 'admin_locale'], 'prefix' => config('app.admin_url')], function () {
    Route::controller(ConfigurationController::class)->prefix('configuration/{slug?}/{slug2?}')->group(function () {

        Route::get('', 'index')->name('admin.configuration.index');

        Route::post('', 'store')->name('admin.configuration.store');

        Route::get('{path}', 'download')->defaults('_config', [
            'redirect' => 'admin.configuration.index',
        ])->name('admin.configuration.download');
    });
});