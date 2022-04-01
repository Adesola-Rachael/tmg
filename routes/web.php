<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\articlesController; 
use App\Http\Controllers\AdminregController;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// getting main pages




Auth::routes(['register' => false]);

// if (User::where("is_admin","=", "1")->exists())
// {
	
//     Auth::routes();

// }
// else
// {
//     Auth::routes([
//         'register' => false
//     ]);
// }

Route::get('/register', function() {
    return redirect('/login');
});

Route::post('/register', function() {
    return redirect('/login');
});

Route::get('/',[pagesController::class, 'mainPage'])->name('home');

Route::get('services',[pagesController::class, 'getMainPageService'])->name('service');
Route::get('team',[pagesController::class, 'getMainPageTeam'])->name('team');
Route::get('about',[pagesController::class, 'getMainPageAbout'])->name('about');
Route::get('courses',[pagesController::class, 'getMainPageCourse'])->name('courses');
Route::post('courses',[pagesController::class, 'registerCourse'])->name('registerCourse');
Route::get('/slides',[pagesController::class, 'getMainPageslider']);
/*************Contact and mailing Pages***********************/ 
// Route::get('contact',[contactController::class, 'getContact'])->name('contact');
// Route::post('/send-message',[contactController::class, 'sendEmail'])->name('contact.send');
Route::get('contact_us',[pagesController::class, 'getmainContact'])->name('contact');
Route::post('contact_us',[pagesController::class, 'CreateMainPageContact'])->name('contact.send');
Route::get('/articles',[pagesController::class, 'getMainPageArticles'])->name('articles');
Route::get('/details/{id}',[pagesController::class, 'getArticleById'])->name('detail');
Route::post('/details/{article_id}',[pagesController::class, 'getArticleById'])->name('article.getById');
Route::post('/add-comment',[pagesController::class, 'addcomment'])->name('comment');
Route::post('/addReplies/{comment_id}',[pagesController::class, 'addReplies'])->name('addReplies');
Route::post('/newsletter',[pagesController::class, 'newsletter'])->name('newsletter');
Route::get('benefit',[pagesController::class, 'getBenefit'])->name('benefit');
Route::get('unit_includes/nav',[pagesController::class, 'nav_info']);


