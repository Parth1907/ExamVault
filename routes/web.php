<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin login 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // Login route
        Route::get('login',[AuthenticatedSessionController::class,'create'])->name('showLogin');
        Route::post('login',[AuthenticatedSessionController::class,'store'])->name('processLogin');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
    Route::middleware('admin')->group(function() {
        Route::get('dashboard', [HomeController::class , 'index'])->name('dashboard');
        Route::get('addSchool', [HomeController::class, 'showSchoolForm'])->name('showSchoolForm');
        Route::post('addSchool', [HomeController::class, 'storeSchool'])->name('storeSchool');
        Route::get('addCourse', [HomeController::class, 'showCourseForm'])->name('showCourseForm');
        Route::post('addCourse', [HomeController::class, 'storeCourse'])->name('storeCourse');
        Route::get('addBranch', [HomeController::class, 'showBranchForm'])->name('showBranchForm');
        Route::post('addBranch', [HomeController::class, 'storeBranch'])->name('storeBranch');
        Route::get('addSubject', [HomeController::class, 'showSubjectForm'])->name('showSubjectForm');
    });
});

Route::controller(NavigationController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{school}', 'courses');
    Route::get('/{school}/{course}', 'branches');
    Route::get('/{school}/{course}/{branch}','semesters');
    Route::get('/{school}/{course}/{branch}/{sem}', 'subjects')->name('subjects');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}', 'papers');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}/show', 'exams')->name('show');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}/show/{exam}', 'years');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}/show/{exam}/{year}/view', 'view');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}/show/{exam}/{year}/download', 'download');
    Route::get('/{school}/{course}/{branch}/{sem}/{subject}/create', 'create')->middleware('auth');
    Route::post('/{school}/{course}/{branch}/{sem}/{subject}/upload', 'store')->middleware('auth');
});
