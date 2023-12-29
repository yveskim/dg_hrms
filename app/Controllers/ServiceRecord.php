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
        ->join('station_tbl', 'station_tbl.station_id = service_record_tbl.sr_station_id', 'left')
        ->join('nbc_tbl', 'nbc_tbl.nbc_id = service_record_tbl.sr_nbc_id', 'left')
        ->join('salary_schedule_tbl', 'salary_schedule_tbl.nbc_id = nbc_tbl.nbc_id', 'left')
        ->groupBy('service_record_tbl.sr_id')
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
        $plMdl = new PlantillaModel();
        $emp_id = $this->request->getGet('emp_id');

        try {
           $data['sr'] = $serviceMdl->getServiceRecord($emp_id);
        } catch (\exception $e) {
            $data['error'] = $e->getMessage();
        }
        
        $data['emp'] = $empMdl
        ->where('emp_id', $emp_id)
        ->first();

        $data['st'] = $serviceMdl
        ->join('station_tbl', 'station_tbl.station_id = service_record_tbl.sr_station_id', 'left')
        ->where('service_record_tbl.sr_emp_id', $emp_id)
        ->where('service_record_tbl.is_active', true)
        ->first();

        $data['pl'] = $serviceMdl
        ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        ->where('service_record_tbl.sr_emp_id', $emp_id)
        ->where('plantilla_tbl.is_assigned', true)
        ->first();



        return $this->response->setJSON($data);
    }    

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
       
        $data['st'] = $serviceRecMdl
        ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        ->join('station_tbl', 'station_tbl.station_id = service_record_tbl.sr_station_id', 'left')
        ->where('service_record_tbl.sr_emp_id', $emp_id)
        ->first();

        $data['plant'] = $plantMdl
        // ->join('service_record_tbl', 'service_record_tbl.sr_plantilla_id = plantilla_tbl.plantilla_id', 'left')
        // ->where('service_record_tbl.sr_plantilla_id', null)
        ->where('is_assigned', 0)
        ->find();

        $data['nbc'] = $nbcMdl->findAll();


        return $this->response->setJSON($data);
    }



    function newServiceRecord(){
        $serviceMdl = new ServiceRecordModel();
        $plantMdl = new PlantillaModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');
        $plantilla_id = $this->request->getPost('pantilla_id');

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $this->request->getPost('nbc_ref'),
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $this->request->getPost('step'),
            'sr_status' => $this->request->getPost('app_status'),
            'sr_station_id' => $this->request->getPost('station_id'),
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_date_end' => $this->request->getPost('date_end'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];
        $checkIfNew = $serviceMdl->where('sr_emp_id', $emp_id)->countAllResults();//check if this is the first data of service reord
        if($checkIfNew > 0){
        
            $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
            $last_plantilla_id = "";
            foreach($activeSr as $sr){
                $activeSr = $sr['sr_id'];
                $last_plantilla_id = $sr['sr_plantilla_id'];
            }

            try {
                $res2 = $serviceMdl->save($data);
                if($res2){
                    $plantMdl->set('is_assigned', 0)->where('plantilla_id', $last_plantilla_id)->update();//remove assigned plantilla
                    try {
                        $res3 = $plantMdl->set('is_assigned', 1)->where('plantilla_id', $plantilla_id)->update();
                        if($res3){
                            $updateData = [
                                'is_active' => 0
                            ];
                            try {
                                $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
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
                    } catch (\Exception $e) {
                        $result['status'] = 0;
                        $result['message'] = $e->getMessage();
                        echo json_encode($result);
                        die;
                    }
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
                    try {
                        $res2 = $plantMdl->set('is_assigned', 1)->where('plantilla_id', $plantilla_id)->update();
                        if($res2){
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
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
        
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++


    function promotionServiceRecord(){
        $serviceMdl = new ServiceRecordModel();
        $plantMdl = new PlantillaModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');
        $plantilla_id = $this->request->getPost('pantilla_id');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $last_plantilla_id = "";
        $nbc_id = "";
        // $step = "";
        $status = "";
        $station_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $last_plantilla_id = $sr['sr_plantilla_id'];
            $nbc_id = $sr['sr_nbc_id'];
            // $step = $sr['sr_step'];
            $status = $sr['sr_status'];
            $station_id = $sr['sr_station_id'];
        }

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => 1,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];
        
     
        try {
            $res2 = $serviceMdl->save($data);
            if($res2){
                $plantMdl->set('is_assigned', 0)->where('plantilla_id', $last_plantilla_id)->update();//remove assigned plantilla
                try {
                    $res3 = $plantMdl->set('is_assigned', 1)->where('plantilla_id', $plantilla_id)->update();
                    if($res3){
                        $updateData = [
                            'is_active' => 0,
                            'sr_date_end' => $this->request->getPost('date_current_record_end')
                        ];
                        try {
                            $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
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
                } catch (\Exception $e) {
                    $result['status'] = 0;
                    $result['message'] = $e->getMessage();
                    echo json_encode($result);
                    die;
                }
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }


    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function transferServiceRecord(){
        $serviceMdl = new ServiceRecordModel();
        $plantMdl = new PlantillaModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');
        $station_id = $this->request->getPost('station_id');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $nbc_id = "";
        $step = "";
        $status = "";
        $plantilla_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $nbc_id = $sr['sr_nbc_id'];
            $step = $sr['sr_step'];
            $status = $sr['sr_status'];
            $plantilla_id = $sr['sr_plantilla_id'];
            // $station_id = $sr['sr_station_id'];
        }

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $step,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];
        
       
        try {
            $res2 = $serviceMdl->save($data);
            if($res2){
                $updateData = [
                    'is_active' => 0,
                    'sr_date_end' => $this->request->getPost('date_current_service_end')
                ];
                try {
                    $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
                    if($res){
                        $result['status'] = 1;
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
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
       
    }


    function seperation(){
        $serviceMdl = new ServiceRecordModel();
        $plantMdl = new PlantillaModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');
        $station_id = $this->request->getPost('station_id');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $nbc_id = "";
        $step = "";
        $status = "";
        $plantilla_id = "";
        $station_id = "";
        $last_plantilla_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $nbc_id = $sr['sr_nbc_id'];
            $step = $sr['sr_step'];
            $status = $sr['sr_status'];
            $plantilla_id = $sr['sr_plantilla_id'];
            $station_id = $sr['sr_station_id'];
            $last_plantilla_id = $sr['sr_plantilla_id'];
        }
        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $step,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('seperation_date'),
            'sr_date_end' => $this->request->getPost('seperation_date'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
            'sr_is_seperated' => true,
            'sr_seperation_cause' => $this->request->getPost('seperation_cause'),
            'sr_seperation_date' => $this->request->getPost('seperation_date'),
        ];

        try {
            $res2 = $serviceMdl->save($data);
            if($res2){
                try {
                    $res3 = $plantMdl->set('is_assigned', 0)->where('plantilla_id', $last_plantilla_id)->update();//remove assigned plantilla
                    if($res3){
                        $updateData = [
                            'is_active' => 0,
                            'sr_date_end' => $this->request->getPost('date_current_service_end')
                        ];
                        try {
                            $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
                            if($res){
                                $result['status'] = 1;
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
                } catch (\Exception $e) {
                    $result['status'] = 0;
                    $result['message'] = $e->getMessage();
                    echo json_encode($result);
                    die;
                }
                
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }
    // ++++++++++++++++++++++++++++++++++++++++++++++++
    
    function newSalarySchedule(){
        $serviceMdl = new ServiceRecordModel();
        // $plantMdl = new PlantillaModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');
        $new_nbc_id = $this->request->getPost('nbc_ref');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $step = "";
        $status = "";
        $plantilla_id = "";
        $station_id = "";
        $prev_nbc_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $prev_nbc_id = $sr['sr_nbc_id'];
            $step = $sr['sr_step'];
            $status = $sr['sr_status'];
            $plantilla_id = $sr['sr_plantilla_id'];
            $station_id = $sr['sr_station_id'];
        }

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $new_nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $step,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];

        if($prev_nbc_id == $new_nbc_id){
            $result['status'] = 3;
            $result['message'] = "Please Select New Salary Schedule";
            echo json_encode($result);
        }else{
            try {
                $updateData = [
                    'is_active' => 0,
                    'sr_date_end' => $this->request->getPost('date_current_service_end')
                ];
                $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
                if($res){
                    try {
                        $res2 = $serviceMdl->save($data);
                        if($res2){
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
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
        
        
    }
    


    function getTeachersForStepIncrease(){
        $serviceMdl = new ServiceRecordModel();
        
        $dateMinus3 = date('Y-m-d', strtotime('-3 years')); //minus 3 years to date
        $data['sr'] = $serviceMdl
        ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        ->where('service_record_tbl.is_active', 1)
        ->where('service_record_tbl.sr_date_started <=', $dateMinus3)
        ->find();

        return $this->response->setJSON($data);
    }


    function getTeachersLoyalty10Years(){
        $serviceMdl = new ServiceRecordModel();
        
        $dateMinus5 = date('Y-m-d', strtotime('-5 years')); //minus 3 years to date
        $dateMinus10 = date('Y-m-d', strtotime('-10 years')); //minus 3 years to date
        $data['sr'] = $serviceMdl
        ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        ->where('service_record_tbl.is_active', 1)
        ->where('service_record_tbl.sr_date_started <=', $dateMinus10)
        // TODO: add awarded table
        // ->where('service_record_tbl.sr_date_started <=', $dateMinus5)
        ->find();
        return $this->response->setJSON($data);
    }

    function getTeachersLoyalty5YearsSucceeding10Years(){
        // $serviceMdl = new ServiceRecordModel();
        // TODO: set the date start after recieving an award
        // $dateMinus10 = date('Y-m-d', strtotime('-10 years')); //minus 3 years to date
        // $dateMinus5 = date('Y-m-d', strtotime('-5 years')); //minus 3 years to date
        // $data['sr'] = $serviceMdl
        // ->join('employee_t', 'employee_t.emp_id = service_record_tbl.sr_emp_id', 'left')
        // ->join('plantilla_tbl', 'plantilla_tbl.plantilla_id = service_record_tbl.sr_plantilla_id', 'left')
        // ->where('service_record_tbl.is_active', 1)
        // ->where('service_record_tbl.sr_date_started <=', $dateMinus10)
        // ->where('service_record_tbl.sr_date_started >=', $dateMinus5)
        // ->find();

        // return $this->response->setJSON($data);
    }



    function stepIncrement(){
        $serviceMdl = new ServiceRecordModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $step = $this->request->getPost('new_step');
        $status = "";
        $plantilla_id = "";
        $station_id = "";
        $prev_nbc_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $prev_nbc_id = $sr['sr_nbc_id'];
            // $step = $sr['sr_step'];
            $status = $sr['sr_status'];
            $plantilla_id = $sr['sr_plantilla_id'];
            $station_id = $sr['sr_station_id'];
        }

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $prev_nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $step,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];

      
        try {
            $updateData = [
                'is_active' => 0,
                'sr_date_end' => $this->request->getPost('date_current_service_end')
            ];
            $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
            if($res){
                try {
                    $res2 = $serviceMdl->save($data);
                    if($res2){
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
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }
    
    function appointmentStatus(){
        $serviceMdl = new ServiceRecordModel();
        $user_id = $this->request->getPost('user_id');
        $emp_id = $this->request->getPost('emp_id');

        //set the details of active sr
        $activeSr = $serviceMdl->getActiveSr($emp_id);//find the last service record id
        $step = "";
        $status = $this->request->getPost('app_status');
        $plantilla_id = "";
        $station_id = "";
        $prev_nbc_id = "";
        foreach($activeSr as $sr){
            $activeSr = $sr['sr_id'];
            $prev_nbc_id = $sr['sr_nbc_id'];
            $step = $sr['sr_step'];
            // $status = $sr['sr_status'];
            $plantilla_id = $sr['sr_plantilla_id'];
            $station_id = $sr['sr_station_id'];
        }

        $data = [
            'sr_emp_id' => $emp_id,
            'sr_nbc_id' => $prev_nbc_id,
            'sr_plantilla_id' => $plantilla_id,
            'sr_step' => $step,
            'sr_status' => $status,
            'sr_station_id' => $station_id,
            'sr_date_started' => $this->request->getPost('date_started'),
            'sr_remarks' => $this->request->getPost('remarks'),
            'is_active' => 1,
            'sr_processed_by' => $user_id,
        ];

      
        try {
            $updateData = [
                'is_active' => 0,
                'sr_date_end' => $this->request->getPost('date_current_service_end')
            ];
            $res = $serviceMdl->set($updateData)->where('sr_id', $activeSr)->update();
            if($res){
                try {
                    $res2 = $serviceMdl->save($data);
                    if($res2){
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
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }
    




}


