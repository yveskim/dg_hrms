<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\Applicants_account;
use App\Models\Applicants_profile;
use App\Models\AdmissionStatusModel;

class Admission extends BaseController
{
	public function index($page = 'admission')
	{
		if (!is_file(APPPATH . '/Views/f_admission/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = 'Admission'; // Capitalize the first letter

		return view('f_admission/' . $page, $data);
	}

	function captcha_verify()
	{
		$app_profile = new Applicants_profile();

		$stud_email = $this->request->getPost('email');
		$emailExist = $app_profile->where('email', $stud_email)->countAllResults();

		if ($this->request->getPost('agreement') != 1) {
			$result['status'] = 4;
			$result['message'] = "Please read and check the data privacy agreement to proceed";
			echo json_encode($result);
		} else if ($emailExist > 0) {
			$result['status'] = 5;
			$result['message'] = "The email already exist, please try again with another email";
			echo json_encode($result);
			die;
		} else {
			$captcha_response = trim($this->request->getPost('g-recaptcha-response')); //get recaptcha result
			if ($captcha_response != '') {
				$keySecret = '6LdXJeUdAAAAAMhkWkNj34iBIUnx65Iw24Rtrm84';
				$check = array(
					'secret' => $keySecret,
					'response' => $this->request->getPost('g-recaptcha-response')
				);

				$startProcess = curl_init();
				curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
				curl_setopt($startProcess, CURLOPT_POST, true);
				curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
				curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
				$receiveData = curl_exec($startProcess);
				$finalResponse = json_decode($receiveData, true);
				if ($finalResponse['success']) {

				

					//<<<<<generate random string for ID
					$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < 15; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					//>>>>>>>>>>>>>>>>>>

					//	$verification = $this->request->getPost('verification_code');//get the input verifiation
					$to = $this->request->getPost('email'); //send mail to email input by user
					$subject = 'Verification Mail';
					$message = '<br>';
					//	$message .= '<img src="images/inhs_logo.png" alt="my picture">';
					$message .= '<br>';
					$message .= 'Thank you for submitting your pre-registration.';
					$message .= '<br>';
					$message .= '<br>';
					$message .= 'Verification Code: ' . '<strong>' . $randomString . '</strong>';
					$message .= '<hr>';
					$message .= '<br>';
					$message .= '<br>';
					$message .= '<i>IMPORTANT! please read.</i>';
					$message .= '<br>';
					$message .= 'Use your Verification Code to verify your application in the website.';
					$message .= '<br>';
					$message .= '<br>';
					$message .= 'After your verification you will be given a pre-registration account with your email as the username and the temporary password is (iloilonhs)';
					$message .= '<br>';
					$message .= 'Login to the website as pre-registration account, change your password and process your application';
					$message .= '<br>';
					$message .= 'Thank you and keep safe!..';
					$message .= '<br>';
					$message .= '<br>';
					$message .= '-Admission Office.';


					$email = \Config\Services::email();
					$email->setTo($to);
					$email->setFrom('yveskim.cabanting@iloilonhs.edu.ph', 'Iloilo National High School'); //redirect undelivered email
					$email->setReplyTo('yveskim.cabanting@iloilonhs.edu.ph', 'Admission Office');
					$email->setSubject($subject);
					$email->setMessage($message);
					//$email->attach('images/inhs_logo.png');// add attachement
					//$email->send();

					if ($email->send()) { // if email sends successfully then save the data to database
						//	$res = $app_profile->insert($storeData);
						$data['stud_lrn'] = $this->request->getPost('stud_lrn');
						$data['fname'] = $this->request->getPost('firstname');
						$data['mname'] = $this->request->getPost('middlename');
						$data['lname'] = $this->request->getPost('lastname');
						$data['birthdate'] = $this->request->getPost('birthdate');
						$data['gender_val'] = $this->request->getPost('gender');
						$data['phone'] = $this->request->getPost('phoneNumber');
						$data['email'] = $this->request->getPost('email');
						$data['cur_street'] = $this->request->getPost('cur_street');
						$data['cur_subdivision'] = $this->request->getPost('cur_subdivision');
						$data['cur_barangay'] = $this->request->getPost('cur_barangay');
						$data['cur_city'] = $this->request->getPost('cur_city');
						$data['cur_province'] = $this->request->getPost('cur_province');
						$data['per_street'] = $this->request->getPost('per_street');
						$data['per_subdivision'] = $this->request->getPost('per_subdivision');
						$data['per_barangay'] = $this->request->getPost('per_barangay');
						$data['per_city'] = $this->request->getPost('per_city');
						$data['per_province'] = $this->request->getPost('per_province');
						$data['verification_code'] = $randomString;
						$data['message'] = "An Email has been sent to your email address, please check to verify.";
						$data['status'] = 1;
						echo json_encode($data);
						die;
					} else {
						$result['status'] = 0;
						$result['message'] = "Invalid email, please input a working email address";
						//	$result['message'] = $verification;
						echo json_encode($result);
						die;
					}
				} else {
					$result['status'] = 0;
					$result['message'] = 'recaptcha failed';
					echo json_encode($result);
					die;

					// return redirect()->route('admission');
				}
			} else {
				$result['status'] = 3;
				$result['message'] = "Please don't skip captcha";
				echo json_encode($result);
				die;
			}
		}
	}

	function saveAdmission()
	{
		$accounts = new Applicants_account();
		$app_profile = new Applicants_profile();
		$code = $this->request->getPost('refId');
		$admissionEmail = $this->request->getPost('email');
		$verification_code = $this->request->getPost('verify_code');

		$data = [
			'applicant_lrn' => strtoupper($this->request->getPost('stud_lrn')),
			'firstname' => strtoupper($this->request->getPost('fname')),
			'middle_name' => strtoupper($this->request->getPost('mname')),
			'last_name' => strtoupper($this->request->getPost('lname')),
			'birthdate' => strtoupper($this->request->getPost('bday')),
			'gender' => strtoupper($this->request->getPost('gender')),
			'phone' => strtoupper($this->request->getPost('phone')),
			'email' => $this->request->getPost('email'),
			'per_street' => strtoupper($this->request->getPost('per_street')),
			'per_subdivision' => strtoupper($this->request->getPost('per_subdivision')),
			'per_barangay' => strtoupper($this->request->getPost('per_barangay')),
			'per_city' => strtoupper($this->request->getPost('per_city')),
			'per_province' => strtoupper($this->request->getPost('per_province')),
			'cur_street' => strtoupper($this->request->getPost('cur_street')),
			'cur_subdivision' => strtoupper($this->request->getPost('cur_subdivision')),
			'cur_barangay' => strtoupper($this->request->getPost('cur_barangay')),
			'cur_city' => strtoupper($this->request->getPost('cur_city')),
			'cur_province' => strtoupper($this->request->getPost('cur_province')),
			'reference_id' => $code
		];

		if ($verification_code === $code) {
			//check if email is already exist
			$res = $app_profile->insert($data);
			if ($res) {
				$app_id = $app_profile->getInsertID(); //default function to get the id of last inserted data
				$date_created = date("Y-m-d");
				$data2 = [
					'applicant_username' => $admissionEmail,
					'applicant_password' => 'iloilonhs',
					'date_created' => $date_created,
					'is_new_account' => true,
					'account_type' => 'applicant',
					'applicant_id' => $app_id
				];
				$res2 = $accounts->insert($data2);
				if ($res2) {
					$result['status'] = 1;
					$result['message'] = "Verification Success, your account has been successfully created";
					echo json_encode($result);
					die;
				} else {
					$result['status'] = 0;
					$result['message'] = "Account creation Failed!...";
					echo json_encode($result);
					die;
				}
			} else {
				$result['status'] = 0;
				$result['message'] = "Verifiation Failed";
				echo json_encode($result);
				die;
			}
		} else {
			$result['status'] = 0;
			$result['message'] = "Code did not match";
			echo json_encode($result);
			die;
		}
	}

	function acceptRequest()
	{
		$usersModel = new UsersModel();
		$admissionStatusModel = new AdmissionStatusModel();
		$studentAdmission = new Applicants_profile();

		$id = $this->request->getPost('applicants_id');
		$chkStatus = '';
		$admissionEmail = '';
		$username = '';
		$password = 'iloilonhs';

		if (isset($id)) {
			$checkStatus = $admissionStatusModel->where('applicants_id', $id) //check if request is already approved.
				->select('as_status')
				->findAll();
			foreach ($checkStatus as $row) {
				$chkStatus = $row['as_status'];
			}

			$studEmail = $studentAdmission->where('applicants_id', $id) //check if request is already approved.
				//	->select('*')
				->findAll();
			foreach ($studEmail as $rowVal) {
				$admissionEmail = $rowVal['email'];
				$username = $rowVal['firstname'] . $rowVal['lname'] . $id . "@iloilonhs.edu.ph";
			}
		}

		$date_accepted = date("Y-m-d");
		$status = "verified";
		$admissionStatusData = [
			'applicants_id' => $this->request->getPost('applicants_id'),
			'as_status' => $status,
			'as_remarks' => $this->request->getPost('admission_remarks'),
			'as_last_user' => $this->request->getPost('user_id'),
			'as_date_change' => $date_accepted
		];

		if ($chkStatus == 'verified') {
			$result['status'] = 5;
			$result['message'] = "Request is already Approved";
			echo json_encode($result);
			die;
		} else {

			$admin_remarks = $this->request->getPost('admission_remarks');
			//send email after verified
			//query get the email of request
			//	$verification = $this->request->getPost('verification_code');//get the input verifiation
			$to = $admissionEmail; //send mail to email of student
			$subject = 'Pre-registration Verification';
			$message = '<br>';
			//	$message .= '<img src="images/inhs_logo.png" alt="my picture
			$message .= 'Your pre-registration request has been approved';
			$message .= '<hr>';
			$message .= '<br>';
			$message .= 'Admin Response: ';
			$message .=  $admin_remarks;
			$message .= '<br>';
			$message .= '<br>';
			$message .= 'Thank you, Keep safe!..';
			$message .= '<br>';
			$message .= '<br>';
			$message .= 'From INHS Family.';

			$email = \Config\Services::email();
			$email->setTo($to);
			$email->setFrom('yveskim.cabanting@iloilonhs.edu.ph', 'Iloilo National High School'); //redirect undelivered email
			$email->setReplyTo('yveskim.cabanting@iloilonhs.edu.ph', 'Yves Kim');
			$email->setSubject($subject);
			$email->setMessage($message);


			if ($email->send()) { //save data after a successful sending of email
				$res = $admissionStatusModel->insert($admissionStatusData);
				if ($res) {
					/*	$studentAccountData = [
							'user_email' => $username,
							'user_password' => $password,
							'user_type' => "Student",
							'user_restriction' => "2"
						];

						$createAccount = $usersModel->insert($studentAccountData);*/

					//	if ($createAccount) {
					$result['status'] = 1;
					$result['message'] = "Success";
					echo json_encode($result);
					die;
					//	}
				} else {
					$result['status'] = 0;
					$result['message'] = "Failed";
					echo json_encode($result);
					die;
				}
			} else {
				$result['status'] = 0;
				$result['message'] = "Email Failed";
				echo json_encode($result);
				die;
			}
		}
	}

	function UpdateAdmissionInfo()
	{
		$admModel = new Applicants_profile();

		$data = [
			'firstname' => $this->request->getPost('firstname'),
			'mname' => $this->request->getPost('middlename'),
			'lname' => $this->request->getPost('lastname'),
			'birthdate' => $this->request->getPost('birthdate'),
			'gender' => $this->request->getPost('gender'),
			'phone' => $this->request->getPost('phoneNumber'),
			'cur_app_street' => $this->request->getPost('cur_street'),
			'cur_app_subdivision' => $this->request->getPost('cur_subdivision'),
			'cur_app_barangay' => $this->request->getPost('cur_barangay'),
			'cur_app_city' => $this->request->getPost('cur_city'),
			'cur_app_province' => $this->request->getPost('cur_province'),
			'per_app_street' => $this->request->getPost('per_street'),
			'per_app_subdivision' => $this->request->getPost('per_subdivision'),
			'per_app_barangay' => $this->request->getPost('per_barangay'),
			'per_app_city' => $this->request->getPost('per_city'),
			'per_app_province' => $this->request->getPost('per_province')
		];

		$admId = $this->request->getPost('admId');
		$res  = $admModel->update($admId, $data);
		if ($res) {
			$result['status'] = 1;
			$result['message'] = "Data updated successfully.";
			echo json_encode($result);
			die;
		} else {
			$result['status'] = 0;
			$result['message'] = "Failed";
			echo json_encode($result);
			die;
		}
	}

	function getStudentUserInfo()
	{
		$appAccount = new Applicants_account();

		$admId = $this->request->getGet('admId');
		$data['user'] = $appAccount->where('applicant_account_id', $admId)->findAll();

		return $this->response->setJSON($data);
	}
}
