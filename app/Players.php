<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    public function getCategory()
    {
        $category=Category::findorfail($this->category_id);
        return $category;
    }
    public function getPaid()
    {
        $paid=Paid::findorfail($this->paid_id);
        return $paid;
    }
    public function getUser()
    {
        $user=User::findorfail($this->created_by);
        return $user;
    }
}
