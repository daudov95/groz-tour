<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\Frontend\DetailsController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\ExcursionController;
use App\Http\Controllers\Frontend\LegislationController;
use App\Http\Controllers\Frontend\PaymentController;
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


/* Routs for guests */
Route::group(['middleware'], function () {

    /* Excursion */
    Route::get('/', [ExcursionController::class, 'index'])->name('index');
    Route::get('/excursions', [ExcursionController::class, 'index'])->name('excursions');
    Route::get('/excursions/{id}', [ExcursionController::class, 'single'])->name('single-excursion');

    /* Event */
    Route::get('/events', [EventController::class, 'index'])->name('events');

    /* About */
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    /* Payment */
    Route::get('/details/payment', [DetailsController::class, 'payment'])->name('payment');
    Route::match(['get', 'post'], '/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::match(['get', 'post'], '/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::match(['get', 'post'], '/payment/error', [PaymentController::class, 'error'])->name('payment.error');
    Route::get('/payment/{id}', [PaymentController::class, 'payment'])->name('payment.index');
    Route::post('/payment/{id}', [PaymentController::class, 'paymentStore'])->name('payment.store');
    Route::get('/payment/order/{order_id}:{session_id}', [PaymentController::class, 'orderInfo'])->name('payment.order');

    /* Details */
    Route::get('/details', [DetailsController::class, 'index'])->name('details');

    /* legislation */
    Route::get('/legislation', [LegislationController::class, 'index'])->name('legislation');

    /* Contact */
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

});

/* Routes for admin */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'isAdmin']], function () {

    /* Dashboard */
    Route::get('/', [AdminController::class, 'index'])->name('index');

    /* Excursion */
    Route::group(['prefix' => 'excursion', 'as' => 'excursion.'], function () {
        Route::get('/', [AdminController::class, 'excursion'])->name('index');
        Route::get('/create', [AdminController::class, 'excursionCreate'])->name('create');
        Route::get('/edit/{id}', [AdminController::class, 'excursionEdit'])->name('edit');
        Route::post('/store', [AdminController::class, 'excursionStore'])->name('store');
        Route::post('/update', [AdminController::class, 'excursionUpdate'])->name('update');
        Route::post('/delete', [AdminController::class, 'excursionDelete'])->name('delete');
        Route::post('/image/delete', [AdminController::class, 'excursionDeleteImage'])->name('delete.image');
        Route::get('/edit/{id}/schedule', [AdminController::class, 'excursionSchedule'])->name('schedule.index');
        Route::post('/edit/{id}/schedule', [AdminController::class, 'excursionScheduleStore'])->name('schedule.store');
        Route::post('/edit/{id}/schedule-delete', [AdminController::class, 'excursionScheduleDelete'])->name('schedule.delete');
    });

    /* Transaction */
    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('/', [AdminController::class, 'transaction'])->name('index');
        Route::post('/delete', [AdminController::class, 'transactionDelete'])->name('delete');
    });

    /* Others */
})->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
