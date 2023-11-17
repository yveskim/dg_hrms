<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\EmployeeModel;
use App\Models\EmpModel;
use App\Models\StudentAccountModel;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function __construct()
    {
        helper('url', 'form');
    }

    public function index($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/f_login/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        //return view('f_templates/metro_header', $data);
        return view('f_login/' . $page);
        // return view('f_templates/metro_footer', $data);
    }

    public function validation()
    {
        $userModel = new UsersModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user_info = $userModel->where('user_email', $email)->first();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]|max_length[255]',
        ])) {
            //echo Hash::check($password, $user_info['user_password']);
            if ($userModel->check_email($email) == true) { //check if the email is existing or not
                $check_pass = Hash::check($password, $user_info['user_password']); //check is password is thesame in the database
                if (!$check_pass) {
                    session()->setFlashData('failed', 'Password did not match, please try again!...');
                    return redirect()->to('/login_admin')->withInput();
                } else {
                    if ($user_info['is_disabled'] == false) { //determine if what page to load depends on the user
                        $user_id = $user_info['user_id'];
                        $user_restriction = $user_info['user_restriction'];
                        session()->set('loggedAdmin', $user_id);
                        session()->set('userRestriction', $user_restriction);

                        $user_type = $user_info['user_type'];
                        session()->set('userType', $user_type);

                        $user_category = $user_info['user_category'];
                        session()->set('userCategory', $user_category);

                        if ($user_restriction == 1 || $user_restriction == 2) {
                            return redirect()->route('admin');
                        } else if ($user_restriction == 3) {
                            return redirect()->route('faculty');
                        } else {
                            session()->setFlashData('failed', 'account not yet available'); //return message if email is not in the database
                            return redirect()->to('/login_admin')->withInput();
                        }

                    } else {
                        session()->setFlashData('failed', 'account is disabled this time, contact the administrator...'); //return message if email is not in the database
                        return redirect()->to('/login_admin')->withInput();
                    }
                    $user_id = $user_info['user_id'];
                    session()->set('loggedUser', $user_id);
                    return redirect()->route('administrator_login');
                }
            } else {
                session()->setFlashData('failed', 'email not found!...'); //return message if email is not in the database
                return redirect()->to('/login_admin')->withInput();
            }
        } else {
            echo view('f_login/index');
        }
    }

    // public function loginStudent($page = 'student_login')
    // {
    //     if (!is_file(APPPATH . '/Views/f_login/' . $page . '.php')) {
    //         // Whoops, we don't have a page for that!
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    //     }
    //     return view('f_login/' . $page);
    // }

    // public function validateStudent()
    // {
    //     // $studMdl = new EnrollmentMdl();
    //     $accountMdl = new StudentAccountModel();

    //     $code = $this->request->getPost('student_code');
    //     $password = $this->request->getPost('password');

    //     // $student_info = $studMdl->where('user_name', $code)->first();
    //     $user_info = $accountMdl->where('user_name', $code)->first();

    //     if ($this->request->getMethod() === 'post' && $this->validate([
    //         'student_code' => 'required',
    //         'password' => 'required',
    //     ])) {
    //         if ($accountMdl->check_code($code) == true) { //check if the code is correct
    //             if ($user_info['password'] == $password) {
    //                 $is_dissabled = $user_info['is_dissabled'];
    //                 if ($is_dissabled == false) {
    //                     $user_id = $user_info['s_account_id'];
    //                     session()->set('user_id', $user_id);
    //                     session()->set('is_dissabled', $is_dissabled);
    //                     return redirect()->route('student');
    //                 } else {
    //                     session()->setFlashData('failed', 'account not available for now.'); //return message if email is not in the database
    //                     return redirect()->to('/login_student')->withInput();
    //                 }

    //             } else {
    //                 session()->setFlashData('failed', 'Password did not match, please try again!...');
    //                 return redirect()->to('/login_student')->withInput();
    //             }
    //         } else {
    //             session()->setFlashData('failed', 'student code not found, try again...'); //return message if email is not in the database
    //             return redirect()->to('/login_student')->withInput();
    //         }
    //     } else {
    //         return redirect()->to('/login_student')->withInput();
    //     }
    // }
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    public function register()
    {
        $loginModel = new UsersModel();
        $password = $this->request->getPost('password');
        if ($this->request->getMethod() === 'post' && $this->validate([
            // 'emp_id' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]|max_length[255]',
            'confirm_password' => 'required|matches[password]',
            'user_type' => 'required|max_length[255]',
            'restriction' => 'required',
            'user_category' => 'required',
        ])) {
            $password = $this->request->getPost('password');
            $email = $this->request->getPost('email');
            $checkEmail = $loginModel->where('user_email', $email) //check if there is data in the emp id in database.
                ->countAllResults();
            if ($checkEmail > 0) {
                return view('f_login/register', ['process' => 'failed']);
            } else {
                $loginModel->save([
                    'emp_id' => $this->request->getPost('emp_id'),
                    'user_email' => $this->request->getPost('email'),
                    'user_password' => Hash::make($password),
                    'user_type' => $this->request->getPost('user_type'),
                    'user_restriction' => $this->request->getPost('restriction'),
                    'user_category' => $this->request->getPost('user_category'),
                    'is_disabled' => 0,
                ]);
                return view('f_login/register', ['process' => 'success']);
            }
        } else {
            return view('f_login/register', ['process' => 'Register new user']);
        }
    }

    public function getEmpData()
    {
        $empModel = new EmployeeModel();

        $data['emp'] = $empModel->findAll();
        return $this->response->setJSON($data);
    }

    public function student_profile()
    {
        echo "This page is not yet available, please choose the pre-registration option for your login. thank you!";
    }

    // public function updateStudentPassword()
    // {
    //     $accMdl = new StudentAccountModel();
    //     if ($this->request->getMethod() === 'post' && $this->validate([
    //         'new_password' => 'required|min_length[8]',
    //         'confirm_new_password' => 'required|matches[new_password]',
    //     ])) {
    //         $userId = $this->request->getPost('user_id');
    //         $newPass = $this->request->getPost('new_password');

    //         $data = [
    //             'password' => $newPass,
    //             'is_new' => false,
    //         ];

    //         $res = $accMdl->update($userId, $data);
    //         if ($res) {
    //             //    session()->setFlashData('failed', 'email not found!...');
    //             return redirect()->route('student');
    //         }
    //     } else {
    //         //$errors = $validation->listErrors();
    //         $valid = \Config\Services::validation();
    //         // session()->destroy();
    //         return redirect()->back()->withInput()->with('validation', $valid);
    //         //    session()->setFlashData('error', 'password');
    //         //    return redirect()->route('change_password');
    //     }
    // }
}
