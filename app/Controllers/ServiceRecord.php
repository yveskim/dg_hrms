<?php

namespace App\Controllers;

use App\Models\EmployeeModel;;
use App\Models\UsersModel;
use App\Models\ServiceRecordModel;
use App\Models\EmpStationModel;
use App\Models\NbcModel;
use App\Models\SalaryScheduleModel;
use App\Models\PlantillaModel; 


class ServiceRecord extends BaseController
{
    function getServiceRecord()
    {
        $serviceMdl = new ServiceRecordModel();
        $data['sr'] = $serviceMdl
        ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        ->join('emp_station_tbl', 'emp_station_tbl.emp_id = employee_t.emp_id', 'left')
        ->join('station_tbl', 'station_tbl.station_id = emp_station_tbl.station_id', 'left')
        ->join('nbc_tbl', 'nbc_tbl.nbc_id = service_record_tbl.sr_nbc_id', 'left')
        ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
        ->find();

        return $this->response->setJSON($data);
    }

    function selectEmployeeSr(){
        $empMdl = new EmployeeModel();
        $data['emp'] = $empMdl->findAll();
        return $this->response->setJSON($data);
    }

    function getEmpServiceRecord(){
        $serviceMdl = new ServiceRecordModel();
        $salSchedMdl = new SalaryScheduleModel();
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getGet('emp_id');

        // $getSalary = $SalaryScheduleModel->where()





        // $subquery = $salSchedMdl
        // ->where('nbc_id',  'service_record_tbl.sr_nbc_id')
        // ->where('salary_grade',  'plantilla_tbl.salary_grade')
        // ->where('step',  'service_record_tbl.sr_step')
        // ->select('amount')
        // ->first();

        // $data['sr'] = $serviceMdl
        // ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        // ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        // ->join('emp_station_tbl', 'emp_station_tbl.emp_id = employee_t.emp_id', 'left')
        // ->join('station_tbl', 'station_tbl.station_id = emp_station_tbl.station_id', 'left')
        // ->join('nbc_tbl', 'nbc_tbl.nbc_id = service_record_tbl.sr_nbc_id', 'left')
        // ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
        // ->fromSubquery($subquery, 'salary')
        // ->where('sr_emp_id', $emp_id)
        // ->groupBy('service_record_tbl.sr_id')
        // ->find();


        try {
           $data['sr'] = $serviceMdl->getServiceRecord($emp_id);
        } catch (\exception $e) {
            $data['error'] = $e->getMessage();
        }
        


        $data['emp'] = $empMdl
        ->where('emp_id', $emp_id)
        ->first();

        return $this->response->setJSON($data);
    }

    // function getEmpSalary(){
    //     $salSchedMdl = new SalaryScheduleModel();
    //     $nbc_id = $this->request->getGet('nbc_id');
    //     $step = $this->request->getGet('step');
    //     $grade = $this->request->getGet('grade');

    //     $data['salary'] = $salSchedMdl
    //     ->where('nbc_id', $nbc_id)
    //     ->where('salary_grade', $grade)
    //     ->where('step', $step)
    //     ->first();
    //     return $this->response->setJSON($data);
    // }

    

