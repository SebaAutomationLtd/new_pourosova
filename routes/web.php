<?php

use App\Http\Controllers;
use App\Http\Controllers\Admin\PdfReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\Frontend\AjaxController;
use App\Http\Controllers\Frontend\MemberAccessController;
use App\Http\Controllers\Admin\ActiveController;
use App\Http\Controllers\Admin\BosotBariController;
use App\Http\Controllers\Admin\BusinessHoldingController;
use App\Http\Controllers\Admin\BusinessController;
use Illuminate\Support\Facades\Route;

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

//FRONTEND ROUTES

Route::namespace('App\Http\Controllers\Frontend')->group(function () {

    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('administration', [FrontController::class, 'administration'])->name('administration');
    Route::get('citizen_chartered', [FrontController::class, 'citizen_chartered'])->name('citizen_chartered');
    Route::get('contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('counselor', [FrontController::class, 'counselor'])->name('counselor');
    Route::get('download', [FrontController::class, 'download'])->name('download');
    Route::get('educational_info', [FrontController::class, 'educational_info'])->name('edu.info');
    Route::get('engineering_department', [FrontController::class, 'engineering_department'])->name('eng.dept');
    Route::get('health', [FrontController::class, 'health'])->name('health');
    Route::get('information_service_center', [FrontController::class, 'information_service_center'])->name('info.center');
    Route::get('mayor_profile_contact', [FrontController::class, 'mayor_profile_contact'])->name('mayor.contact');
    Route::get('municipality_employee', [FrontController::class, 'municipality_employee'])->name('munici.emp');
    Route::get('municipality_map', [FrontController::class, 'municipality_map'])->name('munici.map');
    Route::get('municipality_organogram', [FrontController::class, 'municipality_organogram'])->name('munici.org');
    Route::get('notice', [FrontController::class, 'notice'])->name('notice');
    Route::get('once_eye', [FrontController::class, 'once_eye'])->name('once_eye');
    Route::get('pourosova_info', [FrontController::class, 'pourosova_info'])->name('pouro.info');
    Route::get('role_of_honour', [FrontController::class, 'role_of_honour'])->name('role.honour');
    Route::get('uno', [FrontController::class, 'uno'])->name('uno');


    Route::get('bosot-bari-registration', [FrontController::class, 'bosot_bari_create'])->name('reg.bosot-bari');
    Route::post('bosot-bari-store', [RegistrationController::class, 'bosot_bari_store'])->name('bosot-bari-store');
    Route::get('business-hold-registration', [FrontController::class, 'business_hold_create'])->name('reg.business-hold');
    Route::post('business-store', [RegistrationController::class, 'business_store'])->name('reg.business-store');
    Route::get('business-registration', [FrontController::class, 'business_create'])->name('reg.business');
    Route::post('business-ind-store', [RegistrationController::class, 'business_ind_store'])->name('business-ind-store');

    Route::get('osthai-nagorik-registration', [FrontController::class, 'osthai_nagor_create'])->name('reg.osthai-nagorik');

     //member login
    Route::get('/login', function () {
        return view('frontend.member.member_login_page');
    });

    Route::get('/member-dashboard', [MemberAccessController::class, 'MemberDashboard'])->name('member.dashboard');

    Route::get('/member_change_password', [MemberAccessController::class, 'member_change_password'])->name('member.change_password');
    Route::post('/member_update_password', [MemberAccessController::class, 'member_update_password'])->name('member.update_password'); 
    Route::post('/member_photo_update', [MemberAccessController::class, 'member_photo_update'])->name('member.photo_update'); 

});

// Ajax

Route::get('/getvillageinfo/{id}', [AjaxController::class, 'getvillageinfo']);
Route::get('/getduplicatebirthnid/{value}/{value2}', [AjaxController::class, 'getduplicatebirthnid']);
Route::get('/getduplicatenumber/{value}/', [AjaxController::class, 'getduplicatenumber']);

Route::get('/getdistrictinfo/{id}', [AjaxController::class, 'getdistrictinfo']);
Route::get('/getupazilainfo/{id}', [AjaxController::class, 'getupazilainfo']);

//FRONTEND ROUTES END


//Admin Daynamic Start

Route::get('/admin/login', [Controllers\Admin\AdminController::class, 'admin_login_form'])->name('admin.login');
Route::post('/admin/login', [Controllers\Admin\AdminController::class, 'admin_login'])->name('admin.login');

Route::middleware('auth')->group(function () {

    Route::prefix('/admin')->group(function() {

        Route::get('dashboard', [Controllers\Admin\AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('logout', [Controllers\Admin\AdminController::class, 'admin_logout'])->name('admin.logout');

        Route::get('create-user', [UserController::class, 'create_user_form'])->name('user.create');
        Route::post('store-user', [UserController::class, 'store_user'])->name('user.store');
        Route::get('user-list', [UserController::class, 'index'])->name('user.index');
        Route::get('edit-user/{id}', [UserController::class, 'edit_user_form'])->name('user.edit');
        Route::post('update-user/{id}', [UserController::class, 'update_user'])->name('user.update');
        Route::get('delete-user/{id}', [UserController::class, 'delete_user'])->name('user.delete');

        Route::resource('roles', RoleController::class);

        Route::get('/khosora-report', [PdfReportController::class, 'khosora_report'])->name('khosora-report');
        Route::post('/khosora-report', [PdfReportController::class, 'khosora_report_download'])->name('khosora-report');
    });

    Route::name('admin.setting.')->prefix('admin/setting')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/change_password', 'AdminController@change_password')->name('change_password');
        Route::post('/update_password', 'AdminController@update_password')->name('update_password');

        Route::get('/change_email', 'AdminController@change_email')->name('change_email');
        Route::post('/update_email', 'AdminController@update_email')->name('update_email');


    });

    Route::name('admin.header.')->prefix('admin/header')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/logo', 'HeaderController@logo')->name('logo');
        Route::post('/logo', 'HeaderController@logo_store')->name('logo');
        Route::get('/marquee', 'HeaderController@marquee')->name('marquee');
        Route::post('/marquee', 'HeaderController@marquee_store')->name('marquee');
        Route::get('/marquee/delete/{id}', 'HeaderController@marquee_delete')->name('marquee.delete');
        Route::get('/councilor', 'HeaderController@councilor')->name('councilor');
    });

    Route::name('admin.index.')->prefix('admin/index')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/slider', 'IndexController@slider')->name('slider');
        Route::post('/slider', 'IndexController@slider_store')->name('slider');
        Route::get('/slider-delete/{id}', 'IndexController@delete')->name('slider.delete');
    });

    Route::name('admin.web.')->prefix('admin/web')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/councilor/view', 'CouncilorController@index')->name('councilor');
        Route::get('/councilor/add', 'CouncilorController@create')->name('councilor.create');
        Route::post('/councilor/store', 'CouncilorController@councilor_store')->name('councilor.store');
        Route::get('/councilor/delete/{id}', 'CouncilorController@councilor_delete')->name('councilor.delete');
        Route::get('/councilor/edit/{id}', 'CouncilorController@councilor_edit')->name('councilor.edit');
        Route::post('/councilor/update/{id}', 'CouncilorController@councilor_update')->name('councilor.update');

        Route::get('/councilor/female/view', 'CouncilorController@indexFemale')->name('councilor.female');
        Route::get('/councilor/female/add', 'CouncilorController@createFemale')->name('councilor.female.create');
        Route::post('/councilor/female/store', 'CouncilorController@female_store')->name('councilor.female.store');
        Route::get('/councilor/female/delete/{id}', 'CouncilorController@councilor_female_delete')->name('councilor.female.delete');
        Route::get('councilor/female/edit/{id}', 'CouncilorController@female_edit')->name('councilor.female.edit');
        Route::post('councilor/female/update/{id}', 'CouncilorController@female_update')->name('councilor.female.update');

        Route::get('/mayor', 'MayorController@index')->name('mayor');
        Route::get('/mayor/add', 'MayorController@create')->name('mayor.create');
        Route::post('/mayor/add', 'MayorController@store')->name('mayor.store');
        Route::get('/mayor/delete/{id}', 'MayorController@delete')->name('mayor.delete');
        Route::get('/mayor/edit/{id}', 'MayorController@edit')->name('mayor.edit');
        Route::post('/mayor/update/{id}', 'MayorController@update')->name('mayor.update');
    });

    Route::name('admin.web.left.')->prefix('admin/web/left')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/application/view', 'LeftSidebarController@appView')->name('app');
        Route::post('/application/store', 'LeftSidebarController@app_store')->name('app.store');
        Route::get('/application/delete/{id}', 'LeftSidebarController@app_delete')->name('app.delete');
        Route::get('/application/edit/{id}', 'LeftSidebarController@left_app_edit')->name('left_app.edit');
        Route::post('/application/update/{id}', 'LeftSidebarController@app_update')->name('app.update');


        Route::get('/banner/view', 'LeftSidebarController@bannerView')->name('banner');
        Route::post('/banner/store', 'LeftSidebarController@banner_store')->name('banner.store');
        Route::get('/banner/delete/{id}', 'LeftSidebarController@banner_delete')->name('banner.delete');
        Route::get('/banner/edit/{id}', 'LeftSidebarController@banner_edit')->name('banner.edit');
        Route::post('/banner/update/{id}', 'LeftSidebarController@banner_update')->name('banner.update');
    });

    Route::name('admin.web.right.')->prefix('admin/web/right')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/top-banner/view', 'RightSidebarController@topView')->name('top');
        Route::post('/top-banner/store', 'RightSidebarController@top_store')->name('top.store');
        Route::get('/top-banner/edit/{id}', 'RightSidebarController@top_edit')->name('top.edit');
        Route::post('/top-banner/update/{id}', 'RightSidebarController@top_update')->name('top.update');

        Route::get('/application/view', 'RightSidebarController@linkView')->name('links');
        Route::post('/application/store', 'RightSidebarController@link_store')->name('links.store');
        Route::get('/application/delete/{id}', 'RightSidebarController@link_delete')->name('links.delete');
        Route::get('/application/edit/{id}', 'RightSidebarController@link_edit')->name('links.edit');
        Route::post('/application/update/{id}', 'RightSidebarController@link_update')->name('links.update');

        Route::get('/banner/view', 'RightSidebarController@bannerView')->name('banner');
        Route::post('/banner/store', 'RightSidebarController@banner_store')->name('banner.store');
        Route::get('/banner/delete/{id}', 'RightSidebarController@banner_delete')->name('banner.delete');
        Route::get('/banner/edit/{id}', 'RightSidebarController@banner_edit')->name('banner.edit');
        Route::post('/banner/update/{id}', 'RightSidebarController@banner_update')->name('banner.update');

        Route::get('/service', 'ServiceController@index')->name('service');
        Route::get('/service/add', 'ServiceController@create')->name('service.create');
        Route::post('/service/add', 'ServiceController@store')->name('service.store');
        Route::get('/service/delete/{id}', 'ServiceController@delete')->name('service.delete');
        Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/service/update/{id}', 'ServiceController@update')->name('service.update');


        Route::get('/about_paurosova', 'AboutController@index')->name('about_paurosova');
        Route::post('/about_paurosova/update/{id}', 'AboutController@update')->name('about_paurosova.update');
    });

    Route::name('admin.web.info.')->prefix('admin/web/info')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/', 'InfoController@info')->name('info');
        Route::post('/info/add', 'InfoController@info_store')->name('info.store');
        Route::get('/info/delete/{id}', 'InfoController@info_delete')->name('info.delete');
        Route::get('/info/edit/{id}', 'InfoController@info_edit')->name('info.edit');
        Route::post('/info/update/{id}', 'InfoController@info_update')->name('info.update');

        Route::get('/organogram', 'InfoController@organogram')->name('organogram');
        Route::post('/organogram/add', 'InfoController@organogram_store')->name('organogram.store');
        Route::get('/organogram/delete/{id}', 'InfoController@organogram_delete')->name('organogram.delete');
        Route::get('/organogram/edit/{id}', 'InfoController@organogram_edit')->name('organogram.edit');
        Route::post('/organogram/update/{id}', 'InfoController@organogram_update')->name('organogram.update');


        Route::get('/map', 'InfoController@map')->name('map');
        Route::post('/map/add', 'InfoController@map_store')->name('map.store');
        Route::get('/map/delete/{id}', 'InfoController@map_delete')->name('map.delete');
        Route::get('/map/edit/{id}', 'InfoController@map_edit')->name('map.edit');
        Route::post('/map/update/{id}', 'InfoController@map_update')->name('map.update');


        Route::get('/employee', 'InfoController@employee')->name('employee');
        Route::post('/employee/add', 'InfoController@employee_store')->name('employee.store');
        Route::get('/employee/delete/{id}', 'InfoController@employee_delete')->name('employee.delete');
        Route::get('/employee/edit/{id}', 'InfoController@employee_edit')->name('employee.edit');
        Route::post('/employee/update/{id}', 'InfoController@employee_update')->name('employee.update');


        Route::get('/education', 'InfoController@education')->name('education');
        Route::post('/education/add', 'InfoController@education_store')->name('education.store');
        Route::get('/education/delete/{id}', 'InfoController@education_delete')->name('education.delete');
        Route::get('/education/edit/{id}', 'InfoController@education_edit')->name('education.edit');
        Route::post('/education/update/{id}', 'InfoController@education_update')->name('education.update');


        Route::get('/contact', 'InfoController@contact')->name('contact');
        Route::post('/contact/add', 'InfoController@contact_store')->name('contact.store');
        Route::get('/contact/delete/{id}', 'InfoController@contact_delete')->name('contact.delete');
        Route::get('/contact/edit/{id}', 'InfoController@contact_edit')->name('contact.edit');
        Route::post('/contact/update/{id}', 'InfoController@contact_update')->name('contact.update');

    });

    Route::name('admin.web.contact.')->prefix('admin/web/contact')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/mayor', 'ContactController@mayor')->name('mayor');
        Route::post('mayor/store', 'ContactController@mayor_store')->name('mayor.store');

        Route::post('professional_mayor/store', 'ContactController@professional_mayor_store')->name('mayor.professional_mayor');
        Route::post('professional_mayor/delete/{id}', 'ContactController@professional_mayor_delete')->name('professional_mayor.delete');
        Route::get('/uno', 'ContactController@uno')->name('uno');
        Route::post('/uno/store', 'ContactController@uno_store')->name('uno.store');

        Route::get('/admin', 'ContactController@admin')->name('admin');
        Route::post('/admin_store', 'ContactController@admin_store')->name('admin.store');
        Route::post('/admin_other_employee', 'ContactController@admin_other_employee')->name('admin.other_employee.store');
        Route::get('/admin_other_employee_edit/{id}', 'ContactController@admin_other_employee_edit')->name('admin.other_employee.edit');
        Route::post('/admin_other_employee_update/{id}', 'ContactController@admin_other_employee_update')->name('admin.other_employee.update');
        Route::post('/admin_other_employee_delete/{id}', 'ContactController@admin_other_employee_delete')->name('admin.other_employee.delete');
        Route::get('/engineer', 'ContactController@engineer')->name('engineer');
        Route::post('/engineer_store', 'ContactController@engineer_store')->name('engineer.store');
        Route::post('/others_employee_store', 'ContactController@others_employee_store')->name('others_employee.store');
        Route::get('/others_employee_edit/{id}', 'ContactController@others_employee_edit')->name('others_employee.edit');
        Route::post('/others_employee_update/{id}', 'ContactController@others_employee_update')->name('others_employee.update');
        Route::post('/others_employee_delete/{id}', 'ContactController@others_employee_delete')->name('others_employee.delete');

        Route::get('/info', 'ContactController@info')->name('info');
        Route::post('/info_store', 'ContactController@info_store')->name('info.store');
        Route::get('/info_edit/{id}', 'ContactController@info_edit')->name('info.edit');
        Route::post('/info_update/{id}', 'ContactController@info_update')->name('info.update');
        Route::post('/info_delete/{id}', 'ContactController@info_delete')->name('info.delete');
    });


    Route::name('admin.web.notice.')->prefix('admin/web/notice')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::get('/', 'NoticeController@notice')->name('notice');
        Route::post('/notice/add', 'NoticeController@notice_store')->name('notice.store');
        Route::get('/notice/delete/{id}', 'NoticeController@notice_delete')->name('notice.delete');


        Route::get('/download', 'NoticeController@download')->name('download');
        Route::post('/download_store', 'NoticeController@download_store')->name('download.store');
        Route::get('/download/delete/{id}', 'NoticeController@download_delete')->name('download.delete');
    });


});

