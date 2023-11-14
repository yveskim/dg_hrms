<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{

    public function view($page = 'index')
    {
        if ( ! is_file(APPPATH.'/Views/f_news/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('templates/news_header', $data);
        echo view('f_news/'.$page, $data);
        echo view('templates/news_footer', $data);
    }
}


 ?>
