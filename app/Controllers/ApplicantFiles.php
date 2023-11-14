<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\Applicants_account;
use App\Models\Applicants_files;

class ApplicantFiles extends BaseController
{
	public function index($page = 'index')
	{
		if (!is_file(APPPATH . '/Views/f_application/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
	}

	function postApplicantDocument()
	{
		$filesModel = new Applicants_files();

		$applicant_id = $this->request->getPost('applicant_id');

		$doc = $this->request->getFile('post_document');
		// $customName = $this->request->getPost('profile_image');
		$imageName = $doc->getName();
		$imageSize = $doc->getSize();
		$randomFileName = $doc->getRandomName();
		$imageExtension = $doc->getExtension();

		if (!empty($imageName)) {
			if ($doc->isValid() && !$doc->hasMoved()) { //check if image is valid and has not moved
				$doc->move('upload/applicants_files/', $randomFileName); // move the image to upload folder
			}

			$data = [
				"applicant_id" => $applicant_id,
				"filename" => $imageName,
				"random_filename" => $randomFileName,
				"file_size" => $imageSize,
				"file_extension" => $imageExtension,
			];
			$res = $filesModel->insert($data);
			if ($res) {
				$result['message'] = 'Upload Successfull';
				$result['status'] = 1;
				echo json_encode($result);
				die;
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

	function loadApplicantsDocument(){
		$documentsModel = new Applicants_files();

		$applicant_id = $this->request->getGet('applicant_id');

		$data['documents'] = $documentsModel->where('applicant_id', $applicant_id)->findAll();
		return $this->response->setJSON($data);
	}

	function deleteFile(){
		$filesModel = new Applicants_files();

		$file_id = $this->request->getGet('file_id');

		$filename = $filesModel->where('applicants_file_id', $file_id)->find();

		foreach($filename as $val){
			$filename = $val['random_filename']; 
		}

		$res = $filesModel->where('applicants_file_id', $file_id)->delete();
		
			if ($res) {
				unlink('upload/applicants_files/'.$filename);
				$result['message'] = 'delete successfull!...';
				$result['status'] = 1;
				echo json_encode($result);
				die;
			} else {
				$result['message'] = 'delete failed!...';
				$result['status'] = 0;
				echo json_encode($result);
				die;
			}
	}



}
