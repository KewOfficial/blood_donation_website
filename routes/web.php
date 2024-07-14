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
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HospitalDashboardController;
use App\Http\Controllers\HospitalAuthController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\PaymentController;
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
Route::post('/register-submit', [AuthController::class, 'processRegistration'])->name('register.submit');


// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::post('/contact', [PagesController::class, 'handleContactForm'])->name('handleContactForm');
// Event Routes
Route::middleware(['auth:donor'])->group(function () {
    Route::get('/donors/list-upcoming', [EventController::class, 'listUpcomingEvents'])->name('donors.list_upcoming');
    Route::get('/donors/event-details/{id}', [EventController::class, 'eventDetails'])->name('donors.event_details');
    Route::get('/donors/registration-participation', [EventController::class, 'registrationParticipation'])->name('donors.registration_participation');
    Route::get('/donors/countdown-timer/{id}', [EventController::class, 'countdownTimer'])->name('donors.countdown_timer');
});

Route::middleware(['auth:donor'])->group(function () {
    Route::get('/donor-dashboard', [DonorController::class, 'dashboard'])->name('donor.dashboard');
    Route::get('/schedule-appointment', [DonorController::class, 'scheduleAppointment'])->name('schedule_appointment');
    Route::post('/submit-appointment', [DonorController::class, 'submitAppointment'])->name('submit_appointment');
    Route::get('donor/profile', [DonorController::class, 'showProfile'])->name('donor.profile');
    Route::post('donor/profile-picture', [DonorController::class, 'updateProfilePicture'])->name('donor.updateProfilePicture');
});

// Loyalty Program Route
Route::middleware(['auth:donor'])->group(function () {
    Route::get('/donors/lifeline-points', [LifelinePointsController::class, 'index'])->name('lifeline_points');
});

Route::middleware(['auth:donor'])->get('/claim-reward', [LifelinePointsController::class, 'claimReward'])->name('claim_reward');

// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Reward management
Route::get('/reward_management', [RewardManagementController::class, 'index'])->name('reward_management.index');
Route::post('/reward-tiers', [RewardManagementController::class, 'storeTier'])->name('reward_tiers.store');
Route::put('/reward-tiers/{id}', [RewardManagementController::class, 'updateTier'])->name('reward_tiers.update');
Route::delete('/reward-tiers/{id}', [RewardManagementController::class, 'destroyTier'])->name('reward_tiers.destroy');
Route::post('/points/update', [RewardManagementController::class, 'updateLifelinePoints'])->name('points.update');
Route::get('/donors-list', [RewardManagementController::class, 'donorsList'])->name('donors.list');
Route::get('/filter-donors', [RewardManagementController::class, 'filterDonors'])->name('filter_donors');

Route::middleware('auth:admin')->group(function () {
    Route::get('/appointments', [BloodBankDashboardController::class, 'listAppointments'])->name('appointments.list');
    Route::match(['post', 'patch'], '/appointments/{appointment}/confirm', [BloodBankDashboardController::class, 'confirmAppointment'])->name('appointments.confirm');
    
// Donation records
Route::get('/blood/donor_management/record', [DonationController::class, 'recordBloodDonationForm'])->name('donation.record_form');
Route::post('/blood/donation/record', [DonationController::class, 'recordBloodDonation'])->name('blood.donation.record');
Route::get('/donor/details', [DonationController::class, 'getDonorDetails'])->name('donor.details');
// BLOOD BANK
Route::get('/blood-bank-dashboard', [BloodBankDashboardController::class, 'index'])->name('blood.bank.dashboard');
Route::post('/blood-bank/filter', [BloodBankDashboardController::class, 'filter'])->name('blood.bank.filter');
Route::patch('/blood-bank/requests/{bloodRequest}/update-status', [BloodBankDashboardController::class, 'updateStatus'])->name('blood.bank.requests.update-status');
Route::get('/blood-bank-dashboard', [BloodBankDashboardController::class, 'index'])->name('blood.bank.dashboard')->middleware('web');
Route::get('/blood-bank/upcoming-events', [BloodBankDashboardController::class, 'viewUpcomingEvents'])->name('blood.bank.upcoming.events');
Route::post('/bloodbank/events/store', [BloodBankEventController::class, 'store'])->name('bloodbank.events.store');
Route::get('/bloodbank/events/create', [BloodBankEventController::class, 'create'])->name('bloodbank.events.create');
Route::get('/bloodbank/events/{event}/edit', [BloodBankEventController::class, 'edit'])->name('bloodbank.events.edit');
Route::put('/bloodbank/events/{event}', [BloodBankEventController::class, 'update'])->name('bloodbank.events.update');
Route::delete('/bloodbank/events/{event}', [BloodBankEventController::class, 'destroy'])->name('bloodbank.events.destroy');
Route::get('/blood/manage-inventory', [BloodBankDashboardController::class, 'manageInventory'])->name('blood.manage_inventory');
Route::post('/save-blood-unit', [BloodBankDashboardController::class, 'saveBloodUnit'])->name('save-blood-unit');
Route::get('/blood-bank/payments', [BloodBankDashboardController::class, 'showPayments'])->name('blood-bank.payments');
});

// Hospital authentication routes
Route::get('/hospital/login', [HospitalAuthController::class, 'showLoginForm'])->name('hospital.login');
Route::post('/hospital/login', [HospitalAuthController::class, 'login'])->name('hospital.login.submit');
Route::post('/hospital/logout', [HospitalAuthController::class, 'logout'])->name('hospital.logout');

// Hospital routes
Route::prefix('hospital')->middleware('auth:hospital')->group(function () {
    Route::get('/dashboard', [HospitalDashboardController::class, 'index'])->name('hospital.dashboard');
    Route::post('/blood-request', [HospitalDashboardController::class, 'storeBloodRequest'])->name('hospital.blood.request');
     
});

// Blood Bank routes
Route::prefix('blood')->middleware('auth')->group(function () {
    Route::post('/save-blood-unit', [BloodBankDashboardController::class, 'saveBloodUnit'])->name('blood.save_blood_unit'); // Renamed route
   
});
Route::middleware('auth:hospital')->group(function () {
    Route::get('/hospital/blood-request', [HospitalDashboardController::class, 'showBloodRequestForm'])
        ->name('hospital.blood-request');
    Route::post('/hospital/blood-request/store', [HospitalDashboardController::class, 'storeBloodRequest'])
        ->name('hospital.blood-request.store');
        Route::get('/hospital/invoices', [HospitalDashboardController::class, 'showInvoices'])->name('hospital.invoices');
        Route::get('/hospital/invoices/{invoice}', [HospitalDashboardController::class, 'showInvoiceDetails'])->name('hospital.invoice.details');
        Route::get('/hospital/invoice/{invoice}/payment', [PaymentController::class, 'create'])->name('hospital.payment.create');
Route::post('/hospital/invoice/{invoice}/payment', [PaymentController::class, 'store'])->name('hospital.payment.store');
});
