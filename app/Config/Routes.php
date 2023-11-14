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
$routes->post('updateStudentPassword', 'Login::updateStudentPassword');
$routes->get('signOutAdmin', 'Admin::sign_out');
$routes->get('signOutStudent', 'Admin::signOutStudent');
$routes->post('sign_out', 'Dashboard::sign_out');
$routes->match(['get', 'post'], 'login_admin', 'Login::index', ['filter' => 'checkLogout']);
$routes->match(['get', 'post'], 'login_student', 'Login::loginStudent', ['filter' => 'checkLogout']);
$routes->match(['get', 'post'], 'validate', 'Login::validation');
// $routes->get('administrator_login', 'Dashboard::index', ['filter' => 'checkLogin']);
$routes->get('login_application', 'ApplicantProfile::index', ['filter' => 'checkLogin']);
$routes->get('change_password', 'ApplicantProfile::changePass');
$routes->post('updatePassword', 'ApplicantProfile::updatePassword');
$routes->match(['get', 'post'], 'register', 'Login::register');
$routes->get('logout_user', 'ApplicantProfile::log_out');
$routes->get('student_login', 'Login::student_profile');

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
$routes->get('faculty', 'Faculty::index', ['filter' => 'checkLoginAdmin']);
$routes->get('faculty_profile', 'Faculty::getProfile');
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




//STUDENT
// $routes->get('student', 'Student::index');
$routes->get('student', 'Student::index', ['filter' => 'checkLoginStudent']);
$routes->match(['get', 'post'], 'validate_student', 'Login::validateStudent');
$routes->post('updateStudentInfo', 'Student::updateStudentInfo');
$routes->post('updateStudImage', 'Student::updateStudImage');
$routes->get('getGradeLevelJhs', 'Student::getGradeLevelJhs');
$routes->get('getGradeLevelShs', 'Student::getGradeLevelShs');
$routes->get('getSemester', 'Student::getSemester');
$routes->get('editEnStatus', 'Student::editEnStatus');
$routes->post('updateEnStat', 'Student::updateEnStat');

//STUDENT ADDRESS
$routes->post('setStudentAddress', 'Student::setStudentAddress');
$routes->get('getStudentAddress', 'Student::getStudentAddress');
$routes->get('getAddress', 'Student::getAddress');
$routes->get('deleteAddress', 'Student::deleteAddress');
$routes->get('loadFamilyBg', 'Student::loadFamilyBg');
$routes->post('updateFamilyBg', 'Student::updateFamilyBg');
$routes->get('getStudentDevices', 'Student::getStudentDevices');
$routes->post('setStudentDevice', 'Student::setStudentDevice');
$routes->get('getDevices', 'Student::getDevices');
$routes->get('deleteDevice', 'Student::deleteDevice');

// STUDENT HEALTH
$routes->get('getStudentHealth', 'Student::getStudentHealth');
$routes->post('setStudentHealth', 'Student::setStudentHealth');
$routes->get('getHealth', 'Student::getHealth');
$routes->get('deleteHealth', 'Student::deleteHealth');

// STUDENT SCHOOL
$routes->get('getStudentSchool', 'Student::getStudentSchool');
$routes->post('setStudentSchool', 'Student::setStudentSchool');
$routes->get('getSchool', 'Student::getSchool');
$routes->get('deleteSchool', 'Student::deleteSchool');

// STUDENT HOUSEHOLD
$routes->get('getStudentHm', 'Student::getStudentHm');
$routes->post('setStudentHm', 'Student::setStudentHm');
$routes->get('getHm', 'Student::getHm');
$routes->get('deleteHm', 'Student::deleteHm');

//EMPLOYEE ROUTE
$routes->get('getAllActiveEmpNoPlantilla', 'Employee::getAllActiveEmpNoPlantilla');

$routes->post('admin/addDepartment', 'Admin::addEmpDepartment');
$routes->post('admin/addProgram', 'Admin::addEmpProgram');

$routes->get('updateCurrentDept', 'Admin::updateCurrentDept');
$routes->get('updateCurrentCategory', 'Admin::updateCurrentCategory');

