<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body', 'news_author', 'news_image', 'news_file', 'news_link', 'publish_time_stamp', 'headlines', 'publisher'];
    protected $primaryKey = 'id';
    public function getNews($limit, $slug = false)
    {
        if ($slug === false)
        {
            return $this->orderBy('id','DESC')->limit($limit)->find();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }
}




 ?>
