<?php

use App\Http\Controllers\Backend\AlbumController;
use App\Http\Controllers\Backend\Career\Basic_setup\JobCategoryController;
use App\Http\Controllers\Backend\Career\JobController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\CustomerInquiryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Homepage\CallActionController;
use App\Http\Controllers\Backend\Homepage\CoreValueController;
use App\Http\Controllers\Backend\Homepage\GeneralGrievanceController;
use App\Http\Controllers\Backend\Homepage\MissionVisionController;
use App\Http\Controllers\Backend\Homepage\RecruitmentProcessController;
use App\Http\Controllers\Backend\Homepage\WelcomeController;
use App\Http\Controllers\Backend\Homepage\SliderController;
use App\Http\Controllers\Backend\Homepage\WhyUsController;
use App\Http\Controllers\Backend\ManagingDirectorController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\News\BlogCategoryController;
use App\Http\Controllers\Backend\News\BlogController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Page\PageSectionElementController;
use App\Http\Controllers\Backend\Room\AmenityController;
use App\Http\Controllers\Backend\Room\RoomController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\Activity\Basic_setup\CountryController;
use App\Http\Controllers\Backend\Activity\Basic_setup\PackageCategoryController;
use App\Http\Controllers\Backend\Activity\Basic_setup\PackageRibbonController;
use App\Http\Controllers\Backend\Activity\PackageController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/setting/theme-mode',  [DashboardController::class, 'themeMode'])->name('setting.theme-mode');


