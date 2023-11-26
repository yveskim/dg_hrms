<?php

namespace App\Controllers;

use App\Models\EmployeeModel;;
use App\Models\UsersModel;
use App\Models\StationModel;
use App\Models\FiscalYearModel;
use App\Models\NbcModel;
use App\Models\SalaryScheduleModel;


class Nbc extends BaseController
{
    function getNbc()
    {
        $nbcMdl = new NbcModel();
        $data['nbc'] = $nbcMdl
        ->orderBy('nbc_no')
        ->findAll();
        return $this->response->setJSON($data);
    }

    function updateNbc(){
        $nbcMdl = new NbcModel();
        $user_id = $this->request->getPost('user_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'nbc_no' => $this->request->getPost('nbc_no'),
            'nbc_title' => $this->request->getPost('nbc_title'),
            'tranche' => $this->request->getPost('tranche'),
            'effectivity_date' => $this->request->getPost('effectivity_date'),
            'processed_by' => $user_id,
        ];
        
        if($is_edit == true){
            $nbc_id = $this->request->getPost('nbc_id');
            try {
                $res = $nbcMdl->set($data)->where('nbc_id', $nbc_id)->update();
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
        }else{
            try {
                $res = $nbcMdl->save($data);
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

    function getNbcDetails(){
        $nbcMdl = new NbcModel();
        $nbc_id = $this->request->getGet('nbc_id');
   
        $data['nbc'] = $nbcMdl->where('nbc_id', $nbc_id)->first();

        return $this->response->setJSON($data);
    }


    function deleteNbc(){
        $nbcMdl = new NbcModel();
        $nbc_id = $this->request->getGet('nbc_id');
        try {
            $res = $nbcMdl->where('nbc_id', $nbc_id)->delete();
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


    // ----------------- employee stations ----------------------------------

    function viewNbc(){
        $nbcMdl = new NbcModel();
        $nbc_id = $this->request->getGet('nbc_id');
        $data['nbc'] = $nbcMdl->where('nbc_id', $nbc_id)->first();

        return $this->response->setJSON($data);
    }

    function loadSalaryGradeDetails(){
        $nbcMdl = new NbcModel();
        $nbc_id = $this->request->getGet('nbc_id');
        $sal_grade = $this->request->getGet('sal_grade');

        if($sal_grade == 0){
            $data['nbc'] = $nbcMdl
            ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
            ->where('salary_schedule_tbl.nbc_id', $nbc_id)
            ->orderBy('salary_schedule_tbl.amount')
            ->find();
        }else{
            $data['nbc'] = $nbcMdl
            ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
            ->where('salary_schedule_tbl.nbc_id', $nbc_id)
            ->where('salary_schedule_tbl.salary_grade', $sal_grade)
            ->orderBy('salary_schedule_tbl.amount')
            ->find();
        }
        
        return $this->response->setJSON($data);
    }

    function setStep(){
        $salSchedMdl = new SalaryScheduleModel();
        // $user_id = $this->request->getPost('user_id');
        $is_edit = $this->request->getPost('is_edit');
        $step = $this->request->getPost('_step');
        $sal_grade = $this->request->getPost('sal_grade');
         $data = [
            'nbc_id' => $this->request->getPost('nbc_id'),
            'salary_grade' => $sal_grade,
            'step' => $step,
            'amount' => $this->request->getPost('_amount'),
        ];
        
        if($is_edit == true){
            $sal_sched_id = $this->request->getPost('sal_sched_id');
            try {
                $res = $salSchedMdl->set($data)->where('sal_sched_id', $sal_sched_id)->update();
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
        }else{
            $checkStep = $salSchedMdl->select('step')->where('salary_grade', $sal_grade)->countAllResults();
            if($checkStep > 0){
                $result['status'] = 0;
                $result['message'] = "Step already exist, check on the table for steps that don't exist.";
                echo json_encode($result);
                die;
            }else{
                try {
                    $res = $salSchedMdl->save($data);
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
       
    }

    function getExistingStep(){
        $salSchedMdl = new SalaryScheduleModel();
        $sal_grade = $this->request->getGet('sal_grade');
        $nbc_id = $this->request->getGet('nbc_id');
        $data['steps'] = $salSchedMdl
        ->select('step')
        ->where('salary_grade', $sal_grade)
        ->where('nbc_id', $nbc_id)
        ->find();

        return $this->response->setJSON($data);
    }


}
