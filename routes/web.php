<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


//bienvenue route
Route::get('/', function () {
    return view('bienvenue');
})->name('bienvenue');

//register routes
Route::get('/register',[AuthController::class, 'registerIndex'])->name('register.index');
Route::post('/',[AuthController::class, 'registerStore'])->name('register.store');


//login routes
Route::get('/login',[AuthController::class, 'logInIndex'])->name('login.index');
Route::post('/loggedIn',[AuthController::class, 'logingIn'])->name('logingIn');
Route::get('/logout',[AuthController::class, 'logOut'])->name('logout');




//admin routes
Route::get('/admin/{admin}',[AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/profile/{admin}',[AdminController::class, 'profile'])->name('admin.profile');

//admin etuddiant
Route::get('/admin/profile/{admin}/etudiants',[AdminController::class, 'etudiants'])->name('admin.etudiants');

Route::get('/admin/profile/{admin}/etudiants/create',[AdminController::class, 'createEtudiant'])->name('admin.createEtudiant');
Route::post('/admin/profile/{admin}/etudiants',[AdminController::class, 'storeEtudiant'])->name('admin.storeEtudiant');

Route::get('/admin/profile/{admin}/etudiants/{etudiant}',[AdminController::class, 'showEtudiant'])->name('admin.showEtudiant');
Route::get('/admin/profile/{admin}/etudiants/{etudiant}/edit',[AdminController::class, 'editEtudiant'])->name('admin.editEtudiant');
Route::put('/admin/profile/{admin}/etudiants/{etudiant}/',[AdminController::class, 'updateEtudiant'])->name('admin.updateEtudiant');


//admin profs
Route::get('/admin/profile/{admin}/profs',[AdminController::class, 'profs'])->name('admin.profs');

//admin modules
Route::get('/admin/profile/{admin}/modules',[AdminController::class, 'modules'])->name('admin.modules');
Route::get('/admin/profile/{admin}/modules/create',[AdminController::class, 'createModule'])->name('admin.createModule');
Route::post('/admin/profile/{admin}/modules',[AdminController::class, 'storeModule'])->name('admin.storeModule');
Route::get('/admin/profile/{admin}/modules/{module}/absences',[AdminController::class, 'modulesAbsences'])->name('admin.modulesAbsences');
Route::get('/admin/profile/{admin}/modules/{module}/notes',[AdminController::class, 'modulesNotes'])->name('admin.modulesNotes');

//admin calendar
Route::get('/admin/profile/{admin}/calendar',[AdminController::class, 'calendars'])->name('admin.calendars');
Route::get('/admin/profile/{admin}/calendar/create',[AdminController::class, 'createCalendar'])->name('admin.createCalendar');
Route::post('/admin/profile/{admin}/calendar',[AdminController::class, 'storeCalendar'])->name('admin.storeCalendar');
Route::get('/admin/profile/{admin}/{calendar}/{day}/edit',[AdminController::class, 'editCalendarDay'])->name('admin.editCalendarDay');
Route::put('/admin/profile/{admin}/calendar',[AdminController::class, 'updateCalendar'])->name('admin.updateCalendar');






//prof routes
Route::get('/prof/{prof}',[ProfController::class, 'index'])->name('prof.index');
Route::get('/prof/profile/{prof}',[ProfController::class, 'profile'])->name('prof.profile');
Route::get('/prof/profile/{prof}/{module}/createReatrdsAbsences',[ProfController::class, 'createRetardsAbsences'])->name('prof.createRetardsAbsences');
Route::post('/prof/profile/{prof}',[ProfController::class, 'storeRetardsAbsences'])->name('prof.storeRetardsAbsences');






