<?php


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Frontend\FrontendController@index')->name('index');
Route::get('about-us','Frontend\FrontendController@aboutUs')->name('about.us');
Route::get('doctor-list','Frontend\FrontendController@doctorList')->name('doctor-list');
Route::get('contact-us','Frontend\FrontendController@contactUs')->name('contact.us');
Route::get('service','Frontend\FrontendController@service')->name('service');
Route::post('get-doctor','Frontend\FrontendController@get_doctor')->name('get-doctor');
Route::post('get-doctor-list','Frontend\FrontendController@get_doctor_list')->name('get-doctor-list');
Route::get('admin/login','Frontend\FrontendController@admin_login')->name('admin-login');

Route::group(['as'=>'patient.','prefix' => 'patient', 'namespace'=>'Patient','middleware'=>['auth','patient']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('doctor/list', 'DashboardController@doctorlist')->name('doctor.index');
    Route::resource('appointment', 'AppointmentController');
    Route::get('prescription-list', 'DashboardController@prescription_list')->name('prescription-list');
    Route::get('change-password','DashboardController@change_password')->name('change-password');
    Route::post('update/password','DashboardController@update_password')->name('update.password');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('update/profile','DashboardController@update_profile')->name('update.profile');
});

Route::group(['as'=>'doctor.','prefix' => 'doctor', 'namespace'=>'Doctor','middleware'=>['auth','doctor']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('appointment', 'DashboardController@appointment')->name('appointment');
    Route::get('pending-appointment/{id}', 'DashboardController@pending_appointment')->name('pending-appointment');
    Route::get('complete-appointment/{id}', 'DashboardController@complete_appointment')->name('complete-appointment');
    Route::get('add-prescription/{id}', 'DashboardController@add_prescription')->name('add-prescription');
    Route::post('prescription.store', 'DashboardController@prescription_store')->name('prescription.store');
    Route::get('patient-list', 'DashboardController@patient_list')->name('patient-list');
    Route::get('prescription-list', 'DashboardController@prescription_list')->name('prescription-list');
    Route::get('change-password','DashboardController@change_password')->name('change-password');
    Route::post('update/password','DashboardController@update_password')->name('update.password');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('update/profile','DashboardController@update_profile')->name('update.profile');
});
Route::group(['as'=>'nurse.','prefix' => 'nurse', 'namespace'=>'Nurse','middleware'=>['auth','nurse']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('change-password','DashboardController@change_password')->name('change-password');
    Route::post('update/password','DashboardController@update_password')->name('update.password');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('update/profile','DashboardController@update_profile')->name('update.profile');
    //report
    Route::get('doctor-list','DashboardController@doctor_list')->name('doctor-list');
    Route::get('patient-list','DashboardController@patient_list')->name('patient-list');
});

Route::get('change-password','DashboardController@change_password')->name('change-password');
Route::post('update/password','DashboardController@update_password')->name('update.password');
Route::get('profile','DashboardController@profile')->name('profile');
Route::post('update/profile','DashboardController@update_profile')->name('update.profile');

Route::group(['as'=>'receptionist.','prefix' => 'receptionist', 'namespace'=>'Receptionist','middleware'=>['auth','receptionist']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //profile
    Route::get('change-password','DashboardController@change_password')->name('change-password');
    Route::post('update/password','DashboardController@update_password')->name('update.password');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('update/profile','DashboardController@update_profile')->name('update.profile');
    //report
    Route::get('doctor-list','DashboardController@doctor_list')->name('doctor-list');
    Route::get('patient-list','DashboardController@patient_list')->name('patient-list');
    Route::get('appointment-list','DashboardController@appointment_list')->name('appointment-list');
});
Route::group(['as'=>'laboratories.','prefix' => 'laboratories', 'namespace'=>'Laboratories','middleware'=>['auth','laboratories']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    //lab-item
    Route::resource('lab-item', 'LabItemController');
    //profile
    Route::get('change-password','DashboardController@change_password')->name('change-password');
    Route::post('update/password','DashboardController@update_password')->name('update.password');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('update/profile','DashboardController@update_profile')->name('update.profile');
});
//

Route::post('appointment','AppointmentController@store')->name('make-appointment');
Route::get('pending-appointment/{id}','AppointmentController@pending_appointment')->name('all-pending-appointment');
Route::get('complete-appointment/{id}','AppointmentController@complete_appointment')->name('complete-appointment');

Auth::routes();

Route::get('pending-appointment','Backend\AppointmentController@pending_appointment')->name('pending-appointment');
Route::get('all-appointment','Backend\AppointmentController@all_appointment')->name('all-appointment');
Route::get('nurse','Backend\UserController@nurse_list')->name('nurse-list');

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('users')->group(function(){
    Route::get('/view','Backend\UserController@view')->name('users.view');
    Route::get('/add','Backend\UserController@add')->name('users.add');
    Route::post('/store','Backend\UserController@store')->name('users.store');
    Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
    Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
});
Route::resource('department', 'Backend\DepartmentController');
Route::resource('telemedicine', 'Backend\TelemedicineController');
Route::get('/edit/profile','Backend\DashboardController@edit_profile')->name('profile-edit');
Route::post('/update/profile','Backend\DashboardController@update_profile')->name('update.profile');
Route::get('/change-password','Backend\DashboardController@change_password')->name('change-password');
Route::post('/update/password','Backend\DashboardController@update_password')->name('update.password');

Route::prefix('doctor')->group(function(){
    Route::get('/view','Backend\DoctorController@view')->name('doctor.view');
    Route::get('/add','Backend\DoctorController@add')->name('doctor.add');
    Route::post('/store','Backend\DoctorController@store')->name('doctor.store');
    Route::get('/edit/{id}','Backend\DoctorController@edit')->name('doctor.edit');
    Route::post('/update/{id}','Backend\DoctorController@update')->name('doctor.update');
    Route::get('/delete/{id}','Backend\DoctorController@delete')->name('doctor.delete');
});


