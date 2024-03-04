<?php
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EventController;


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

Route::get('/', function () {
    return view('welcome');
});


// Registration Routes
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'processRegistration']);
// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'processLogin']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
 
});

Route::get('/donor-dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact'); 

              //Event Routes
Route::get('/donors/list-upcoming', [EventController::class, 'listUpcomingEvents'])->name('donors.list_upcoming');
Route::get('/donors/event-details/{id}', [EventController::class, 'eventDetails'])->name('donors.event_details');
Route::get('/donors/registration-participation', [EventController::class, 'registrationParticipation'])->name('donors.registration_participation');
Route::get('/donors/countdown-timer/{id}', [EventController::class, 'countdownTimer'])->name('donors.countdown_timer');