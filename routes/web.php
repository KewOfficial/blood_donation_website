<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodBankDashboardController;
use App\Http\Controllers\BloodBankEventController;

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
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegistration']);

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Donor Dashboard Route
Route::get('/donor-dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard')->middleware('auth:donor');

Route::get('/convert_points_to_badges', [DonorController::class, 'convertPointsToBadges'])
    ->name('convert_points_to_badges');
 Route::post('/claim-bonus', [DonorController::class, 'claimBonus'])->name('claim_bonus');


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact'); 

// Event Routes
Route::get('/donors/list-upcoming', [EventController::class, 'listUpcomingEvents'])->name('donors.list_upcoming');
Route::get('/donors/event-details/{id}', [EventController::class, 'eventDetails'])->name('donors.event_details');
Route::get('/donors/registration-participation', [EventController::class, 'registrationParticipation'])->name('donors.registration_participation');
Route::get('/donors/countdown-timer/{id}', [EventController::class, 'countdownTimer'])->name('donors.countdown_timer');

// Schedule Appointment Route
Route::get('/donors/schedule-appointment', [DonorController::class, 'scheduleAppointment'])->name('schedule_appointment');
Route::post('/schedule-appointment', [DonorController::class, 'submitAppointment'])->name('donors.schedule_appointment.submit');
// Loyalty Program Route
Route::get('/donors/loyalty-program', [DonorController::class, 'loyaltyProgram'])->name('donors.loyalty_program');
Route::get('/view-activities', [DonorController::class, 'viewActivities'])->name('view_activities');
Route::get('/view-rewards', [DonorController::class, 'viewRewards'])->name('view_rewards');
   
// BLOOD BANK
Route::get('/blood-bank-dashboard', [BloodBankDashboardController::class, 'index'])->name('blood.bank.dashboard');
Route::get('/blood-bank/upcoming-events', [BloodBankDashboardController::class, 'viewUpcomingEvents'])->name('blood.bank.upcoming.events');
Route::post('/bloodbank/events/store', [BloodBankEventController::class, 'store'])->name('bloodbank.events.store');
Route::get('/bloodbank/events/create', [BloodBankEventController::class, 'create'])->name('bloodbank.events.create');
// Edit Blood Bank Event
Route::get('/bloodbank/events/{event}/edit', [BloodBankEventController::class, 'edit'])->name('bloodbank.events.edit');

// Update Blood Bank Event
Route::put('/bloodbank/events/{event}', [BloodBankEventController::class, 'update'])->name('bloodbank.events.update');

// Delete Blood Bank Event
Route::delete('/bloodbank/events/{event}', [BloodBankEventController::class, 'destroy'])->name('bloodbank.events.destroy');

