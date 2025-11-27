<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1;

Route::prefix('v1')->group(function () {
    Route::post('registration', [V1\User\Registration\RegistrationController::class, 'registration']);

    Route::get('profile/{user_id}', [V1\User\Profile\ProfileController::class, 'profile']);
});


