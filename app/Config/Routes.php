<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('News');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('admin', 'Admin::index');

//PAGE ROUTES
$routes->get('history', 'About::index');
$routes->get('about_principal', 'About::principal');
$routes->get('visionMission', 'About::visionMission');
$routes->get('loyalty_song', 'About::loyaltySong');
$routes->get('contact_us', 'About::contactUs');
$routes->get('data_privacy', 'About::dataPrivacy');

//ACADEMICS ROUTES

$routes->get('jhs_program', 'Academics::jhsProgram');

//LOGIN ROUTES
$routes->post('login/getEmpData', 'Login::getEmpData'); //load the data in modal in registering new emp page
$routes->get('signOutAdmin', 'Admin::sign_out');
$routes->post('sign_out', 'Dashboard::sign_out');
$routes->match(['get', 'post'], 'login_admin', 'Login::index', ['filter' => 'checkLogout']);
$routes->match(['get', 'post'], 'validate', 'Login::validation');
// $routes->get('administrator_login', 'Dashboard::index', ['filter' => 'checkLogin']);
$routes->get('login_application', 'ApplicantProfile::index', ['filter' => 'checkLogin']);
$routes->match(['get', 'post'], 'register', 'Login::register');

// RESET PASSWORD USERS
$routes->post('reset_password_info', 'Users::reset_password_users');

//Dashboard ROUTES
$routes->get('schoolHeads', 'Dashboard::SchoolHeads');

//ADMIN ROUTES
$routes->get('admin', 'Admin::index', ['filter' => 'checkLoginAdmin']);
$routes->match(['get', 'post'], 'admin/deleteEmp', 'Admin::deleteEmp');
$routes->get('admin/loadEmp', 'Admin::loadEmp');
$routes->get('admin/loadUser', 'Admin::loadUser');
$routes->get('admin/loadStudentAccount', 'Admin::loadStudentAccount');
$routes->get('admin/eachEmp', 'Admin::viewEachEmp');
$routes->post('admin/insertEmpPersonalInfo', 'Admin::insertEmpPersonalInfo'); 
$routes->post('admin/insertChild', 'Admin::insertEmpFamilyBgChildren');
$routes->post('admin/insertEmpFamilyBg', 'Admin::insertEmpFamilyBg');
$routes->post('admin/insertEducation', 'Admin::insertEducation');
$routes->post('admin/insertEligibility', 'Admin::insertEligibility');
$routes->post('admin/insertWorkExperience', 'Admin::insertWorkExperience');
$routes->post('admin/insertWorkInvolvement', 'Admin::insertWorkInvolvement');
$routes->post('admin/insertLD', 'Admin::insertLearningAndDevelopment');
$routes->post('admin/insertOthers', 'Admin::insertOthers');
$routes->get('admin/getChildren', 'Admin::getChildren');
$routes->get('admin/loadEducation', 'Admin::loadEducation');
$routes->get('admin/loadEligibility', 'Admin::loadEligibility');
$routes->get('admin/loadWorkExperience', 'Admin::loadWorkExperience');
$routes->get('admin/loadWorkInvolvement', 'Admin::loadWorkInvolvement');
$routes->get('admin/loadLD', 'Admin::loadLearningAndDevelopment');
$routes->get('admin/loadOthers', 'Admin::loadOthers');
$routes->get('admin/getFamBg', 'Admin::getFamBg');
$routes->post('admin/deleteChild', 'Admin::deleteChild');
$routes->post('admin/updateEmp', 'Admin::updateEmp');
$routes->post('employee/getEmpData', 'Employee::getEmpData');
$routes->get('getEmpStatus', 'Admin::getEmpStatus');
$routes->get('updateCurrentPos', 'Admin::updateCurrentPos');
$routes->post('admin/addPosition', 'Admin::addEmpPosition');
$routes->get('getDepartment', 'Admin::getDepartment');
$routes->get('getProgram', 'Admin::getProgram');
$routes->get('loadEmpCategory', 'Admin::loadEmpCategory');
$routes->get('updateEmpProg', 'Admin::updateEmpProg');
$routes->get('deleteEmpProg', 'Admin::deleteEmpProg');
$routes->get('refreshProgram', 'Admin::refreshProgram');
$routes->get('refreshCategory', 'Admin::refreshCategory');

