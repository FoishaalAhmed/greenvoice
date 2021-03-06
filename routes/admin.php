<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ReportCategoryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;

Route::group(['as' => 'admin.', 'middleware' => ['admin', 'auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::put('contacts/update/{contact}', [ContactController::class, 'update'])->name('contacts.update');

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('generals', GeneralController::class)->except(['create', 'edit', 'show']);
    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('pages', PageController::class)->except(['show']);
    Route::resource('blogs', BlogController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['create', 'edit', 'show']);
    Route::resource('report-categories', ReportCategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('reports', ReportController::class)->except(['show']);
    Route::resource('teams', TeamController::class)->except(['show']);
    Route::resource('newsletters', NewsletterController::class)->except(['show']);
});