//getting authenticated pages
Route::get('/cube/dashboard', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('dashboard')->middleware('is_admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('cube/myprofile',[adminController::class, 'adminProfile']);
Route::post('cube/myprofile',[adminController::class, 'updateAdminProfile']);

Route::get('profile',[adminController::class, 'profile'])->name('profile');

Route::post('profile',[adminController::class, 'update_profile'])->name('update.profile');
Route::get('/cube/dashboard',[adminController::class, 'dashboard'])->name('dashboard'); 
Route::get('/cube/superadmin',[adminController::class, 'SuperAdmin'])->name('superadmin');
Route::get('/delete-admin/{id}',[adminController::class, 'deleteAdmin'])->name('delete_admin');

Route::post('cube/superadmin',[AdminregController::class, 'adminReg']);
Route::post('/info-edit/{id}',[adminController::class, 'updateCompany_info'])->name('update.info');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index' ])->name('home');
Route::get('/cube/dashboard',[adminController::class, 'dashboard'])->name('dashboard');
Route::get('/cube/manage_slides',[adminController::class, 'getSlides'])->name('slides');
Route::post('/cube/manage_slides',[adminController::class, 'createSlide'])->name('createSlide');
Route::post('edit-slider/{id}',[adminController::class, 'updateSlide'])->name('update.slide');
Route::get('/delete-slider/{id}',[adminController::class, 'deleteSlide'])->name('delete_slide');
// Route::post('/cube/manage_slides',[adminController::class, 'updateSlide'])->name('updateSlide');
Route::get('cube/manage_service',[adminController::class, 'getService'])->name('getService');
Route::post('cube/manage_service',[adminController::class, 'createService'])->name('createService');
Route::post('edit-service/{id}',[adminController::class, 'updateService'])->name('update.service');
Route::get('/delete-service/{id}',[adminController::class, 'deleteService'])->name('delete_service');
Route::get('cube/manage_others',[adminController::class, 'getOthers'])->name('others');
Route::post('cube/manage_others',[adminController::class, 'getFonts'])->name('createFonts');
Route::post('edit-font/{id}',[adminController::class, 'updateFont'])->name('update.font');
Route::get('/delete-font/{id}',[adminController::class, 'deleteFont'])->name('delete_font');
Route::get('cube/manage_believe',[adminController::class, 'getBelieve'])->name('believe');

// Route::post('cube/manage_others',[adminController::class, 'createBelieve'])->name('createBelieve');
Route::post('/edit-believe/{id}',[adminController::class, 'updateBelieve'])->name('update.believe');
// Route::post('/edit.believe/{id}',[adminPagesController::class,'updateBelieve'])->name('updateBelieve');
Route::get('cube/manage_course',[adminController::class, 'getCourse'])->name('course'); 
Route::post('cube/manage_course',[adminController::class, 'createCourse'])->name('create.course');
Route::post('/edit-course/{id}',[adminController::class, 'updateCourse'])->name('update.course');

Route::get('/delete-course/{id}',[adminController::class, 'deleteCourse'])->name('delete_course');
Route::get('cube/manage_service',[adminController::class, 'getService'])->name('getService');
Route::get('cube/manage_team',[adminController::class, 'getTeam'])->name('getService');
Route::post('/cube/manage_team',[adminController::class, 'createTeam'])->name('create.team');
Route::post('/edit-team/{id}',[adminController::class, 'updateTeam'])->name('update.team');
Route::get('/delete-team/{id}',[adminController::class, 'deleteTeam'])->name('delete_team');
Route::get('cube/manage_unit_image',[adminController::class, 'getUnitImage'])->name('UnitImage');

Route::post('/edit-unit_image/{id}',[adminController::class, 'postUnitImage'])->name('update.unit_image');

Route::get('cube/manage_benefit',[adminController::class, 'getBenefit'])->name('getBenefit');
Route::post('/cube/manage_benefit',[adminController::class, 'createBenefit'])->name('create.benefit');
Route::post('/edit-benefit/{id}',[adminController::class, 'updateBenefit'])->name('update.benefit');
Route::get('/delete-benefit/{id}',[adminController::class, 'deleteBenefit'])->name('delete_benefit');

// Route::post('cube/manage_benefit',[adminController::class, 'potBenefit'])->name('benefit');
Route::get('cube/manage_register_course',[adminController::class, 'getRegisteredCourse'])->name('register_course');
Route::get('cube/manage_mission',[adminController::class, 'getMission'])->name('getMission');
Route::post('/edit-mission/{id}',[adminController::class, 'updateMission'])->name('update.mission');

Route::get('cube/manage_articles',[articlesController::class, 'index']);
Route::post('cube/manage_articles',[articlesController::class, 'create'])->name('create.article');
Route::post('/edit-article/{id}',[articlesController::class, 'updateArticle'])->name('update.article');
Route::get('/delete-article/{id}',[articlesController::class, 'deleteArticle'])->name('delete_article');

Route::post('/create_cat',[articlesController::class, 'articleCategory'])->name('create.category');
Route::post('/edit-cat/{id}',[articlesController::class, 'updateCat'])->name('update.cat');
Route::get('/delete-cat/{id}',[articlesController::class, 'deleteCat'])->name('delete.cat');
Route::post('/create_author',[articlesController::class, 'createAuthor'])->name('create.author');
Route::post('/edit-author/{id}',[articlesController::class, 'updateAuthor'])->name('update.author');
Route::get('/delete-author/{id}',[articlesController::class, 'deleteAuthor'])->name('delete.author');
 
