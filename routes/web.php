<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;

//___________________________________// START \\______________________________________________//
Route::get('/', [HomeController::class, 'welcome'])->name('/');

/**______________________________________________________________________________________________
 * View Page => ALL
 * ______________________________________________________________________________________________
 */
Route::get('comming/soon', [HomeController::class, 'comming_soon'])->name('comming_soon');
//______________ ABOUT US
Route::get('page/about-us', [HomeController::class, 'about'])->name('page.about-us');
Route::get('page/personal-info', [HomeController::class, 'personalInfo'])->name('page.personal-info');
//______________ SERVICES
Route::get('page/services', [HomeController::class, 'services'])->name('page.services');
Route::get('page/services-details/{slug}', [HomeController::class, 'servicesDetails'])->name('page.services-details');
//______________ PROJECTS
Route::get('page/projects', [HomeController::class, 'projects'])->name('page.projects');
Route::get('page/projects-details/{slug}', [HomeController::class, 'projectsDetails'])->name('page.projects-details');
//______________ BLOGS
Route::get('page/blogs', [HomeController::class, 'blogs'])->name('page.blogs');
Route::get('page/blogs-details/{slug}', [HomeController::class, 'blogsDetails'])->name('page.blogs-details');
Route::get('page/blogs/tag/{slug}', [HomeController::class, 'blogsTag'])->name('page.blogs-tag');
Route::get('page/blogs-author/{slug}', [HomeController::class, 'blogsDetails'])->name('page.blogs-author');

Route::post('page/blogs/{blog}/comments', [HomeController::class, 'blogsCommentsStore'])->name('page.blogs-comments.store');

Route::get('page/blogs/search', [HomeController::class, 'blogsSearch'])->name('page.blogs.search');
Route::get('page/blogs/category/{slug}', [HomeController::class, 'blogsCategory'])->name('page.blogs.category');

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
    Route::resource('roles', RoleController::class);

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Blog Routes
    Route::resource('blogs', BlogController::class);
    
    // Features
    Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
    Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
    Route::post('/features/update', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');

    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::post('/testimonials/update', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Story
    Route::get('/story', [StoryController::class, 'index'])->name('story.index');
    Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');

    // Services
    Route::resource('services', ServiceController::class);
    Route::delete('services/image/{image}', [ServiceController::class, 'deleteImage'])->name('services.image.delete');
    Route::delete('services/attachment/{attachment}', [ServiceController::class, 'deleteAttachment'])->name('services.attachment.delete');

    // Projects
    Route::resource('projects', ProjectController::class);
    Route::delete('projects/image/{image}', [ProjectController::class, 'deleteImage'])->name('projects.image.delete');
    // AJAX image delete
    Route::post('projects/image/delete', [ProjectController::class, 'deleteImage'])->name('projects.image.delete');
    
    // Achievements
    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements.index');
    Route::post('/achievements', [AchievementController::class, 'store'])->name('achievements.store');
    Route::post('/achievements/update', [AchievementController::class, 'update'])->name('achievements.update');
    Route::delete('/achievements/{id}', [AchievementController::class, 'destroy'])->name('achievements.destroy');

    // Teams
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::post('/team', [TeamController::class, 'store'])->name('team.store');
    Route::post('/team/update', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy');

    // Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Missions
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
