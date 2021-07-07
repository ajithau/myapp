<?php

namespace App\Imports;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel
{
    public function  __construct($post_id)
    {
        $this->post_id= $post_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comment([
            'comment'=> $row[0],
            'post_id'=> $this->post_id
        ]);
    }
}
