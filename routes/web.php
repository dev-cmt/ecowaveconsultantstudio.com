<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

//___________________________________// START \\______________________________________________//
Route::get('/', [HomeController::class, 'welcome'])->name('/');

/**______________________________________________________________________________________________
 * View Page => ALL
 * ______________________________________________________________________________________________
 */
Route::get('comming/soon', [HomeController::class, 'comming_soon'])->name('comming_soon');
//______________ ABOUT US
Route::get('page/about-us', [HomeController::class, 'about'])->name('page.about-us');
//______________ PROPERTIES
Route::get('page/properties', [HomeController::class, 'properties'])->name('page.properties');
Route::get('page/properties-details/{slug}', [HomeController::class, 'propertyDetails'])->name('page.property-details');
//______________ SERVICES
Route::get('page/services', [HomeController::class, 'services'])->name('page.services');
Route::get('page/services-details/{slug}', [HomeController::class, 'servicesDetails'])->name('page.services-details');
//______________ CONTACT
Route::get('page/contact', [HomeController::class, 'contact'])->name('page.contact');
Route::post('page/contact', [HomeController::class, 'contactStore'])->name('page.contact.store');
//______________ APPOINMENT FROM
Route::get('page/appoinment-from', [HomeController::class, 'appoinmentFrom'])->name('page.appoinment-from');
Route::post('page/appoinment-submit', [HomeController::class, 'appoinmentSubmit'])->name('page.appointment.submit');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Admin dashboard
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Features
    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
    Route::post('/features/update', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');

    // Properties
    Route::resource('properties', PropertyController::class);
    Route::delete('properties/image/{image}', [PropertyController::class, 'deleteImage'])->name('properties.image.delete');
    Route::delete('properties/attachment/{attachment}', [PropertyController::class, 'deleteAttachment'])->name('properties.attachment.delete');

    // Application
    Route::get('/applications', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/application-image-download/{id}/{type}', [ApplicationController::class, 'downloadImage'])->name('application.image.download');
    Route::post('/application-bulk-export', [ApplicationController::class, 'bulkExport'])->name('application.bulk.export');
    Route::delete('/application-delete/{id}', [ApplicationController::class, 'delete'])->name('application.delete');
    Route::post('/application-bulk-delete', [ApplicationController::class, 'bulkDelete'])->name('application.bulk.delete');
    Route::get('/application-image-zip-download/{id}', [ApplicationController::class, 'zipImageDownload'])->name('zip.image.download');

    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::post('/testimonials/update', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Story
    Route::get('/story', [StoryController::class, 'index'])->name('story.index');
    Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');

    // Services Routes
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::post('/services/update', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/destroy/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Team
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::post('/team/update', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy');

    // Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Mission
    Route::get('/mission', [MissionController::class, 'index'])->name('mission.index');
    Route::put('/mission/{id}', [MissionController::class, 'update'])->name('mission.update');

    // contact
    Route::get('/contact', [ContactController::class, 'indexContact'])->name('contact.index');
    Route::put('/contact/{id}', [ContactController::class, 'updateContact'])->name('contact.update');

    Route::get('/contact-submissions', [ContactController::class, 'indexSubmission'])->name('contact.submissions.index');
    Route::get('/contact-submissions/{id}', [ContactController::class, 'showSubmission'])->name('contact.submissions.show');
    Route::delete('/contact-submissions/{id}', [ContactController::class, 'destroySubmission'])->name('contact.submissions.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/settings-update', [SettingController::class, 'update'])->name('setting.update');
});

require __DIR__.'/auth.php';
