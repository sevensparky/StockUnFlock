<?php

use Illuminate\Support\Facades\Route;
use Modules\Common\Http\Controllers\TagController;
use Modules\Common\Http\Controllers\FaqController;
use Modules\Common\Http\Controllers\ContactController;
use Modules\Common\Http\Controllers\SocialController;

Route::prefix('dashboard')->group(function() {

    // Tag Routes
    Route::resource('tags', TagController::class)->except('show');
    Route::put('tags/{id}/change-status', [TagController::class, 'changeStatus'])
        ->name('tags.change.status');
    Route::get('tags/trash', [TagController::class, 'trash'])->name('tags.trash');
    Route::delete('tags/trash/{id}/force-delete', [TagController::class, 'forceDelete'])->name('tags.force.delete');
    Route::get('tags/trash/{id}/restore', [TagController::class, 'restore'])->name('tags.restore');
    Route::get('tags/trash/restore-all', [TagController::class, 'restoreAll'])->name('tags.restore.all');

    // Faq Routes
    Route::resource('faq', FaqController::class)->except('show');
    Route::put('faq/{id}/change-status', [FaqController::class, 'changeStatus'])
        ->name('faq.change.status');
    Route::get('faq/trash', [FaqController::class, 'trash'])->name('faq.trash');
    Route::delete('faq/trash/{id}/force-delete', [FaqController::class, 'forceDelete'])->name('faq.force.delete');
    Route::get('faq/trash/{id}/restore', [FaqController::class, 'restore'])->name('faq.restore');
    Route::get('faq/trash/restore-all', [FaqController::class, 'restoreAll'])->name('faq.restore.all');

    // Contact Routes
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/update', [ContactController::class, 'update'])->name('contact.update');

    // Social Routes
    Route::get('social', [SocialController::class, 'index'])->name('social.index');
    Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
    Route::post('social', [SocialController::class, 'store'])->name('social.store');
    Route::get('social/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('social/update', [SocialController::class, 'update'])->name('social.update');
});
