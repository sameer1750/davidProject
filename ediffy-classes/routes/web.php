<?php
\Cloudinary::config(array(
    "cloud_name" => env('CLOUDINARY_CLOUD_NAME'),
    "api_key" => env('CLOUDONARY_API_KEY'),
    "api_secret" => env('CLOUDINARY_API_SECRET')
));
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

Route::group(['middleware' => 'auth'],function(){

    Route::get('/', 'HomeController@dashboard');

    Route::resource('enquiry', 'EnquiryController');
    Route::resource('admission', 'AdmissionController');
    Route::resource('admin', 'AdminController');
    Route::resource('course-module', 'CourseModuleController');
    Route::resource('center', 'CenterController');
    Route::resource('course', 'CourseController');
    Route::resource('caste', 'CasteController');
    Route::resource('area', 'AreaController');
    Route::resource('education', 'EducationController');
    Route::resource('enquiry-source', 'EnquirySourceController');
    Route::resource('batch', 'BatchController');
    Route::resource('tax-type', 'TaxTypeController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('designation', 'DesignationController');
    Route::resource('salary-details', 'SalaryDetailsController');
    Route::get('quick-inquiry','EnquiryController@showQuick');
    Route::post('quick-inquiry','EnquiryController@saveQuick');
    Route::get('inquiry-list','EnquiryController@listDetail');
    Route::get('admission-list','AdmissionController@listDetail');
    Route::resource('fees', 'FeesController',['except' => [
         'update', 'destroy','edit'
    ]]);

    Route::delete('enquiry-bulk-delete','EnquiryController@bulkDelete');

    Route::get('get-students-details','HomeController@getStudentDetails');
    Route::get('get-student','HomeController@getStudent');
    Route::get('get-course','CourseController@getSingleCourse');
    Route::get('get-batch-details','BatchController@batchDetails');
    Route::get('get-batch-by-module','BatchController@batchDetailsByModule');
    Route::get('get-fees-details','FeesController@getDetails');
    Route::get('emp-salary-detail','EmployeeController@salaryDetail');
});

Auth::routes();