$routes->get('updateCurrentProg', 'Admin::updateCurrentProg');
$routes->get('updateProgramHead', 'Admin::updateProgramHead');
$routes->post('setEmpStatus', 'Employee::setEmpStatus');

//PLANTILLA ROUTE
$routes->post('addPlantilla', 'Plantilla::addPlantilla');

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

//$routes->get('admission/loadPending', 'Admission::loadPending');
$routes->post('admission/acceptRequest', 'Admission::acceptRequest');
$routes->post('admission/saveAdmission', 'Admission::saveAdmission');
$routes->post('admission/update_info', 'Admission::UpdateAdmissionInfo');

$routes->get('getStudentUserInfo', 'Admission::getStudentUserInfo');

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

//APPLICATION ROUTES
$routes->get('editApplication', 'Application::editApplication');
$routes->post('update_app_form', 'Application::updateApplication');
$routes->post('delete_application', 'Application::deleteApplication');
$routes->get('getAppForm', 'Application::getForm');
$routes->get('getAppFormTransferees', 'Application::getTransfereesForm');
$routes->get('loadExistingTransaction', 'Application::loadExistingTransaction');
$routes->get('getApp/getAll', 'Application::getAllApplication');
$routes->get('getApp/getValidatedApp', 'Application::getAllValidatedApp');
$routes->get('getAppDetails', 'Application::getAppDetails');
$routes->post('saveExamScore', 'Application::saveExamScore');
$routes->post('checkAppFiles', 'Application::checkApplicationFiles');
$routes->get('print_application', 'Application::printApplication');

$routes->post('submit_app_form', 'Application::submitApplication');
$routes->post('submit_transferee_form', 'Application::submitTransfereeForm');

//UPDATE TRANSFEREE
$routes->get('editTransferee', 'Application::editTransferee');
$routes->post('updateTransferee', 'Application::updateTransferee');
$routes->post('delete_transferee', 'Application::deleteTransferee');
$routes->get('print_application_transferee', 'Transferees::printApplicationTransferee');

//UPDATE Application
$routes->get('editAppStem', 'Application::editApplicationStem');
$routes->get('getAppUpdatedData', 'Application::getAppUpdatedData');
$routes->get('getUpdateHistory', 'Application::getUpdateHistory');
$routes->post('updateAppStem', 'Application::updateAppStem');

//REPORT ROUTES
$routes->get('report/pds_pdf', 'Pdf_report::generated_pds');

// Enrolment ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$routes->get('getSchoolYear', 'Enrollment::getSchoolYear');
$routes->post('encode_student', 'Enrollment::encodeStudent');
$routes->get('getStudentData', 'Enrollment::getStudentData');
$routes->get('getStudentDataByUser', 'Enrollment::getStudentDataByUser');

$routes->get('getEnrolledData', 'Enrollment::getEnrolledData');
$routes->get('getEnrolledJhsData', 'Enrollment::getEnrolledJhsData');
$routes->get('getEnrolledShsData', 'Enrollment::getEnrolledShsData');
$routes->get('getEnrolledByUser', 'Enrollment::getEnrolledByUser');
$routes->get('unenrollStudent', 'Enrollment::unenrollStudent');
$routes->get('getAverageRecord', 'Enrollment::getAverageRecord');
$routes->post('setAverageRecord', 'Enrollment::setAverageRecord');
$routes->get('getStudentGrade', 'Enrollment::getStudentGrade');
$routes->get('deleteGrade', 'Enrollment::deleteGrade');

$routes->get('getEnrolledDataNoProgram', 'Enrollment::getEnrolledDataNoProgram');

$routes->get('deleteEnrollee', 'Enrollment::deleteEnrollee');
$routes->get('getSearchId', 'Enrollment::searchStudentId');
$routes->get('getSearchName', 'Enrollment::searchStudentName');
$routes->get('getSearchData', 'Enrollment::getSearchData');
$routes->post('enrollStudent', 'Enrollment::enrollStudent');
$routes->get('loadEnrolleeProfile', 'Enrollment::loadEnrolleeProfile');
$routes->get('loadEnrolleeInfo', 'Enrollment::loadEnrolleeInfo');

// generate RF +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$routes->get('generateEF', 'Enrollment::generateEF');

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

