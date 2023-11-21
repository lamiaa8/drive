<?php

use App\Http\Controllers\DriveController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("drives/")->group(
    function () {

        Route::get("alldrive", [DriveController::class, 'alldrive'])->name('drive.alldrive');  // done

        Route::get("showPublic/{id}", [DriveController::class, 'showPublic'])->name('drive.showPublic'); //done




        Route::middleware("auth")->group(function () {
            Route::get("index", [DriveController::class, 'index'])->name('drive.index');  // done
            Route::get("create", [DriveController::class, 'create'])->name('drive.create'); //done
            Route::post("store", [DriveController::class, 'store'])->name('drive.store'); //done
            //its need id
            Route::get("show/{id}", [DriveController::class, 'show'])->name('drive.show'); //done
            Route::get("edit/{id}", [DriveController::class, 'edit'])->name('drive.edit'); //done
            Route::post("update/{id}", [DriveController::class, 'update'])->name('drive.update'); //done
            Route::get("destroy/{id}", [DriveController::class, 'destroy'])->name('drive.destroy'); //done

            Route::get("download/{id}", [DriveController::class, 'download'])->name('drive.download'); //done
            Route::get("changeStatus/{id}", [DriveController::class, 'changeStatus'])->name('drive.changeStatus'); //done






        });
    }
);
