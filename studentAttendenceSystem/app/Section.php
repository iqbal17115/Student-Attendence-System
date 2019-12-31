<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attendence;
class Section extends Model
{
    protected $fillable = [
        'teacher_email','semName', 'sem', 'semNo',
    ];
    public function attendence(){
    	return $this->hasMany('App\Attendence','section_id');
    }
}
