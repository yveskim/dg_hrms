<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\AdmissionUserModel;
use App\Models\StudentAdmissionModel;
use App\Models\StudentApplicationModel;
use App\Models\StudentApplicationStatusModel;
use App\Models\AdmissionStatusModel;
use App\Models\AdmissionFilesModel;
use App\Models\ApplicationUpdateModel;
use App\Models\ProgramModel;
use App\Models\ArtsProgramModel;
use App\Models\HeMajorModel;
use App\Models\Applicants_profile;
use \Mpdf\Mpdf;

class Transferees extends BaseController
{
	function getAllTransferees(){
		$appModel = new StudentApplicationModel();
	//	$admModel = new StudentAdmissionModel();
		$data['trans'] = $appModel->getAllTransferee();
		return $this->response->setJSON($data);
	}

	function getTrans8(){
		$appModel = new StudentApplicationModel();
	//	$admModel = new StudentAdmissionModel();
		$data['trans'] = $appModel->getGrade8Trans();
		return $this->response->setJSON($data);
	}

	function getTrans9(){
		$appModel = new StudentApplicationModel();
	//	$admModel = new StudentAdmissionModel();
		$data['trans'] = $appModel->getGrade9Trans();
		return $this->response->setJSON($data);
	}

	function getTrans10(){
		$appModel = new StudentApplicationModel();
	//	$admModel = new StudentAdmissionModel();
		$data['trans'] = $appModel->getGrade10Trans();
		return $this->response->setJSON($data);
	}

	public function printApplicationTransferee(){
		$mpdf = new \Mpdf\Mpdf();
		$profile = new Applicants_profile();

		// date_default_timezone_set('Asia/Manila');
		$print_date = date("F j, Y, g:i a");  

		$transferee_id =  $this->request->getGet('transferee_id');

		$res = $profile->getProfileApplicationTransferee($transferee_id);
	
		$lrn = "";
		$date_time = "";
		$transferee_id = "";
		$firstname = "";
		$middlename = "";
		$lastname = "";
		$gender = "";
		$program = "";


		foreach($res as $r){
			$lrn = $r->applicant_lrn;
			$transferee_id = $r->transferee_id;
			$firstname = $r->firstname;
			$middlename = $r->middle_name;
			$lastname = $r->last_name;
			$gender = $r->gender;
			$program = $r->program;
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
		$mpdf->WriteHTML('Application No.: <span class="span-content">'.$transferee_id.'</span><hr>');
		$mpdf->WriteHTML('Application Type: <span class="span-content">Transferee</span><hr>');
		$mpdf->WriteHTML('LRN: '.$lrn.'<hr>');
		$mpdf->WriteHTML('Name: '.$firstname." ".$middlename." ".$lastname.'<hr>');
		$mpdf->WriteHTML('Gender: '.$gender.'<hr>');
		$mpdf->WriteHTML('Program : '.$program.'<hr>');
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
