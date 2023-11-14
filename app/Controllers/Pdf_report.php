<?php
/**
 *
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use TCPDF;
use App\Models\EmpModel;


class Pdf_report extends BaseController
{


  function generated_pds($page = "teacher_pds"){
    if ( ! is_file(APPPATH.'/Views/f_report/'.$page.'.php'))
    {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
  //  $empModel = new EmpModel();
  //  $loggedAdminID = session()->get('loggedAdmin');

  //  $adminInfo = $empModel->where('emp_id' ,  $loggedAdminID)
  //              ->first();
  //  $data = [
  //    'title' => 'Admin',
//      'admin' => $adminInfo
//    ];

    $empModel = new EmpModel();
    $data['emp'] = $empModel->findAll();


    $report =  view('f_report/'.$page, $data);
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->AddPage();
    $pdf->writeHTML($report);
    $this->response->setContentType('application/pdf');
    $pdf->Output('test_report.pdf', 'I');
  }
}



 ?>
