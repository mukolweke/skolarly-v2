<?php

use App\Http\Controllers\AdminController;

Route::get('/admin/{any}', [AdminController::class, 'index'])->name('admin.index')->where('any', '.*');
