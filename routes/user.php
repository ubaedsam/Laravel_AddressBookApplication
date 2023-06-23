<?php

use App\Http\Livewire\Group\Group;
use App\Http\Livewire\Group\Addgroup;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Contact\Contact;
use App\Http\Livewire\Group\Editgroup;
use App\Http\Livewire\Contact\Addcontact;
use App\Http\Livewire\Contact\Editcontact;
use App\Http\Controllers\User\UserController;

// Sistem login tipe user
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
        Route::get('/verify',[UserController::class,'verify'])->name('verify');

        Route::get('/password/forgot',[UserController::class,'showForgotForm'])->name('forgot.password.form');
        Route::post('/password/forgot',[UserController::class,'sendResetLink'])->name('forgot.password.link');
        Route::get('/password/reset/{token}',[UserController::class,'showResetForm'])->name('reset.password.form');
        Route::post('/password/reset',[UserController::class,'resetPassword'])->name('reset.password');
    });

    Route::middleware(['auth:web','is_user_verify_email','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        // Pengelolaan data group
        Route::get('/all-group', Group::class)->name('group');
        Route::get('/all-group/add', Addgroup::class)->name('all-group.add');
        Route::get('/all-group/edit/{group_id}', Editgroup::class)->name('all-group.edit');
        // Pengelolaan data contact
        Route::get('/all-contact', Contact::class)->name('contact');
        Route::get('/all-contact/add', Addcontact::class)->name('all-contact.add');
        Route::get('/all-contact/edit/{contact_id}', Editcontact::class)->name('all-contact.edit');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
});