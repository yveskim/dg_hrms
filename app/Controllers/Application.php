<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Applicants_account;
use App\Models\Applicants_files;
use App\Models\ApplicationPreRegistrationModel;
use App\Models\Applicants_profile;
use App\Models\ApplicationTransfereeModel;
use App\Models\EntranceExamScoreModel;
use \Mpdf\Mpdf;


class Application extends BaseController
{
	function index($page = 'index')
	{
		
	}

	function submitApplication(){
		$appModel = new ApplicationPreRegistrationModel();

		$applicant_id = $this->request->getPost('applicant_id');
		$academic_year = $this->request->getPost('academic_year');
		$last_school_year = $this->request->getPost('last_school_year');
		$last_school_attended = $this->request->getPost('last_school_attended');
		$last_school_address = $this->request->getPost('last_school_address');
		$is_lwd = $this->request->getPost('is_lwd');
		if(isset($is_lwd)){
			$is_lwd = 1;
		}else{
			$is_lwd = 0;
		}
		$computer = $this->request->getPost('computer');
		if(isset($computer)){
			$computer = 1;
		}else{
			$computer = 0;
		}
		$smart_phone = $this->request->getPost('smart_phone');
		if(isset($smart_phone)){
			$smart_phone = 1;
		}else{
			$smart_phone = 0;
		}
		$internet = $this->request->getPost('internet');
		if(isset($internet)){
			$internet = 1;
		}else{
			$internet = 0;
		}
		$accessories = $this->request->getPost('accessories');
		if(isset($accessories)){
			$accessories = 1;
		}else{
			$accessories = 0;
		}
		$program_first_choice = $this->request->getPost('program_first_choice');
		$program_second_choice = $this->request->getPost('program_second_choice');
		$program_third_choice = $this->request->getPost('program_third_choice');
		$first_quarter_average = $this->request->getPost('firstQuarter');
		$second_quarter_average = $this->request->getPost('secondQuarter');
		$third_quarter_average = $this->request->getPost('thirdQuarter');
		$remarks = $this->request->getPost('remarks');

		$data = [
			'applicant_id' => $applicant_id,
			'academic_year' => $academic_year,
			'last_school_year' => $last_school_year,
			'last_school_attended' => $last_school_attended,
			'last_school_address' => $last_school_address,
			'is_lwd' => $is_lwd,
			'computer' => $computer,
			'smart_phone' => $smart_phone,
			'internet' => $internet,
			'accessories' => $accessories,
			'program_first_choice' => $program_first_choice,
			'program_second_choice' => $program_second_choice,
			'program_third_choice' => $program_third_choice,
			'first_quarter_average' => $first_quarter_average,
			'second_quarter_average' => $second_quarter_average,
			'third_quarter_average' => $third_quarter_average,
			'remarks' => $remarks,
		];
		
		
		$existing_app = $appModel->getExistingApp();
		if($existing_app >= 1){
			$rslt['status'] = 0;
			$rslt['message'] = "Application for this year already Exist. Please check on your 'Existing Application'";
			$rslt['exist'] = $existing_app;
			echo json_encode($rslt);
			die;
		}else{
			$res = $appModel->insert($data);
			if($res){
				$rslt['status'] = 1;
				$rslt['message'] = "Data saved successfully.";
				$rslt['exist'] = $existing_app;
				echo json_encode($rslt);
				die;
			}else{
				$rslt['status'] = 0;
				$rslt['message'] = "Action Failed.";
				echo json_encode($rslt);
				die;
			}
		}
		
	}

	function loadExistingTransaction(){
		$appModel = new ApplicationPreRegistrationModel();
		$transfereeModel = new ApplicationTransfereeModel();

		$applicant_id = $this->request->getGet('applicant_id');
		$academic_year = '2023-2024';
		$data['application'] = $appModel
							   ->join('application_status', 'application_status.application_id = application_pre_registration_tbl.application_id', 'left')
							//    ->join('entrance_exam_tbl', 'entrance_exam_tbl.score_application_id = application_pre_registration_tbl.application_id', 'left')
							//    ->select('entrance_exam_tbl.score')
							   ->select('application_status.*')
							   ->select('application_pre_registration_tbl.*')
							   ->select('application_pre_registration_tbl.created_at as created')
							   ->where('application_pre_registration_tbl.applicant_id', $applicant_id)
							   ->where('application_pre_registration_tbl.academic_year', $academic_year)
							   ->findAll();
	
		$data['transferee'] = $transfereeModel
							  ->join('transferee_status', 'transferee_status.transferee_id = application_transferee_tbl.transferee_id', 'left')
							  ->select('transferee_status.*')
							  ->select('application_transferee_tbl.*')
							  ->select('application_transferee_tbl.created_at as created')
							  ->where('application_transferee_tbl.applicant_id', $applicant_id)
							  ->where('application_transferee_tbl.academic_year', $academic_year)
							  ->findAll();
		
		return $this->response->setJSON($data);

	}

