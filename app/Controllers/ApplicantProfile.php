<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\Applicants_account;
use App\Models\Applicants_profile;
use App\Models\StudentApplicationModel;
use App\Models\StudentApplicationStatusModel;
use App\Models\AdmissionStatusModel;
use App\Models\Applicants_files;
use App\Models\ApplicationUpdateModel;
use App\Models\Applicants_profile_pic;
use App\Models\ProgramModel;
use App\Models\ArtsProgramModel;
use App\Models\HeMajorModel;
use App\Models\IctMajorModel;
use App\Models\AssigningModel;
use App\Models\ShsEnrollmentApplicationModel;
use App\Models\ShsEnrollmentStatusModel;

class ApplicantProfile extends BaseController
{
	public function index($page = 'index')
	{
		if (!is_file(APPPATH . '/Views/f_application/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$app_profile = new Applicants_profile();
		$appAccount = new Applicants_account();
		$profilePicModel = new Applicants_profile_pic();

		$loggedUser = session()->get('loggedUser');

		$username = $appAccount->where('applicant_account_id',  $loggedUser)
			->select('applicant_username')
			->first();

		$applicant_id = $appAccount->where('applicant_account_id',  $loggedUser)
			->select('applicant_id')
			->first();

		$applicants = $app_profile->where('applicant_id',  $applicant_id)
			->first();

		$profile_pic_name = $profilePicModel->where('applicant_id',  $applicant_id)
			->where('is_main_profile',  true)
			->first();

		$data = [
			'title' => 'Pre-registration',
			'applicants' => $applicants,
			'user' => $loggedUser,
			'username' => $username,
			'profile_pic_name' => $profile_pic_name
		];

		echo view('f_application/application_header.php', $data);
		echo view('f_application/' . $page, $data);
		echo view('f_application/application_footer.php', $data);
	}


	function changePass($page = 'change_pass_view')
	{
		$loggedUser = session()->get('loggedUser');
		$data = [
			'title' => 'Change Password',
			'userId' => $loggedUser
		];
		echo view('f_application/change_password/changePass_header.php', $data);
		echo view('f_application/change_password/' . $page, $data);
		echo view('f_application/change_password/changePass_footer.php', $data);
	}

	function updatePassword()
	{
		helper(['form', 'url']);
		$applicantsAccount = new Applicants_account();
		if ($this->request->getMethod() === 'post' && $this->validate([
			'new_password' => 'required|min_length[8]',
			'confirm_new_password' => 'required|matches[new_password]'
		])) {
			$userId = $this->request->getPost('user_id');
			$newPass = $this->request->getPost('new_password');

			$data = [
				'password' => $newPass,
				'is_new' => false
			];

			$res = $applicantsAccount->update($userId, $data);
			if ($res) {
				//	session()->setFlashData('fail', 'email not found!...');
				return redirect()->route('login_application');
			}
		} else {
			//$errors = $validation->listErrors();
			$valid = \Config\Services::validation();
			return	redirect()->back()->withInput()->with('validation', $valid);
			//	session()->setFlashData('error', 'password');
			//	return redirect()->route('change_password');
		}
	}


	function updateImage()
	{
		$profilePicModel = new Applicants_profile_pic();

		$applicant_id = $this->request->getPost('applicant_id');
		// $profile_pic_src = $this->request->getPost('profile_pic_src');
		$profile_pic_random_name = $this->request->getPost('profile_pic_random_name');

		$current_pic_id = $profilePicModel->where('random_filename', $profile_pic_random_name)->select('profile_pic_id')->first(); //get the id of current pic

		$image = $this->request->getFile('profile_image');
		// $customName = $this->request->getPost('profile_image');
		$imageName = $image->getName();
		$imageSize = $image->getSize();
		$randomFileName = $image->getRandomName();
		$imageExtension = $image->getExtension();

		if (!empty($imageName)) {
			if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
				$image->move('upload/applicants_profile_image/', $randomFileName); // move the image to upload folder
			}

			$data = [
				"applicant_id" => $applicant_id,
				"filename" => $imageName,
				"random_filename" => $randomFileName,
				"file_size" => $imageSize,
				"file_extension" => $imageExtension,
				"is_main_profile" => 1
			];
			$res = $profilePicModel->insert($data);
			if ($res) {
				if (!empty($profile_pic_random_name)) { //check if this is the first pic the user upload
					$update_data = [
						'is_main_profile' => 0
					];
					$res2 = $profilePicModel->update($current_pic_id, $update_data); //update the current pic is_main_profile to 0 if there is already a profile pic
					if ($res2) {
						$result['message'] = 'Upload Successfull';
						$result['status'] = 1;
						$result['random_filename'] = $randomFileName;
						echo json_encode($result);
						die;
					}
				} else {

					$result['message'] = 'Upload Successfull';
					$result['status'] = 1;
					$result['random_filename'] = $randomFileName;
					echo json_encode($result);
					die;
				}
			} else {
				$result['message'] = 'Upload Failed';
				$result['status'] = 0;
				echo json_encode($result);
				die;
			}
		} else {
			$result['message'] = 'Please select photo';
			$result['status'] = 0;
			echo json_encode($result);
			die;
		}
	}


	function uploadFile()
	{
		// $fileModel = new Applicants_files();
		// $image = $this->request->getFile('file');
		// $customName = $this->request->getPost('fileName');
		// // $imageName = $image->getName();
		// $imageSize = $image->getSize();
		// $randomFileName = $image->getRandomName();
		// $imageExtension = $image->getExtension();

		// if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
		// 	$image->move('upload/student_files/admission_files/', $customName); // move the image to upload folder
		// }

		// //admission id input adm_id_upload
		// $applicant_id =	$this->request->getPost('applicant_id');

		// $date = date("Y-m-d");

		// $data = [
		// 	"applicant_id" => $applicant_id,
		// 	"filename" => $customName,
		// 	"random_filename" => $randomFileName,
		// 	"file_size" => $imageSize,
		// 	"file_extension" => $imageExtension,
		// 	"date_uploaded" => $date,
		// ];
		// $fileModel->insert($data);
		// return $randomFileName; //return the random filename to be reference in deleting file
	}



	function deleteDropzone()
	{
		$fileModel = new Applicants_files();
		$fileName = $this->request->getPost('filename');
		$res = $fileModel->where('filename', $fileName)->delete();
		if ($res) {
			unlink('upload/student_files/admission_files/' . $fileName);
		} else {
			$result = 'ok';

			return $result;
		}
	}

	function deleteUpload()
	{
		$fileModel = new Applicants_files();
		$filename = $this->request->getPost('filename');
		$res = $fileModel->where('filename', $filename)->delete();


		if ($res) {
			if (file_exists('upload/student_files/admission_files/' . $filename)) {
				unlink('upload/student_files/admission_files/' . $filename);
				return	redirect()->route('viewUploads');
			} else {
				return	redirect()->route('viewUploads');
			}
		} else {
			$result['status'] = 1;
			$result['message'] = "delete failed";
			echo json_encode($result);
			die;
		}
	}

	function adminDeleteFile()
	{
		$fileModel = new Applicants_files();
		$filename = $this->request->getPost('filename');
		$userId = $this->request->getPost('userId');

		$file_id = $fileModel->where('filename', $filename)
			->select('admission_files_id')
			->first();
		$data = [
			'is_deleted' => 1,
			'deleted_by' => $userId
		];
		$res = $fileModel->update($file_id, $data);
		if ($res) {
			$file_loc = 'upload/student_files/admission_files/';
			$deleted_file_loc = 'upload/student_files/deleted_admission_files/';
			rename($file_loc . $filename, $deleted_file_loc . $filename);
			// $file_loc->move('upload/student_files/deleted_admission_files/'.$filename); // move the image to upload folder
			// return	redirect()->route('checkAppFiles');
			$result['status'] = $filename;
			$result['userId'] = $filename;
			echo json_encode($result);
			die;
		} else {
			$result['status'] = 1;
			$result['message'] = "delete failed";
			echo json_encode($result);
			die;
		}
	}

	function editProfile(){
		$profileModel = new Applicants_profile();	
		$applicant_id = $this->request->getGet('applicant_id');

		$data['profile'] = $profileModel->where('applicant_id', $applicant_id)->first();
		return $this->response->setJSON($data);
	}

	function updateProfile(){
		$profileModel = new Applicants_profile();	

		$applicant_id = $this->request->getPost('applicant_id'); 
		$lrn = $this->request->getPost('lrn'); 
		$firstname = $this->request->getPost('first_name'); 
		$middlename = $this->request->getPost('middle_name'); 
		$lastname = $this->request->getPost('last_name'); 
		$birthday = $this->request->getPost('birthday'); 
		$gender = $this->request->getPost('gender'); 
		$phone = $this->request->getPost('phone'); 


		$data = [
			'applicant_lrn' => $lrn,
			'firstname' => $firstname,
			'middle_name' => $middlename,
			'last_name' => $lastname,
			'birthdate' => $birthday,
			'gender' => $gender,
			'phone' => $phone
		];
		$res2 = $profileModel->update($applicant_id, $data); //update the current pic is_main_profile to 0 if there is already a profile pic
		if ($res2) {
			$result['message'] = 'Update Successfull';
			$result['status'] = 1;
			echo json_encode($result);
			die;
		}
	}


	function log_out()
	{
		if (session()->has('loggedUser')) {
			session()->remove('loggedUser');
		}
	}
}
