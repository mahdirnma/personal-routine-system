<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $fillable=[
        'title',
        'start_date',
        'end_date',
        'reminder_date',
        'reminder_time',
        'repeat',
        'routine_id',
    ];
    public function routine(){
        return $this->belongsTo(Routine::class);
    }

    public function completedIntervals()
    {
        return $this->hasMany(CompletedInterval::class);
    }
}
