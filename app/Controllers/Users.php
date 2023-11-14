<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\AdviseryModel;
use App\Models\EmpModel;
use App\Models\EnrollmentMdl;
use App\Models\UsersModel;
use App\Models\SemesterModel;
use App\Models\SchoolYearModel;




class Users extends BaseController
{
    public function index($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/f_faculty/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
       

    }

    function reset_password_users()
    {
        $userMdl = new UsersModel();
        $user_id = $this->request->getPost('user_id_ref');
        $password = $this->request->getPost('new_pass');

        $new_password = Hash::make($password);

        try{
			$res = $userMdl->set('user_password', $new_password)->where('user_id', $user_id)->update();
			if($res){
				$result['status'] = 1;
				$result['message'] = $password;
				echo json_encode($result);
				die;
			}
		}catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			echo json_encode($result);
			die;
		}
    }

}