Route::name('admin.web.village.')->prefix('admin/web/village')->namespace('App\Http\Controllers\Admin')->group(function () {

    Route::get('/ward', 'VillageController@ward')->name('ward');
    Route::get('/ward/edit/{$id}', 'VillageController@ward_edit')->name('ward.edit');
    Route::post('/ward/store', 'VillageController@ward_store')->name('ward.store');
    Route::post('/ward/update/{id}', 'WardController@ward_update')->name('ward.update');
    Route::post('/ward/delete/{id}', 'WardController@ward_delete')->name('ward.delete');

    Route::get('/village', 'VillageController@village')->name('village');
    Route::post('/village/add', 'VillageController@village_store')->name('village.store');
    Route::get('/village/delete/{name}', 'VillageController@village_delete')->name('village.delete');
    Route::get('/village/edit/{name}', 'VillageController@village_edit')->name('village.edit');
    Route::post('/village/update/{id}', 'VillageController@village_update')->name('village.update');

    Route::get('/house_type', 'VillageController@house_type')->name('house_type');
    Route::post('/house_type/store', 'VillageController@house_type_store')->name('house_type.store');
    Route::get('/house_type/edit/{id}', 'VillageController@house_type_edit')->name('house_type.edit');
    Route::post('/house_type/update/{id}', 'VillageController@house_type_update')->name('house_type.update');
    Route::get('/house_type/delete/{id}', 'VillageController@house_type_delete')->name('house_type.delete');


    Route::get('/post_office', 'VillageController@post_office')->name('post_office');
    Route::post('/post_office/add', 'VillageController@post_office_store')->name('post_office.store');
    Route::get('/post_office/delete/{id}', 'VillageController@post_office_delete')->name('post_office.delete');
    Route::get('/post_office/edit/{id}', 'VillageController@post_office_edit')->name('post_office.edit');
    Route::post('/post_office/update/{id}', 'VillageController@post_office_update')->name('post_office.update');

});

