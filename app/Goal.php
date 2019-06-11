<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    //
    protected $fillable = ['course_id', 'goal'];

    public function course () {
    	return $this->belongsTo(Course::class);
    }
}
