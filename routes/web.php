<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodBankDashboardController;
use App\Http\Controllers\BloodBankEventController;
use App\Http\Controllers\LifelinePointsController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RewardManagementController;

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
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact'); 

// Event Routes
Route::get('/donors/list-upcoming', [EventController::class, 'listUpcomingEvents'])->name('donors.list_upcoming');
Route::get('/donors/event-details/{id}', [EventController::class, 'eventDetails'])->name('donors.event_details');
Route::get('/donors/registration-participation', [EventController::class, 'registrationParticipation'])->name('donors.registration_participation');
Route::get('/donors/countdown-timer/{id}', [EventController::class, 'countdownTimer'])->name('donors.countdown_timer');
Route::middleware(['auth:donor'])->group(function () {
    Route::get('/donor-dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');
    Route::get('/schedule-appointment', [DonorController::class, 'scheduleAppointment'])->name('schedule_appointment');
    Route::post('/submit-appointment', [DonorController::class, 'submitAppointment'])->name('submit_appointment');
});
// Loyalty Program Route
Route::middleware('auth:donor')->get('/donors/lifeline-points', [LifelinePointsController::class, 'index'])
    ->name('lifeline_points');
    //claim
    Route::get('/claim-reward', [LifelinePointsController::class, 'claimReward'])->name('claim_reward');
// BLOOD BANK
Route::get('/blood-bank-dashboard', [BloodBankDashboardController::class, 'index'])->name('blood.bank.dashboard')->middleware('web');

Route::get('/blood-bank/upcoming-events', [BloodBankDashboardController::class, 'viewUpcomingEvents'])->name('blood.bank.upcoming.events');
Route::post('/bloodbank/events/store', [BloodBankEventController::class, 'store'])->name('bloodbank.events.store');
Route::get('/bloodbank/events/create', [BloodBankEventController::class, 'create'])->name('bloodbank.events.create');
// Edit Blood Bank Event
Route::get('/bloodbank/events/{event}/edit', [BloodBankEventController::class, 'edit'])->name('bloodbank.events.edit');

// Update Blood Bank Event
Route::put('/bloodbank/events/{event}', [BloodBankEventController::class, 'update'])->name('bloodbank.events.update');

// Delete Blood Bank Event
Route::delete('/bloodbank/events/{event}', [BloodBankEventController::class, 'destroy'])->name('bloodbank.events.destroy');
//inventory mgmt
Route::get('/blood/manage-inventory', [BloodBankDashboardController::class, 'manageInventory'])->name('blood.manage_inventory');
Route::post('/save-blood-unit', [BloodBankDashboardController::class, 'saveBloodUnit'])->name('save-blood-unit');
// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
//reward management
Route::get('/reward_management', [RewardManagementController::class, 'index'])->name('reward_management.index');
Route::post('/reward-tiers', [RewardManagementController::class, 'storeTier'])->name('reward_tiers.store');
Route::put('/reward-tiers/{id}', [RewardManagementController::class, 'updateTier'])->name('reward_tiers.update');
Route::delete('/reward-tiers/{id}', [RewardManagementController::class, 'destroyTier'])->name('reward_tiers.destroy');
Route::post('/points/update', [RewardManagementController::class, 'updateLifelinePoints'])->name('points.update');
