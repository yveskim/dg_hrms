<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\ProgramHeadModel;
use App\Models\DepartmentModel;
use App\Models\ProgramModel;
use App\Models\EmployeePositionsModel;
use App\Models\SemesterModel;

class Settings extends BaseController
{
	public function index($page = 'index')
	{
		if (!is_file(APPPATH . '/Views/settings/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		return view('settings/' . $page);
	}

	function getDepartment(){
		$depMdl = new DepartmentModel();	
		$data['dept'] = $depMdl->findAll();
		return $this->response->setJSON($data);
	}

	function getPositions(){	
		$empPosMdl = new EmployeePositionsModel();	
		$data['pos'] = $empPosMdl->orderBy('pos_title')->findAll();
		return $this->response->setJSON($data);
	}

	function setPosition()
	{
		$empPosMdl = new EmployeePositionsModel();
	
		$data = [
			'pos_title' => $this->request->getPost('pos_title'),
			'category' => $this->request->getPost('_category'),
		];

		$is_edit = $this->request->getPost('is_edit');
		$pos_id = $this->request->getPost('pos_id');



		if($is_edit == true){
			try {
				$res = $empPosMdl->set($data)->where('emp_pos_id', $pos_id)->update();
				if ($res) {
					$result['status'] = 1;
					echo json_encode($result);
					die;
				}
			} catch (\Exception $e) {
				$result['status'] = 0;
				$result['message'] = $e->getMessage();
				echo json_encode($result);
				die;
			}
		}else{
			try {
				$res = $empPosMdl->insert($data);
				if ($res) {
					$result['status'] = 1;
					echo json_encode($result);
					die;
				}
			} catch (\Exception $e) {
				$result['status'] = 0;
				$result['message'] = $e->getMessage();
				echo json_encode($result);
				die;
			}
		}
		
		

	}


	function getPositionsDetails(){	
		$empPosMdl = new EmployeePositionsModel();	
		$pos_id = $this->request->getGet('pos_id');
		$data['pos'] = $empPosMdl->where('emp_pos_id', $pos_id)->first();
		return $this->response->setJSON($data);
	}

	function deletePosition(){
		$empPosMdl = new EmployeePositionsModel();	
		$pos_id = $this->request->getGet('pos_id');
        try {
            $res = $empPosMdl->where('emp_pos_id', $pos_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
	}

}
