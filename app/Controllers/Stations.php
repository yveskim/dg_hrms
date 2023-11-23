<?php

namespace App\Controllers;

use App\Models\EmployeeModel;;
use App\Models\UsersModel;
use App\Models\StationModel;
use App\Models\FiscalYearModel;
use App\Models\EmpStationModel;


class Stations extends BaseController
{
    function loadAllStations()
    {
        $stMdl = new StationModel();
        $data['st'] = $stMdl->findAll();
        return $this->response->setJSON($data);
    }

    function updateStation(){
        $stMdl = new StationModel();
        $user_id = $this->request->getPost('user_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'st_title' => $this->request->getPost('st_title'),
            'st_office_id' => $this->request->getPost('st_id'),
            'st_office_address' => $this->request->getPost('st_address'),
            'st_branch' => $this->request->getPost('st_branch'),
            'st_created_by' => $user_id,
        ];
        
        if($is_edit == true){
            $station_id = $this->request->getPost('station_id');
            try {
                $res = $stMdl->set($data)->where('station_id', $station_id)->update();
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
                $res = $stMdl->save($data);
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

    function getStationDetails(){
        $stMdl = new StationModel();
        $station_id = $this->request->getGet('station_id');
   
        $data['st'] = $stMdl->where('station_id', $station_id)->first();

        return $this->response->setJSON($data);
    }


    function deleteStation(){
        $stMdl = new StationModel();
        $station_id = $this->request->getGet('station_id');
        try {
            $res = $stMdl->where('station_id', $station_id)->delete();
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

    function getStations(){
        $stMdl = new StationModel();
        $data['st'] = $stMdl->findAll();

        return $this->response->setJSON($data);
    }

    function loadEmpInStation(){
        $empStMdl = new EmpStationModel();
        $stMdl = new StationModel();

        $station_id = $this->request->getGet('station_id');
        $data['st'] = $empStMdl
        ->join('employee_t', 'employee_t.emp_id = emp_station_tbl.emp_id', 'left')
        ->join('station_tbl', 'station_tbl.station_id = emp_station_tbl.station_id', 'left')
        ->where('emp_station_tbl.station_id', $station_id)->find();

        $data['title'] = $stMdl->where('station_id', $station_id)->first();
        $data['office_id'] = $stMdl->select('st_office_id')->where('station_id', $station_id)->first();
        $data['address'] = $stMdl->select('st_office_address')->where('station_id', $station_id)->first();
        $data['branch'] = $stMdl->select('st_branch')->where('station_id', $station_id)->first();

        return $this->response->setJSON($data);
    }

    function getEmpNoStation(){
        $empmdl = new EmployeeModel();
        $data['emp'] = $empmdl
        ->join('emp_station_tbl', 'emp_station_tbl.emp_id = employee_t.emp_id', 'left')
        ->select('employee_t.emp_id')
        ->select('employee_t.emp_lname')
        ->select('employee_t.emp_fname')
        ->select('employee_t.emp_mname')
        ->select('employee_t.emp_agency_employee_no')
        ->where('emp_station_tbl.emp_station_id', null)
        ->find();

        return $this->response->setJSON($data);
    }

    function setEmployeeStation(){
        $emStMdl = new EmpStationModel();
        $user_id = $this->request->getPost('user_id');
        $emp = explode(',',$this->request->getPost('employee'));  
        $date_started = $this->request->getPost('date_started');  
        $date_ended = $this->request->getPost('date_ended');  
        $station_id = $this->request->getPost('station_id');  
        
        // $data['count'] = $emp;
        foreach($emp as $value){
            $data = [
                'emp_id' => $value,
                'station_id' => $station_id,
                'date_started' => $date_started,
                'date_end' => $date_ended,
                'assigned_by' => $user_id
            ]; 
            $res = $emStMdl->save($data);
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
        // return $this->response->setJSON($data);
        
        
        
        
    }
    

}