$routes->post('setCategory', 'Admin::setCategory');

$routes->get('resetStudentAccount', 'Admin::resetStudentAccount');

//    FACULTY ROUTE
$routes->get('employee_personnel', 'Faculty::index', ['filter' => 'checkLoginAdmin']);
$routes->get('employee_profile', 'Faculty::getProfile');
$routes->get('advisery_class', 'Faculty::getAdviseryClass');
$routes->get('employmentDetails', 'Faculty::getEmploymentDetails');
$routes->get('employee/personalInfo', 'Faculty::getEmploymentPersonalInfo');
$routes->post('employee/updateBasicInfo', 'Faculty::updateBasicInfo');
$routes->post('employee/updateOtherInfo', 'Faculty::updateOtherInfo');
$routes->post('employee/updateContactInfo', 'Faculty::updateContactInfo');
$routes->post('employee/updatePerAddressInfo', 'Faculty::updatePerAddressInfo');
$routes->post('employee/updateCurAddressInfo', 'Faculty::updateCurAddressInfo');
$routes->get('employee/loadFamBg', 'Faculty::loadFamBg');
$routes->post('employee/addChild', 'Faculty::addChild');
$routes->get('employee/getChildDetails', 'Faculty::getChildDetails');
$routes->get('employee/deleteChild', 'Faculty::deleteChild');
$routes->post('employee/updateFamBg', 'Faculty::updateFamBg');
$routes->post('employee/updateParentsInfo', 'Faculty::updateParentsInfo');
$routes->get('employee/loadEducBg', 'Faculty::loadEducBg');
$routes->post('employee/updateEducBg', 'Faculty::updateEducBg');
$routes->get('employee/deleteEducBg', 'Faculty::deleteEducBg');
$routes->get('employee/getEducBgDetails', 'Faculty::getEducBgDetails');
$routes->get('employee/loadEligibility', 'Faculty::loadEligibility');
$routes->post('employee/updateEligibility', 'Faculty::updateEligibility');
$routes->get('employee/deleteEligibility', 'Faculty::deleteEligibility');
$routes->get('employee/getEligibilityDetails', 'Faculty::getEligibilityDetails');

$routes->get('employee/loadWorkXp', 'Faculty::loadWorkXp');
$routes->post('employee/updateWorkXp', 'Faculty::updateWorkXp');
$routes->get('employee/deleteWorkXp', 'Faculty::deleteWorkXp');
$routes->get('employee/getWorkXpDetails', 'Faculty::getWorkXpDetails');

$routes->get('employee/loadWorkInv', 'Faculty::loadWorkInv');
$routes->post('employee/updateWorkInv', 'Faculty::updateWorkInv');
$routes->get('employee/deleteWorkInv', 'Faculty::deleteWorkInv');
$routes->get('employee/getWorkInvDetails', 'Faculty::getWorkInvDetails');

$routes->get('employee/loadLearningDevelopment', 'Faculty::loadLearningDevelopment');
$routes->post('employee/updateLearningDev', 'Faculty::updateLearningDev');
$routes->get('employee/deleteLearningDev', 'Faculty::deleteLearningDev');
$routes->get('employee/getLearningDevDetails', 'Faculty::getLearningDevDetails');

$routes->get('employee/loadSkills', 'Faculty::loadSkills');
$routes->post('employee/updateSkills', 'Faculty::updateSkills');
$routes->get('employee/deleteSkills', 'Faculty::deleteSkills');
$routes->get('employee/getSkillsDetails', 'Faculty::getSkillsDetails');

$routes->get('employee/loadReference', 'Faculty::loadReference');
$routes->post('employee/updateReference', 'Faculty::updateReference');
$routes->get('employee/deleteReference', 'Faculty::deleteReference');
$routes->get('employee/getReferenceDetails', 'Faculty::getReferenceDetails');