Route::prefix('user/')->name('user.')->middleware('auth')->group(function () {
    //signed-in user routes
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::get('profile/{slug?}', [UserProfileController::class, 'profile'])->name('profile');
    Route::get('profile/edit/{slug}', [UserProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('profile/socials/', [UserProfileController::class, 'socialsUpdate'])->name('profile.socials');
    Route::put('profile/{id}/update', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('user-image/update/', [UserProfileController::class, 'imageupdate'])->name('imageupdate');
    Route::post('profile/oldpassword', [UserProfileController::class, 'checkoldpassword'])->name('oldpassword');
    Route::post('profile/password', [UserProfileController::class, 'profilepassword'])->name('password');
    Route::post('user/removeaccount', [UserProfileController::class, 'removeAccount'])->name('removeaccount');
    //end of signed-in user routes

    //user related routes
    Route::get('filemanager', [UserController::class, 'filemanager'])->name('filemanager');
    Route::post('/user-management/status-update', [UserController::class,'statusUpdate'])->name('user-management.status-update');
    Route::post('/user-management/data', [UserController::class,'getDataForDataTable'])->name('user-management.data');
    Route::get('/user-management/trash', [UserController::class,'trash'])->name('user-management.trash');
    Route::post('/user-management/trash/{id}/restore', [UserController::class,'restore'])->name('user-management.restore');
    Route::delete('/user-management/trash/{id}/remove', [UserController::class,'removeTrash'])->name('user-management.remove-trash');
    Route::resource('user-management', UserController::class)->names('user-management');

});

Route::prefix('career/')->name('career.')->middleware('auth')->group(function () {

    Route::prefix('basic-setup/')->name('basic_setup.')->group(function () {
        //category
        Route::get('/category/trash', [JobCategoryController::class,'trash'])->name('category.trash');
        Route::post('/category/trash/{id}/restore', [JobCategoryController::class,'restore'])->name('category.restore');
        Route::delete('/category/trash/{id}/remove', [JobCategoryController::class,'removeTrash'])->name('category.remove-trash');
        Route::resource('category', JobCategoryController::class)->names('category');
    });

    //package
    Route::post('/job/status-update', [JobController::class,'statusUpdate'])->name('job.status-update');
    Route::get('/job/trash', [JobController::class,'trash'])->name('job.trash');
    Route::post('/job/trash/{id}/restore', [JobController::class,'restore'])->name('job.restore');
    Route::delete('/job/trash/{id}/remove', [JobController::class,'removeTrash'])->name('job.remove-trash');
    Route::resource('job', JobController::class)->names('job');

});


Route::prefix('news/')->name('news.')->middleware('auth')->group(function () {

    Route::prefix('basic-setup/')->name('basic_setup.')->group(function () {
        //category
        Route::get('/category/trash', [BlogCategoryController::class,'trash'])->name('category.trash');
        Route::post('/category/trash/{id}/restore', [BlogCategoryController::class,'restore'])->name('category.restore');
        Route::delete('/category/trash/{id}/remove', [BlogCategoryController::class,'removeTrash'])->name('category.remove-trash');
        Route::resource('category', BlogCategoryController::class)->names('category');
    });

    //blog
    Route::get('/blog/trash', [BlogController::class,'trash'])->name('blog.trash');
    Route::post('/blog/trash/{id}/restore', [BlogController::class,'restore'])->name('blog.restore');
    Route::delete('/blog/trash/{id}/remove', [BlogController::class,'removeTrash'])->name('blog.remove-trash');
    Route::resource('blog', BlogController::class)->names('blog');
});

Route::prefix('homepage/')->name('homepage.')->middleware('auth')->group(function () {
    Route::get('/slider/trash', [SliderController::class,'trash'])->name('slider.trash');
    Route::post('/slider/trash/{id}/restore', [SliderController::class,'restore'])->name('slider.restore');
    Route::delete('/slider/trash/{id}/remove', [SliderController::class,'removeTrash'])->name('slider.remove-trash');
    Route::resource('slider', SliderController::class)->names('slider');

    //Welcome
    Route::get('welcome', [WelcomeController::class, 'create'])->name('welcome.create');
    Route::resource('welcome', WelcomeController::class)->only(['store', 'update'])->names('welcome');

    //call action
    Route::get('call-action', [CallActionController::class, 'create'])->name('call_action.create');
    Route::resource('call-action', CallActionController::class)->only(['store', 'update'])->names('call_action');

    //call action
    Route::get('core-value', [CoreValueController::class, 'create'])->name('core_value.create');
    Route::resource('core-value', CoreValueController::class)->only(['store', 'update'])->names('core_value');

    //mission vision
    Route::get('mission-vision', [MissionVisionController::class, 'create'])->name('mission_vision.create');
    Route::resource('mission-vision', MissionVisionController::class)->only(['store', 'update'])->names('mission_vision');

    //general grievance
    Route::get('general-grievance', [GeneralGrievanceController::class, 'create'])->name('general_grievance.create');
    Route::resource('general-grievance', GeneralGrievanceController::class)->only(['store', 'update'])->names('general_grievance');

    //why us
    Route::get('why-us', [WhyUsController::class, 'create'])->name('why_us.create');
    Route::resource('why-us', WhyUsController::class)->only(['store', 'update'])->names('why_us');

    //recruitment process
    Route::get('recruitment-process', [RecruitmentProcessController::class, 'create'])->name('recruitment_process.create');
    Route::resource('recruitment-process', RecruitmentProcessController::class)->only(['store', 'update'])->names('recruitment_process');
});


//room
Route::put('/room-upload-gallery/{id}', [RoomController::class,'uploadGallery'])->name('room.gallery-update');
Route::post('/room/image-delete', [RoomController::class,'deleteGallery'])->name('room.gallery-delete');
Route::get('/room/get-gallery/{id}', [RoomController::class,'getGallery'])->name('room.gallery-display');
Route::get('/room/gallery/{key}', [RoomController::class,'gallery'])->name('room.gallery');
Route::post('/room/status-update', [RoomController::class,'statusUpdate'])->name('room.status-update');
Route::post('/room/data', [RoomController::class,'getDataForDataTable'])->name('room.data');
Route::get('/room/trash', [RoomController::class,'trash'])->name('room.trash');
Route::post('/room/trash/{id}/restore', [RoomController::class,'restore'])->name('room.restore');
Route::delete('/room/trash/{id}/remove', [RoomController::class,'removeTrash'])->name('room.remove-trash');
Route::resource('room', RoomController::class)->names('room')->middleware('auth');

Route::prefix('room/basic-setup/')->name('room.basic_setup.')->middleware('auth')->group(function () {
    //category
    Route::get('amenity/trash', [AmenityController::class,'trash'])->name('amenity.trash');
    Route::post('amenity/trash/{id}/restore', [AmenityController::class,'restore'])->name('amenity.restore');
    Route::delete('amenity/trash/{id}/remove', [AmenityController::class,'removeTrash'])->name('amenity.remove-trash');
    Route::resource('amenity', AmenityController::class)->names('amenity');
});


//testimonials
Route::get('/testimonial/trash', [WelcomeController::class,'trash'])->name('testimonial.trash');
Route::post('/testimonial/trash/{id}/restore', [WelcomeController::class,'restore'])->name('testimonial.restore');
Route::delete('/testimonial/trash/{id}/remove', [WelcomeController::class,'removeTrash'])->name('testimonial.remove-trash');
Route::resource('testimonial', TestimonialController::class)->names('testimonial')->middleware('auth');

//services
Route::get('/service/trash', [ServiceController::class,'trash'])->name('service.trash');
Route::post('/service/trash/{id}/restore', [ServiceController::class,'restore'])->name('service.restore');
Route::delete('/service/trash/{id}/remove', [ServiceController::class,'removeTrash'])->name('service.remove-trash');
Route::resource('service', ServiceController::class)->names('service')->middleware('auth');

//managing director
Route::post('/managing-director/order', [ManagingDirectorController::class,'orderUpdate'])->name('managing_director.order');
Route::get('/managing-director/trash', [ManagingDirectorController::class,'trash'])->name('managing_director.trash');
Route::post('/managing-director/trash/{id}/restore', [ManagingDirectorController::class,'restore'])->name('managing_director.restore');
Route::delete('/managing-director/trash/{id}/remove', [ManagingDirectorController::class,'removeTrash'])->name('managing_director.remove-trash');
Route::resource('managing-director', ManagingDirectorController::class)->names('managing_director')->middleware('auth');

//team
Route::post('/team/order', [TeamController::class,'orderUpdate'])->name('team.order');
Route::get('/team/trash', [TeamController::class,'trash'])->name('team.trash');
Route::post('/team/trash/{id}/restore', [TeamController::class,'restore'])->name('team.restore');
Route::delete('/team/trash/{id}/remove', [TeamController::class,'removeTrash'])->name('team.remove-trash');
Route::resource('team', TeamController::class)->names('team')->middleware('auth');

//client
Route::get('/client/trash', [ClientController::class,'trash'])->name('client.trash');
Route::post('/client/trash/{id}/restore', [ClientController::class,'restore'])->name('client.restore');
Route::delete('/client/trash/{id}/remove', [ClientController::class,'removeTrash'])->name('client.remove-trash');
Route::resource('client', ClientController::class)->names('client')->middleware('auth');


//Album
Route::put('/album-upload-gallery/{id}', [AlbumController::class,'uploadGallery'])->name('album.gallery-update');
Route::post('/album/image-delete', [AlbumController::class,'deleteGallery'])->name('album.gallery-delete');
Route::get('/album/get-gallery/{id}', [AlbumController::class,'getGallery'])->name('album.gallery-display');
Route::get('/album/gallery/{key}', [AlbumController::class,'gallery'])->name('album.gallery');
Route::get('/album/trash', [AlbumController::class,'trash'])->name('album.trash');
Route::post('/album/trash/{id}/restore', [AlbumController::class,'restore'])->name('album.restore');
Route::delete('/album/trash/{id}/remove', [AlbumController::class,'removeTrash'])->name('album.remove-trash');
Route::resource('album', AlbumController::class)->names('album')->middleware('auth');

//for menu
Route::get('/add-page-to-menu',[MenuController::class,'addPage'])->name('menu.page');
Route::get('/add-service-to-menu',[MenuController::class,'addService'])->name('menu.service');
Route::get('add-blog-to-menu',[MenuController::class,'addBlog'])->name('menu.blog');
Route::get('add-custom-link',[MenuController::class,'addCustomLink'])->name('menu.custom');
Route::get('/update-menu',[MenuController::class,'updateMenu'])->name('menu.updateMenu');
Route::post('/update-menuitem/{id}',[MenuController::class,'updateMenuItem'])->name('menu.update_menu_item');
Route::get('/delete-menuitem/{id}/{key}/{in?}/{inside?}',[MenuController::class,'deleteMenuItem'])->name('menu.delete_menu_item');
Route::post('menu', [MenuController::class,'store'])->name('menu.store');
Route::get('/menu/{slug?}', [MenuController::class,'index'])->name('menu.index');
Route::get('/menu/{id}/delete',[MenuController::class,'destroy'])->name('menu.delete');
Route::resource('menu', MenuController::class)->names('menu')->middleware('auth');

//pages
Route::post('/page/status-update', [PageController::class,'statusUpdate'])->name('page.status-update');
Route::post('/page/data', [PageController::class,'getDataForDataTable'])->name('page.data');
Route::get('/page/trash', [PageController::class,'trash'])->name('page.trash');
Route::post('/page/trash/{id}/restore', [PageController::class,'restore'])->name('page.restore');
Route::delete('/page/trash/{id}/remove', [PageController::class,'removeTrash'])->name('page.remove-trash');
Route::resource('page', PageController::class)->names('page')->middleware('auth');


//page section and element
Route::post('/section-element/multiple-list-update', [PageSectionElementController::class,'multipleSectionUpdate'])->name('section-element.multiple-section-update');
Route::post('/section-element/status-update', [PageSectionElementController::class,'statusUpdate'])->name('section-element.status-update');
Route::post('/section-element/data', [PageSectionElementController::class,'getDataForDataTable'])->name('section-element.data');
Route::get('/section-element/trash', [PageSectionElementController::class,'trash'])->name('section-element.trash');
Route::post('/section-element/trash/{id}/restore', [PageSectionElementController::class,'restore'])->name('section-element.restore');
Route::delete('/section-element/trash/{id}/remove', [PageSectionElementController::class,'removeTrash'])->name('section-element.remove-trash');
Route::resource('section-element', PageSectionElementController::class)->names('section-element')->middleware('auth');


Route::put('/section-element-upload-gallery/{id}', [PageSectionElementController::class,'uploadGallery'])->name('section-element.gallery-update');
Route::post('/section-element/image-delete', [PageSectionElementController::class,'deleteGallery'])->name('section-element.gallery-delete');
Route::get('/section-element/gallery/{id}', [PageSectionElementController::class,'getGallery'])->name('section-element.gallery-display');

Route::resource('customer-inquiry', CustomerInquiryController::class)->names('customer-inquiry');


Route::resource('setting', SettingController::class)->names('setting')->middleware('auth');


//Route::get('/404', [DashboardController::class, 'errorPage'])->name('404');
