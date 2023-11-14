<?php
namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;


class News extends BaseController
{

    public function index()
    {
      $model = new NewsModel();
      $limit = 10;
      $load_limit = $this->request->getGet('load_limit');
      $cur_limit = $this->request->getGet('cur_limit');
      if (isset($load_limit)) {
        $limit = $cur_limit + 10;
      }

      $data = [
          'news'  => $model->getNews($limit),
          'title' => 'Iloilo National High School Updates',
          'limit' => $limit
      ];

      return view('f_news/index', $data);
    }

    function loadNews()
    {
      $model = new NewsModel();
      // $limit = $this->request->getGet('load_limit');

      $data = [
          'news'  => $model->findAll(),
          'title' => 'Iloilo National High School Updates'
          // 'limit' => $limit
      ];

      return $this->response->setJSON($data);
      // return view('f_news/index', $data);
    }

    public function view($slug = null){
      $model = new NewsModel();
      $limit = 10;
      $data['news'] = $model->getNews($limit, $slug);

      if (empty($data['news']))
      {
          throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
      }

      $data['title'] = $data['news']['title'];

      echo view('templates/news_header', $data);
      echo view('f_news/view', $data);
      echo view('templates/news_footer', $data);
    }

    public function create(){
        $model = new NewsModel();
        $adminId = session()->get('loggedAdmin');
        $timeStamp = new Time('now');
        $imageName = "no_image";
        $fileName = "no_file";
        $randomImageName = "";
        $randomFileName = "";

        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'headline' => 'required',
                'body'  => 'required',
                // 'news_image' => [
                //   'rules' => 'uploaded[news_image]',
                // ],
                'author'  => 'required',
            ]))
        {
        $newsImage = $this->request->getFile('news_image');
        if ( $newsImage->isValid() && ! $newsImage->hasMoved()) {//check if image is valid and has not moved
          $imageName = $newsImage->getName(); // get the original name of the image
          $randomImageName = $newsImage->getRandomName();
          $newsImage->move('upload/news_images/', $randomImageName); // move the image to upload folder
        }

        $newsFile = $this->request->getFile('news_file');
        if ( $newsFile->isValid() && ! $newsFile->hasMoved()) {//check if image is valid and has not moved
          $fileName = $newsFile->getName(); // get the original name of the image
          $randomFileName = $newsFile->getRandomName();
          $newsFile->move('upload/news_files/', $randomFileName); // move the image to upload folder
        }

          $model->save([
              'title' => $this->request->getPost('title'),
              'headlines' => $this->request->getPost('headline'),
              'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
              'body'  => $this->request->getPost('body'),
              'news_author'  => $this->request->getPost('author'),
              'news_image'  => $randomImageName,
              'news_file'  => $randomFileName,
              'news_link'  => $this->request->getPost('news_link'),
              'publisher'  => $adminId,
              'publish_time_stamp'  => $timeStamp,
          ]);

          echo view('templates/news_header', ['title' => 'Create a news item']);
          echo view('f_news/success.php');
          echo view('templates/news_footer');

        }
        else
        {
            echo view('templates/news_header', ['title' => 'Create a news item']);
            echo view('f_news/create');
            echo view('templates/news_footer');
        }
    }

  // function loadNews(){
  //   $newsModel = new NewsModel();
  //   $limit = 10;
  //   $data['news'] = $newsModel->orderBy('id','DESC')->limit($limit)->find();
  //   return $this->response->setJSON($data);
  // }//endoffunction

  function editNews(){
    $newsModel = new NewsModel();

    $id = $this->request->getPost('newsId');
    $data['news'] = $newsModel
                    ->where('id', $id)
                    ->findAll();

    return $this->response->setJSON($data);
  }//end of function

  function updateNews(){
    $newsModel = new NewsModel();

    $newsId = $this->request->getPost('input_newsId');

    $res = "";
  //  $imageCheck = $this->request->getPost('hidden_news_filename');

    $newsImage = $this->request->getFile('news_image');


      if ($newsImage->isValid() && ! $newsImage->hasMoved() ) {//check if image is valid and has not moved
        $imageName = $newsImage->getName(); // get the original name of the image
        $newsImage->move('upload/', $imageName); // move the image to upload folder
        $data = [
          'title' => $this->request->getPost('title'),
          'headlines' => $this->request->getPost('headlines'),
          'slug' => url_title($this->request->getPost('title'), '-', TRUE),
          'body' => $this->request->getPost('body'),
          'news_image' => $imageName,
        ];

        $res = $newsModel->update($newsId, $data);

      }else {
      $data = [
        'title' => $this->request->getPost('title'),
        'headlines' => $this->request->getPost('headlines'),
        'slug' => url_title($this->request->getPost('title'), '-', TRUE),
        'body' => $this->request->getPost('body'),
      ];

      $res = $newsModel->update($newsId, $data);
      }

    if ($res) {
      $result['status'] = 1;
      $result['message'] = "Success";
      echo json_encode($result);
      die;
    }else {
      $result['status'] = 0;
      $result['message'] = "Failed";
      echo json_encode($result);
      die;
    }
  }//end of function

  function deleteNews(){
    $newsModel = new NewsModel();
    $newsId = $this->request->getPost('newsId');
    $newsImage = $this->request->getPost('newsImage');

    //$newsModel->delete($newsId);

    $res = 	$newsModel->delete($newsId);

    if ($res) {
        $result['status'] = 1;
        $result['message'] = "data deleted succesfully";
        echo json_encode($result);
        die;
      }else {
        $result['status'] = 0;
        $result['message'] = "data failed to delete";
        echo json_encode($result);
        die;
      }

      unlink('upload/'.$newsImage);
  }//end of function


  function viewNews(){
    $newsModel = new NewsModel();
    $newsId = $this->request->getVar('newsId');

    $data['news'] = $newsModel
                    ->where('id', $newsId)
                    ->findAll();

    if ($data) {
     return  $this->response->setJSON($data);
    }else {
      $error['msge'] = "error in query";
      echo json_encode($error);
    }

  }//endof viewNews



  function gallery(){

    $data['title'] = "INHS Gallery";

    echo view('templates/news_header', $data);
    echo view('f_news/f_gallery/v_gallery', $data);
    echo view('templates/news_footer', $data);
  }


  function ohspUpdates($page = 'index'){
    // echo view('f_programs/ohsp/index.php');
    if ( ! is_file(APPPATH.'/Views/f_programs/ohsp/'.$page.'.php'))
    {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }

    $data['title'] = 'Academic Updates'; // Capitalize the first letter

    return view('f_programs/ohsp/'.$page);
  }

  
  function news_spste($page = 'index'){
    if ( ! is_file(APPPATH.'/Views/f_programs/spste/'.$page.'.php'))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }

    $data['title'] = 'Academic Updates'; 

    return view('f_programs/spste/'.$page);
  }

  function news_spfl($page = 'index'){
    if ( ! is_file(APPPATH.'/Views/f_programs/spfl-k/'.$page.'.php'))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }

    $data['title'] = 'Academic Updates'; 

    return view('f_programs/spfl-k/'.$page);
  }

  function news_spbe($page = 'index'){
    if ( ! is_file(APPPATH.'/Views/f_programs/spbe/'.$page.'.php'))
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }

    $data['title'] = 'Academic Updates'; 

    return view('f_programs/spbe/'.$page);
  }



}

 ?>