$routes->get('employee/loadOthers', 'Faculty::loadOthers');
$routes->post('employee/updateOthers', 'Faculty::updateOthers');
$routes->post('employee/updateProfile', 'Faculty::updateProfile');



//EMPLOYEE ROUTE

$routes->post('admin/addDepartment', 'Admin::addEmpDepartment');
$routes->post('admin/addProgram', 'Admin::addEmpProgram');

$routes->get('updateCurrentDept', 'Admin::updateCurrentDept');
$routes->get('updateCurrentCategory', 'Admin::updateCurrentCategory');

$routes->get('updateCurrentProg', 'Admin::updateCurrentProg');
$routes->get('updateProgramHead', 'Admin::updateProgramHead');
$routes->post('setEmpStatus', 'Employee::setEmpStatus');

//PLANTILLA ROUTE
$routes->post('addPlantilla', 'Plantilla::addPlantilla');
$routes->get('plantilla/getAvailablePlantilla', 'Plantilla::getAvailablePlantilla');


//edit delete form
$routes->post('admin/deleteEducation', 'Admin::deleteEducation');
$routes->get('admin/editEduc', 'Admin::editEducation');
$routes->post('admin/deleteEligibility', 'Admin::deleteEligibility');
$routes->get('admin/editElig', 'Admin::editEligibility');
$routes->post('admin/deleteWorkExp', 'Admin::deleteWorkExperience');
$routes->get('admin/editWorkExp', 'Admin::editWorkExperience');

//Admission Routes
$routes->get('registrar', 'Registrar::index');
$routes->get('admission', 'Admission::index');
$routes->get('getAdmission', 'Admission::loadAdmission');
$routes->get('processAdmission', 'Admission::processAdmission');
$routes->get('application', 'Admission::application');
$routes->post('admission/verify_captcha', 'Admission::captcha_verify');
$routes->get('admission/loadAdmission', 'Admission::loadAdmission');

$routes->get('sendEmail', 'EmailController::index');

//NEWS ROUTE
$routes->get('/', 'News::index');
$routes->get('news', 'News::index');
$routes->get('loadNews', 'News::loadNews');
$routes->match(['get', 'post'], 'news/create', 'News::create');
$routes->post('news/edit', 'News::editNews');
$routes->post('news/update', 'News::updateNews');
$routes->post('news/delete', 'News::deleteNews');
$routes->get('news/viewNews', 'News::viewNews');
$routes->get('news/gallery', 'News::gallery');
$routes->get('news_ohsp', 'News::ohspUpdates');
$routes->get('news_spste', 'News::news_spste');
$routes->get('news_spfl', 'News::news_spfl');
$routes->get('news_spbe', 'News::news_spbe');

$routes->get('news/(:segment)', 'News::view/$1');

//REPORT ROUTES
$routes->get('report/pds_pdf', 'Pdf_report::generated_pds');

// Enrolment ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$routes->get('getSchoolYear', 'Enrollment::getSchoolYear');
$routes->post('encode_student', 'Enrollment::encodeStudent');
$routes->get('getStudentData', 'Enrollment::getStudentData');
$routes->get('getStudentDataByUser', 'Enrollment::getStudentDataByUser');

//FACULTY ROUTES

$routes->get('getFaculty', 'Faculty::getFaculty');
$routes->get('getFacultyNotPh', 'Faculty::getFacultyNotPh');

$routes->get('getFacultyDetails', 'Faculty::getFacultyDetails');

// DEPARTMENT ROUTE
$routes->get('getDepartments', 'Department::getDepartments');
$routes->post('setDepartment', 'Department::setDepartment');
$routes->get('getDepartmentDetails', 'Department::getDepartmentDetails');
$routes->get('getDept', 'Department::getDept');
$routes->post('assignDepartmentHead', 'Department::assignDepartmentHead');
$routes->get('getTeacherNoDepartment', 'Department::getTeacherNoDepartment');
$routes->get('getDepartmentTeachers', 'Department::getDepartmentTeachers');
$routes->post('addTeacherToDepartment', 'Department::addTeacherToDepartment');