Route::name('admin.web.religion.')->prefix('admin/web/village')->namespace('App\Http\Controllers\Admin')->group(function () {

    Route::get('/religion', 'ReligionController@religion')->name('religion');
    Route::post('/religion/add', 'ReligionController@religion_store')->name('religion.store');
    Route::get('/religion/delete/{name}', 'ReligionController@religion_delete')->name('religion.delete');
    Route::get('/religion/edit/{name}', 'ReligionController@religion_edit')->name('religion.edit');
    Route::post('/religion/update/{id}', 'ReligionController@religion_update')->name('religion.update');


    Route::get('/gender', 'ReligionController@gender')->name('gender');
    Route::post('/gender/add', 'ReligionController@gender_store')->name('gender.store');
    Route::get('/gender/delete/{id}', 'ReligionController@gender_delete')->name('gender.delete');
    Route::get('/gender/edit/{id}', 'ReligionController@gender_edit')->name('gender.edit');
    Route::post('/gender/update/{id}', 'ReligionController@gender_update')->name('gender.update');

    Route::get('/merital_status', 'ReligionController@merital_status')->name('merital_status');
    Route::post('/merital_status/store', 'ReligionController@merital_status_store')->name('merital_status.store');
    Route::get('/merital_status/edit/{id}', 'ReligionController@merital_status_edit')->name('merital_status.edit');
    Route::post('/merital_status/update/{id}', 'ReligionController@merital_status_update')->name('merital_status.update');
    Route::get('/merital_status/delete/{id}', 'ReligionController@merital_status_delete')->name('merital_status.delete');



});