	function editApplication(){
		$appModel = new ApplicationPreRegistrationModel();
		$application_id = $this->request->getGet('application_id');
		$data['application'] = $appModel->where('application_id', $application_id)->first();
		return $this->response->setJSON($data);
	}

	function updateApplication(){
		$appModel = new ApplicationPreRegistrationModel();
		$application_id = $this->request->getPost('application_id');
		$last_school_year = $this->request->getPost('last_school_year');
		$last_school_attended = $this->request->getPost('last_school_attended');
		$last_school_address = $this->request->getPost('last_school_address');
		$is_lwd = $this->request->getPost('is_lwd');
		if(isset($is_lwd)){
			$is_lwd = 1;
		}
		$program_first_choice = $this->request->getPost('program_first_choice');
		$program_second_choice = $this->request->getPost('program_second_choice');
		$program_third_choice = $this->request->getPost('program_third_choice');
		$first_quarter_average = $this->request->getPost('firstQuarter');
		$second_quarter_average = $this->request->getPost('secondQuarter');
		$third_quarter_average = $this->request->getPost('thirdQuarter');
		$remarks = $this->request->getPost('remarks');

		$data = [
			'last_school_year' => $last_school_year,
			'last_school_attended' => $last_school_attended,
			'last_school_address' => $last_school_address,
			'is_lwd' => $is_lwd,
			'program_first_choice' => $program_first_choice,
			'program_second_choice' => $program_second_choice,
			'program_third_choice' => $program_third_choice,
			'first_quarter_average' => $first_quarter_average,
			'second_quarter_average' => $second_quarter_average,
			'third_quarter_average' => $third_quarter_average,
			'remarks' => $remarks
		];
		
		$res = $appModel->update($application_id, $data);
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Update successfull.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Action Failed.";
			echo json_encode($rslt);
			die;
		}
		
	}

	function deleteApplication(){
		$appModel = new ApplicationPreRegistrationModel();
		$application_id = $this->request->getPost('application_id');

		$res = $appModel->where('application_id', $application_id)->delete();
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Delete successfull.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Delete Failed.";
			echo json_encode($rslt);
			die;
		}
	}

	function submitTransfereeForm(){
		$transfereeModel = new ApplicationTransfereeModel();

		$applicant_id = $this->request->getPost('applicant_id');
		$grade_level = $this->request->getPost('grade_level');
		$academic_year = $this->request->getPost('academic_year');
		$last_school_year = $this->request->getPost('last_school_year');
		$last_school_attended = $this->request->getPost('last_school_attended');
		$last_school_address = $this->request->getPost('last_school_address');
		$is_lwd = $this->request->getPost('is_lwd');
		if(isset($is_lwd)){
			$is_lwd = 1;
		}else{
			$is_lwd = 0;
		}
		$computer = $this->request->getPost('computer');
		if(isset($computer)){
			$computer = 1;
		}else{
			$computer = 0;
		}
		$smart_phone = $this->request->getPost('smart_phone');
		if(isset($smart_phone)){
			$smart_phone = 1;
		}else{
			$smart_phone = 0;
		}
		$internet = $this->request->getPost('internet');
		if(isset($internet)){
			$internet = 1;
		}else{
			$internet = 0;
		}
		$accessories = $this->request->getPost('accessories');
		if(isset($accessories)){
			$accessories = 1;
		}else{
			$accessories = 0;
		}
		
		$program = $this->request->getPost('track_strand');
		$first_sem = $this->request->getPost('firstQuarter');
		$second_sem = $this->request->getPost('secondQuarter');
		$remarks = $this->request->getPost('remarks');

		$data = [
			'applicant_id' => $applicant_id,
			'grade_level' => $grade_level,
			'academic_year' => $academic_year,
			'last_school_year' => $last_school_year,
			'last_school_attended' => $last_school_attended,
			'last_school_address' => $last_school_address,
			'is_lwd' => $is_lwd,
			'computer' => $computer,
			'smart_phone' => $smart_phone,
			'internet' => $internet,
			'accessories' => $accessories,
			'program' => $program,
			'general_average_1st' => $first_sem,
			'general_average_2nd' => $second_sem,
			'program' => $program,
			'remarks' => $remarks,
			'is_validated' => false
			// 'created_at' => $created_at,
			// 'updated_at' => $updated_at,
			// 'deleted_at' => $deleted_at,
		];
		
		$existing_app = $transfereeModel->getExistingApp();
		if($existing_app >= 1){
			$rslt['status'] = 0;
			$rslt['message'] = "Application for this year already Exist. Please check on your 'Existing Application'";
			$rslt['exist'] = $existing_app;
			echo json_encode($rslt);
			die;
		}else{
			$res = $transfereeModel->insert($data);
			if($res){
				$rslt['status'] = 1;
				$rslt['message'] = "Data saved successfully.";
				$rslt['exist'] = $existing_app;
				echo json_encode($rslt);
				die;
			}else{
				$rslt['status'] = 0;
				$rslt['message'] = "Action Failed.";
				echo json_encode($rslt);
				die;
			}
		}
	}

	function editTransferee(){
		$transfereeModel = new ApplicationTransfereeModel();
		$transferee_id = $this->request->getGet('transferee_id');
		$data['transferee'] = $transfereeModel->where('transferee_id', $transferee_id)->first();
		return $this->response->setJSON($data);
	}
	

	function updateTransferee(){
		$transfereeModel = new ApplicationTransfereeModel();
		$transferee_id = $this->request->getPost('transferee_id');
		$grade_level = $this->request->getPost('grade_level');
		$last_school_year = $this->request->getPost('last_school_year');
		$last_school_attended = $this->request->getPost('last_school_attended');
		$last_school_address = $this->request->getPost('last_school_address');
		$is_lwd = $this->request->getPost('is_lwd');
		if(isset($is_lwd)){
			$is_lwd = 1;
		}
		$program = $this->request->getPost('track_strand');
		$general_average_1st = $this->request->getPost('general_average_1st');
		$general_average_2nd = $this->request->getPost('general_average_2nd');
		$remarks = $this->request->getPost('remarks');

		$data = [
			'grade_level' => $grade_level,
			'last_school_year' => $last_school_year,
			'last_school_attended' => $last_school_attended,
			'last_school_address' => $last_school_address,
			'is_lwd' => $is_lwd,
			'program' => $program,
			'general_average_1st' => $general_average_1st,
			'general_average_2nd' => $general_average_2nd,
			'remarks' => $remarks
		];
		
		$res = $transfereeModel->update($transferee_id, $data);
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Update successfull.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Action Failed.";
			echo json_encode($rslt);
			die;
		}
		
	}

	
	function deleteTransferee(){
		$transfereeModel = new ApplicationTransfereeModel();
		$transferee_id = $this->request->getPost('transferee_id');

		$res = $transfereeModel->where('transferee_id', $transferee_id)->delete();
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Delete successfull.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Delete Failed.";
			echo json_encode($rslt);
			die;
		}
	}

	
	function getAllApplication(){
		$appModel = new ApplicationPreRegistrationModel();

		$data['application'] = $appModel->getPreregApp();

		return $this->response->setJSON($data);
	}

	function getAllValidatedApp(){
		$appModel = new ApplicationPreRegistrationModel();

		$data['application'] = $appModel->getValidatedApp();

		return $this->response->setJSON($data);
	}

	function saveExamScore(){
		$examModel = new EntranceExamScoreModel();
		$score_application_id = $this->request->getPost('score_application_id');
		$user_id = $this->request->getPost('user_id');
		$score = $this->request->getPost('score');
		$data = [
			'score_application_id' => $score_application_id,
			'score' => $score,
			'encoded_by' => $user_id
		];
		$res = $examModel->insert($data);
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Data saved successfully.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Action Failed.";
			echo json_encode($rslt);
			die;
		}
	}

	function checkApplicationFiles(){
		$filesModel = new Applicants_files();
		$profileModel = new Applicants_profile();
		$registrationModel = new ApplicationPreRegistrationModel();
		
		$application_id =  $this->request->getPost('application_id');
		
		$applicant_id = $registrationModel->where('application_id', $application_id)
						->select('applicant_id')
						->first();
		foreach($applicant_id as $app){
			$applicant_id = $app;
		}

		$name = $profileModel->where('applicant_id', $applicant_id)
						->first();

		$files = $filesModel->where('applicant_id', $applicant_id)
						->findAll();

		$data = [
			'title' => 'Documents Validation',
			'files' => $files,
			'applicant_id' => $applicant_id,
			'name' => $name
		];

		echo view('f_view_application/view_documents.php', $data);
	}

	public function printApplication(){
		$mpdf = new \Mpdf\Mpdf();
		$profile = new Applicants_profile();

		// date_default_timezone_set('Asia/Manila');
		$print_date = date("F j, Y, g:i a");  

		$app_id =  $this->request->getGet('application_id');

		$res = $profile->getProfileApplication($app_id);
	
		$lrn = "";
		$date_time = "";
		$application_id = "";
		$firstname = "";
		$middlename = "";
		$lastname = "";
		$gender = "";
		$program1 = "";
		$program2 = "";
		$program3 = "";


		foreach($res as $r){
			$lrn = $r->applicant_lrn;
			$application_id = $r->application_id;
			$firstname = $r->firstname;
			$middlename = $r->middle_name;
			$lastname = $r->last_name;
			$gender = $r->gender;
			$program1 = $r->program_first_choice;
			$program2 = $r->program_second_choice;
			$program3 = $r->program_third_choice;
			$date_time = $r->created_at;
		}
	

		$mpdf->SetHeader('Application Date: '.$date_time.'|Iloilo National High School|{PAGENO}');

		// $mpdf->watermarkTextAlpha = 0.1;
		// $mpdf->watermarkImageAlpha = 0.5;
		$mpdf->SetFooter('Iloilo National High School - Luna St., La Paz, Iloilo City 302509');

		// $inhsqr = 'upload/system_file/inhsqr.png';
		 $inhslogo = 'upload/system_file/logo.png';
		 
		// foreach($res as $r){
		// 	$mpdf->WriteHTML($r['firstname']);
		// }
		$css = '<style>'.
				'.span-content{text-decoration: underline; font-weight:bold;}'.
				'</style>';
		$qrcode = '<barcode code="'.$lrn.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1">';
		$mpdf->WriteFixedPosHTML($qrcode , 175, 45, 50, 90, 'auto');
		$mpdf->WriteHTML($css);
		$mpdf->WriteHTML('<br>');
		
		$mpdf->WriteHTML('<div style="border: 2px solid black; padding: 1%; margin-left: 15%; text-align: center;"><strong>ILOILO NATIONAL HIGH SCHOOL</strong></div>');
		$mpdf->WriteHTML('<div style="border: 2px solid black; padding: 1%; margin-left: 15%; text-align: center;"><strong>APPLICATION RECIEPT</strong></div>');
		$mpdf->WriteHTML('<br>');
		$mpdf->WriteHTML('<br>');
		$mpdf->WriteHTML('Application No.: <span class="span-content">'.$application_id.'</span><hr>');
		$mpdf->WriteHTML('Application Type: <span class="span-content">Pre-registration</span><hr>');
		$mpdf->WriteHTML('LRN: '.$lrn.'<hr>');
		$mpdf->WriteHTML('Name: '.$firstname." ".$middlename." ".$lastname.'<hr>');
		$mpdf->WriteHTML('Gender: '.$gender.'<hr>');
		$mpdf->WriteHTML('Program 1: '.$program1.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'Program 2: '.$program2. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. 'Program 3: '.$program3.'<hr>');
		$mpdf->WriteHTML('Date Printed: <span style="text-decoration: underline;">'.$print_date.'</span><hr>');
		$mpdf->WriteHTML('Recieved by: _____________________________________<hr>');
	
		// $mpdf->Image($inhsqr,170,15,25,25,'png','',true, false);
		$mpdf->Image($inhslogo,20,20,21,20,'png','',true, false);
		$mpdf->SetWatermarkText('ILOILO NATIONAL HIGH SCHOOL');
		$mpdf->showWatermarkText = true;
		// $mpdf->SetWatermarkImage('upload/system_file/logo.png');
		$mpdf->SetWatermarkImage(
			'upload/system_file/logo.png',
			.1, 20, 20,
			'',
			array(80, 50)
		);
		
		$mpdf->showWatermarkImage = true;
		
		
		// $mpdf->WriteHTML('Applicant ID: '.$applicant_id);
		// $mpdf->WriteHTML($app_id);
		// return view('f_application/print_application/index.php', $data);
		return redirect()->to($mpdf->Output('inhs_application.pdf', 'I'));

	}




}