<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// Route::get('/', function () {
// 	$listings = array();
//     return view('home', compact('listings'));

// });

Route::get('/', [Controllers\FrontendController::class, 'index'])->name('frontend');
Route::get('/about-us', [Controllers\FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/category', [Controllers\FrontendController::class, 'categoryWise'])->name('category.wise');
Route::get('all-projects', [Controllers\FrontendController::class, 'projects'])->name('all-projects');
Route::get('project-detail', [Controllers\FrontendController::class, 'projectDetail'])->name('project-detail');
Route::get('project-gallery', [Controllers\FrontendController::class, 'projectGallery'])->name('project-gallery');
Route::get('share-project', [Controllers\FrontendController::class, 'shareProject'])->name('share-project');


Route::group(['prefix' => 'checkout'], function(){

    Route::get('billing', [Controllers\DonationController::class, 'billing'])->name('checkout-billing');
    Route::post('billing', [Controllers\DonationController::class, 'checkout'])->name('checkout');
    Route::get('confirm', [Controllers\DonationController::class, 'confirm'])->name('checkout-confirm');
    Route::get('donated', [Controllers\DonationController::class, 'donated'])->name('donated-confirmed');
    
    Route::post('trans-donation', [Controllers\DonationController::class, 'submitDonation'])->name('trans-donation');

});

Auth::routes();

Route::get('/admin', function () {
	
    return redirect()->route('admin.login');

});

//  admin  routes
Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
        Route::post('login', [App\Http\Controllers\AdminController::class, 'authenticated'])->name('admin.authenticate');
    });

    Route::group(['middleware'=>'admin.auth'], function(){

        Route::post('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [Controllers\AdminController::class, 'index'])->name('admin.home');
        Route::get('/edit-profile', [Controllers\AdminController::class, 'profile'])->name('admin.edit-profile');
        Route::post('/update-profile', [Controllers\AdminController::class, 'updateProfile'])->name('admin.update-profile');

        Route::group(['prefix' => 'users'], function(){ 
            Route::get('/', [Controllers\AdminController::class, 'userList'])->name('admin.user-list');
            Route::get('/edit-user', [Controllers\AdminController::class, 'editUser'])->name('admin.edit-user');
            Route::get('/delete-user', [Controllers\User\UserController::class, 'destroy'])->name('admin.delete-user');
            
        });


        Route::group(['prefix' => 'category'], function(){   

            Route::get('/', [Controllers\CategoryController::class, 'index'])->name('admin.category-list');
            Route::get('/create', [Controllers\CategoryController::class, 'create'])->name('admin.create-category');
            Route::post('/add', [Controllers\CategoryController::class, 'store'])->name('admin.add-category');
            Route::get('/edit', [Controllers\CategoryController::class, 'edit'])->name('admin.edit-category');
            Route::post('/update', [Controllers\CategoryController::class, 'update'])->name('admin.update-category');
            Route::get('/delete', [Controllers\CategoryController::class, 'destroy'])->name('admin.delete-category');

        });


        Route::group(['prefix' => 'donations'], function(){ 
           
            Route::get('/', [App\Http\Controllers\DonationController::class, 'index'])->name('admin.donations');
            Route::get('/view-project-donations/{id}', [App\Http\Controllers\DonationController::class, 'show'])->name('admin.project-donations');
            Route::get('/delete', [App\Http\Controllers\DonationController::class, 'destroy'])->name('admin.delete-donation');
        });
        
        
        Route::group(['prefix' => 'organization'], function(){ 
           
            Route::get('/', [App\Http\Controllers\OrgController::class, 'index'])->name('admin.organization');
            
        });  


        Route::group(['prefix' => 'projects'], function(){ 
            
            // Route::get('/', [Controllers\ProjectController::class, 'index'])->name('admin.project-list');
            // Route::get('/edit-project', [Controllers\ProjectController::class, 'edit'])->name('admin.edit-project');
            // Route::post('/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('admin.update');
            // Route::get('/view-project/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('admin.view-project');
            // Route::get('/approve-project/{id}', [App\Http\Controllers\ProjectController::class, 'approve'])->name('admin.approve');
            // Route::get('/view-user-project', [Controllers\ProjectController::class, 'viewProjects'])->name('admin.view-user-project');
            // Route::get('/delete-project', [Controllers\ProjectController::class, 'destroy'])->name('admin.delete-project');
            
            Route::get('/', [Controllers\ProjectController::class, 'index'])->name('admin.project-list');
            Route::get('/edit-project', [Controllers\ProjectController::class, 'edit'])->name('admin.edit-project');
            Route::post('/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('admin.update');
            Route::get('/view-project/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('admin.view-project');
            Route::get('/approve-project/{id}', [App\Http\Controllers\ProjectController::class, 'approve'])->name('admin.approve');
            Route::get('/view-user-project', [Controllers\ProjectController::class, 'viewProjects'])->name('admin.view-user-project');
            Route::get('/cancel-project-for-donation/{id}', [App\Http\Controllers\ProjectController::class, 'cancel'])->name('admin.cancel');
            Route::get('/delete-project', [Controllers\ProjectController::class, 'destroy'])->name('admin.delete-project');
            
        });


    });

   
});



Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    
    Route::get('/organization', [Controllers\OrganizationController::class, 'index'])->name('organization');
    Route::get('/upload-organization-docs', [Controllers\OrganizationController::class, 'uploadDocs'])->name('upload-docs');
    Route::post('/upload-organization-docs', [Controllers\OrganizationController::class, 'uploadOrgDocs'])->name('upload-organization-docs');
    Route::post('/organization', [Controllers\OrganizationController::class, 'store'])->name('register-organization');

    Route::get('/fundraiser', [App\Http\Controllers\FundRaiserController::class, 'index'])->name('fundraiser');
    Route::get('/projects', [App\Http\Controllers\User\ProjectController::class, 'index'])->name('projects');
    Route::get('/new-project', [App\Http\Controllers\User\ProjectController::class, 'create'])->name('new-project');
    Route::post('/add-project', [App\Http\Controllers\User\ProjectController::class, 'store'])->name('add-project');
    Route::get('/edit-project', [App\Http\Controllers\User\ProjectController::class, 'edit'])->name('edit-project');
    Route::get('/view-project/{id}', [App\Http\Controllers\User\ProjectController::class, 'show'])->name('view-project');
    Route::post('/update-project/{id}', [App\Http\Controllers\User\ProjectController::class, 'update'])->name('update-project');
    Route::get('/delete-project/{id}', [App\Http\Controllers\User\ProjectController::class, 'destroy'])->name('delete-project');

    Route::get('/view-project-donations/{id}', [App\Http\Controllers\User\DonationController::class, 'show'])->name('view-project-donations');

    Route::get('/donations', [App\Http\Controllers\User\DonationController::class, 'index'])->name('donations');
    
    Route::get('/our-organization', [Controllers\User\OrganizationController::class, 'index'])->name('our-organization');
    Route::get('/edit-our-organization', [Controllers\User\OrganizationController::class, 'edit'])->name('edit-our-organization');
    Route::post('/update-our-organization', [Controllers\User\OrganizationController::class, 'update'])->name('update-our-organization');


    Route::get('/edit-profile', [Controllers\User\UserController::class, 'profile'])->name('edit-profile');
    Route::post('/update-profile', [Controllers\User\UserController::class, 'updateProfile'])->name('update-profile');
});