// assesment nibondhon

Route::get('take_action_users', [ActiveController::class, 'search'])->name('action.search');
Route::post('take_action_users', [ActiveController::class, 'searchDb'])->name('action.search');
Route::get('take_action_users_deactive/{id}/{type}', [ActiveController::class, 'deactive'])->name('action.deactivePanel');
Route::get('take_action_show/{id}/{type}', [ActiveController::class, 'show'])->name('action.show');
Route::get('take_action_active_show/{id}/{type}', [ActiveController::class, 'activeshow'])->name('action.activeshow');
Route::post('take_action_users_active', [ActiveController::class, 'active'])->name('action.active');
Route::get('take_action_edit/{id}/{type}', [ActiveController::class, 'edit'])->name('action.edit');
Route::post('/update-bosot-bari/{id}', [ActiveController::class, 'UpdateBosotBari'])->name('update.bosot-bari');

Route::post('/update-business-holding/{id}', [ActiveController::class, 'UpdateBusinessHolding'])->name('update.business-holding');
Route::post('/update-business/{id}', [ActiveController::class, 'UpdateBusiness'])->name('update.business');

// Bosot Bari
Route::get('/new-bosot-index', [BosotBariController::class, 'BosotSearchResult2']);
Route::get('/bosot-search-result', [BosotBariController::class, 'BosotSearchResult2']);

