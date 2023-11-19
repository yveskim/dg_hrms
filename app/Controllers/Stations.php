<?php

namespace App\Controllers;

use App\Models\EmployeeModel;;
use App\Models\UsersModel;
use App\Models\StationModel;
use App\Models\FiscalYearModel;

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

}