    function updatePlantilla(){
        $serviceMdl = new ServiceRecordModel();
        $user_id = $this->request->getPost('user_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'plantilla_item_no' => $this->request->getPost('plantilla_item_no'),
            'position_title' => $this->request->getPost('position_title'),
            'salary_grade' => $this->request->getPost('salary_grade'),
            'date_recieved' => $this->request->getPost('date_recieved'),
            'created_by' => $user_id,
        ];
        
        if($is_edit == true){
            $plantilla_id = $this->request->getPost('plantilla_id');
            try {
                $res = $serviceMdl->set($data)->where('plantilla_id', $plantilla_id)->update();
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
                $res = $serviceMdl->save($data);
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

    function getPlantillaDetails(){
        $serviceMdl = new ServiceRecordModel();
        $plantilla_id = $this->request->getGet('plantilla_id');
   
        $data['plant'] = $serviceMdl->where('plantilla_id', $plantilla_id)->first();

        return $this->response->setJSON($data);
    }


    function deletePlantilla(){
        $serviceMdl = new ServiceRecordModel();
        $plantilla_id = $this->request->getGet('plantilla_id');
        try {
            $res = $serviceMdl->where('plantilla_id', $plantilla_id)->delete();
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

    function viewplant(){
        $serviceMdl = new ServiceRecordModel();
        $plant_id = $this->request->getGet('plant_id');
        $data['plant'] = $serviceMdl->where('plant_id', $plant_id)->first();

        return $this->response->setJSON($data);
    }

    function loadSalaryGradeDetails(){
        $serviceMdl = new ServiceRecordModel();
        $plant_id = $this->request->getGet('plant_id');
        $sal_grade = $this->request->getGet('sal_grade');

        if($sal_grade == 0){
            $data['plant'] = $serviceMdl
            ->join('salary_schedule_tbl', 'salary_schedule_tbl.plant_id = plant_tbl.plant_id', 'left')
            ->where('salary_schedule_tbl.plant_id', $plant_id)
            ->orderBy('salary_schedule_tbl.salary_grade')
            ->orderBy('salary_schedule_tbl.step')
            ->find();
        }else{
            $data['plant'] = $serviceMdl
            ->join('salary_schedule_tbl', 'salary_schedule_tbl.plant_id = plant_tbl.plant_id', 'left')
            ->where('salary_schedule_tbl.plant_id', $plant_id)
            ->where('salary_schedule_tbl.salary_grade', $sal_grade)
            ->orderBy('salary_schedule_tbl.step')
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
        $plant_id = $this->request->getPost('plant_id');
         $data = [
            'plant_id' => $plant_id,
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
            $step = $this->request->getPost('_step');
            $checkStep = $salSchedMdl
            ->select('step')
            ->where('plant_id', $plant_id)
            ->where('salary_grade', $sal_grade)
            ->where('step', $step)
            ->countAllResults();
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
        $plant_id = $this->request->getGet('plant_id');
        $data['steps'] = $salSchedMdl
        ->select('step')
        ->where('salary_grade', $sal_grade)
        ->where('plant_id', $plant_id)
        ->find();

        return $this->response->setJSON($data);
    }

    function deleteSteps(){
        $salSchedMdl = new SalaryScheduleModel();
        $sal_sched_id = explode(',',$this->request->getPost('sal_sched_id'));//seperate the array to access in foreach  

        foreach($sal_sched_id as $value){
            $res = $salSchedMdl->where('sal_sched_id', $value)->delete();
        }

        try {
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

    function getNewServiceRecordDetails(){
        $serviceRecMdl = new ServiceRecordModel();
        $plantMdl = new PlantillaModel();
        $empStMdl = new EmpStationModel();
        $nbcMdl = new NbcModel();

        $emp_id = $this->request->getGet('emp_id');
       
        $data['st'] = $empStMdl
        ->join('employee_t', 'employee_t.emp_id = emp_station_tbl.emp_id', 'left')
        ->join('station_tbl', 'station_tbl.station_id = emp_station_tbl.station_id', 'left')
        ->where('emp_station_tbl.emp_id', $emp_id)
        ->first();

        $data['plant'] = $plantMdl
        ->join('service_record_tbl', 'service_record_tbl.sr_plantilla_id = plantilla_tbl.plantilla_id', 'left')
        ->where('service_record_tbl.sr_plantilla_id', null)
        ->find();

        $data['nbc'] = $nbcMdl->findAll();

        // $countSr = $serviceRecMdl->where('sr_emp_id', $emp_id)->countAllResults();
       
        // if($countSr > 0){
        //     $data['new_record'] = false;
        //     $data['sr'] = $serviceRecMdl
        //     ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        //     ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        //     ->join('nbc_tbl', 'nbc_tbl.nbc_id = service_record_tbl.sr_nbc_id', 'left')
        //     ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
        //     ->join('emp_station_tbl', 'emp_station_tbl.emp_id = employee_t.emp_id', 'left')
        //     ->join('station_tbl', 'station_tbl.station_id = emp_station_tbl.station_id', 'left')
        //     ->where('sr_emp_id', $emp_id)
        //     ->orderBy('DESC')
        //     ->limit(1);      
        // }else{
        //     $data['new_record'] = true;

        // }

        // $data['new_record'] = true;

        return $this->response->setJSON($data);
    }



    function newServiceRecord(){
        $serviceMdl = new ServiceRecordModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $this->request->getPost('nbc_ref'),
            'sr_plantilla_id' => $this->request->getPost('pantilla_no'),
            'sr_step' => $this->request->getPost('step'),
            'sr_status' => $this->request->getPost('app_status'),
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_date_end' => $this->request->getPost('date_end'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'sr_processed_by' => $user_id,
        ];
        
        try {
            $res = $serviceMdl->save($data);
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