Route::get('/new-bosot-index-active', [BosotBariController::class, 'BosotSearchResult3']);
Route::get('/bosot-search-result-active', [BosotBariController::class, 'BosotSearchResult3']);

Route::get('/new-bosot-index-inactive', [BosotBariController::class, 'BosotSearchResult4']);
Route::get('/bosot-search-result-inactive', [BosotBariController::class, 'BosotSearchResult4']);

Route::get('/new-bosot-index-family', [BosotBariController::class, 'BosotSearchResult5']);
Route::get('/bosot-search-result-family', [BosotBariController::class, 'BosotSearchResult5']);

Route::get('/get-info/{id}', [BosotBariController::class, 'GetInfo']);
Route::get('/update-member_info', [BosotBariController::class, 'UpdateMemberInfo']);
Route::get('/delete-member/{id}', [BosotBariController::class, 'DeleteMember'])->name('delete.general_member');

Route::get('/new-business-holding-index', [BusinessHoldingController::class, 'BusinessHoldingResult2']);
Route::get('/business-holding-search-result', [BusinessHoldingController::class, 'BusinessHoldingResult2']);

Route::get('/new-business-holding-index-active', [BusinessHoldingController::class, 'BusinessHoldingResult3']);
Route::get('/business-holding-search-result-active', [BusinessHoldingController::class, 'BusinessHoldingResult3']);