//PROGRAM ROUTES
$routes->get('getSchoolProgram', 'Program::getProgramDetails');
$routes->get('getProgramAdvisery', 'Program::getProgramAdvisery');
$routes->get('getAdviseryDetails', 'Program::getAdviseryDetails');
$routes->post('addAdvisery', 'Program::addAdvisery');
$routes->post('addSection', 'Program::addSection');
$routes->get('getGradeLevel', 'Program::getGradeLevel');
$routes->get('getCategory', 'Program::getCategory');
$routes->get('getSections', 'Program::getSections');

$routes->post('changeProgramLogo', 'Program::changeProgramLogo');

$routes->get('getTeacherNoProgram', 'Program::getTeacherNoProgram');
$routes->post('addTeacherToProgram', 'Program::addTeacherToProgram');

$routes->get('getProgramDetails', 'Program::getProgramDetails');
$routes->get('getProgramTeachers', 'Program::getProgramTeachers');
$routes->get('getStudentInProgram', 'Program::getStudentInProgram');
$routes->post('addStudentToProgram', 'Program::addStudentToProgram');
$routes->get('removeStudentFromProgram', 'Program::removeStudentFromProgram');
$routes->post('assignProgramHead', 'Program::assignProgramHead');

//SECTIONS
$routes->get('getEachSection', 'Sections::getEachSection');

$routes->get('getSectionStudents', 'Sections::getSectionStudents');
$routes->get('getStudentNotAssignedInSection', 'Sections::getStudentNotAssignedInSection');
$routes->post('addStudentToSection', 'Sections::addStudentToSection');
$routes->get('getSectionStudentStrand', 'Sections::getSectionStudentStrand');
$routes->get('getEachSectionStrand', 'Sections::getEachSectionStrand');
$routes->get('removeFromSection', 'Sections::removeFromSection');
$routes->get('removeFromSectionShs', 'Sections::removeFromSectionShs');

//PLANTILLA
$routes->get('getAllPlantilla', 'Plantilla::getAllPlantilla');

// SETTINGS
$routes->get('settings', 'Settings::index');
$routes->get('getPrograms', 'Settings::getPrograms');
$routes->post('setProgram', 'Settings::setProgram');
$routes->post('setActiveSy', 'Settings::setActiveSy');
$routes->post('setActiveSemester', 'Settings::setActiveSemester');

// SUBJECT GROUP ROUTE

$routes->get('getSg', 'SubjectGroup::getSg');
$routes->get('getSgInfo', 'SubjectGroup::getSgInfo');
$routes->get('getFacultySg', 'SubjectGroup::getFacultySg');
$routes->post('addTeacherToSg', 'SubjectGroup::addTeacherToSg');
$routes->get('getSgTeachers', 'SubjectGroup::getSgTeachers');

// TRACK ROUTE
$routes->get('getTrack', 'Track::getTrack');
$routes->get('getTrackDetails', 'Track::getTrackDetails');
$routes->get('getStrand', 'Track::getStrand');

// STRANDS ROUTE
$routes->get('getStrandDetails', 'Strand::getStrandDetails');
$routes->get('getEnrolledDataNoStrand', 'Strand::getEnrolledDataNoStrand');
$routes->post('addStudentToStrand', 'Strand::addStudentToStrand');
$routes->get('getStudentInStrand', 'Strand::getStudentInStrand');
$routes->get('getStrandSections', 'Strand::getStrandSections');
$routes->get('getStrandAdvisery', 'Strand::getStrandAdvisery');
$routes->post('addSectionStrand', 'Strand::addSectionStrand');
$routes->post('addStudentToStrandSection', 'Strand::addStudentToStrandSection');
$routes->get('getStudentInStrandNoSection', 'Strand::getStudentInStrandNoSection');
$routes->get('getStrandAdviseryDetails', 'Strand::getStrandAdviseryDetails');
$routes->post('setAdviseryShs', 'Strand::setAdviseryShs');
$routes->get('removeStudentFromStrand', 'Strand::removeStudentFromStrand');

$routes->get('getSectionSubjects', 'Strand::getSectionSubjects');
$routes->get('getShsSubjects', 'Strand::getShsSubjects');
$routes->post('addSubjectToSection', 'Strand::addSubjectToSection');

// ________________________________________________
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