//PLANTILLA
$routes->get('getAllPlantilla', 'Plantilla::getAllPlantilla');

// SETTINGS
$routes->get('settings', 'Settings::index');
$routes->get('settings/getPositions', 'Settings::getPositions');
$routes->post('settings/setPosition', 'Settings::setPosition');
$routes->get('settings/getPositionsDetails', 'Settings::getPositionsDetails');
$routes->get('settings/deletePosition', 'Settings::deletePosition');



// STATIONS ROUTE
$routes->get('station/loadAllStations', 'Stations::loadAllStations');
$routes->post('station/updateStation', 'Stations::updateStation');
$routes->get('station/getStationDetails', 'Stations::getStationDetails');
$routes->get('station/deleteStation', 'Stations::deleteStation');
$routes->get('station/getStations', 'Stations::getStations');
$routes->get('station/loadEmpInStation', 'Stations::loadEmpInStation');
$routes->get('station/getEmpNoStation', 'Stations::getEmpNoStation');
$routes->post('station/setEmployeeStation', 'Stations::setEmployeeStation');
$routes->get('station/getEmpStationDetails', 'Stations::getEmpStationDetails');
$routes->post('station/updateEmployeeStationDate', 'Stations::updateEmployeeStationDate');
$routes->get('station/deleteEmpStation', 'Stations::deleteEmpStation');


$routes->post('station/setEmpStation', 'Stations::setEmpStation');



//++++++++++++++++++++++++++++NBC++++++++++++++++++++++++++++++

$routes->get('nbc/getNbc', 'Nbc::getNbc');
$routes->post('nbc/updateNbc', 'Nbc::updateNbc');
$routes->get('nbc/getNbcDetails', 'Nbc::getNbcDetails');
$routes->get('nbc/deleteNbc', 'Nbc::deleteNbc');
$routes->get('nbc/viewNbc', 'Nbc::viewNbc');
$routes->get('nbc/loadSalaryGradeDetails', 'Nbc::loadSalaryGradeDetails');
$routes->get('nbc/getExistingStep', 'Nbc::getExistingStep');
$routes->post('nbc/setStep', 'Nbc::setStep');

$routes->post('nbc/deleteSteps', 'Nbc::deleteSteps');

// ++++++++++++++++++++++++++Plantilla++++++++++++++++++++++++++++++++++
$routes->get('plantilla/getPlantilla', 'Plantilla::getPlantilla');
$routes->post('plantilla/updatePlantilla', 'Plantilla::updatePlantilla');
$routes->get('plantilla/getPlantillaDetails', 'Plantilla::getPlantillaDetails');
$routes->get('plantilla/deletePlantilla', 'Plantilla::deletePlantilla');


// +++++++++++++++++++++++++++Service Record+++++++++++++++++++++++++++++
$routes->get('service/getServiceRecord', 'ServiceRecord::getServiceRecord');
$routes->get('service/selectEmployeeSr', 'ServiceRecord::selectEmployeeSr');
$routes->get('service/getEmpServiceRecord', 'ServiceRecord::getEmpServiceRecord');
$routes->get('service/getNewServiceRecordDetails', 'ServiceRecord::getNewServiceRecordDetails');
$routes->post('service/newServiceRecord', 'ServiceRecord::newServiceRecord');
$routes->post('service/promotionServiceRecord', 'ServiceRecord::promotionServiceRecord');

$routes->get('service/getTeachersForStepIncrease', 'ServiceRecord::getTeachersForStepIncrease');
$routes->get('service/getTeachersLoyalty10Years', 'ServiceRecord::getTeachersLoyalty10Years');
$routes->get('service/getTeachersLoyalty5YearsSucceeding10Years', 'ServiceRecord::getTeachersLoyalty5YearsSucceeding10Years');


// _______________________________________________
// ________________________________________________
// ________________________________________________
$routes->get('(:any)', 'Pages::view/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