Route::get('/new-business-holding-index-inactive', [BusinessHoldingController::class, 'BusinessHoldingResult4']);
Route::get('/business-holding-search-result-inactive', [BusinessHoldingController::class, 'BusinessHoldingResult4']);

Route::get('/get-business-info/{id}', [BusinessHoldingController::class, 'GetBusinessHoldingInfo']);
Route::get('/update-business-holding_info', [BusinessHoldingController::class, 'UpdateBusinessHoldingInfo']);
Route::get('/delete-business-holding/{id}', [BusinessHoldingController::class, 'DeleteBusinessHolding'])->name('delete.business-holding');

Route::get('/new-business-index', [BusinessController::class, 'BusinessResult2']);
Route::get('/business-search-result', [BusinessController::class, 'BusinessResult2']);

Route::get('/new-business-index-active', [BusinessController::class, 'BusinessResult3']);
Route::get('/business-search-result-active', [BusinessController::class, 'BusinessResult3']);

Route::get('/new-business-index-inactive', [BusinessController::class, 'BusinessResult4']);
Route::get('/business-search-result-inactive', [BusinessController::class, 'BusinessResult4']);

Route::get('/get-businesss-info/{id}', [BusinessController::class, 'GetBusinessInfo']);
Route::get('/update-business_info', [BusinessController::class, 'UpdateBusinessInfo']);
Route::get('/delete-business/{id}', [BusinessController::class, 'DeleteBusiness'])->name('delete.business');


// Report 
 Route::get('/puno-bibaho-report', [PdfReportController::class, 'punobibaho']);
 Route::get('/warish-report', [PdfReportController::class, 'warish']);
 Route::get('/new-report', [PdfReportController::class, 'newreport']);


//Admin Daynamic End

