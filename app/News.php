<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

//    public function getDetails(){
//        $details=News::findOrFail($this->id)->get();
//        return $details;
//    }


    /**
     * @return array
     */


    /**
     * @return array
     */
    public function getCategory()
    {
        $category=Category::findorfail($this->category_id);
        return $category;
    }

    public function getUser()
    {
        $user=User::findorfail($this->created_by);
        return $user;
    }



}
