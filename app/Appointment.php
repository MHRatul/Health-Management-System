<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function patient(){
        return $this->belongsTo(User::class,'user_id');
    }
}
