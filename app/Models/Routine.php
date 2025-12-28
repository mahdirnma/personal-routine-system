<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable=[
        'title',
        'description',
        'publish_date',
        'reminder_date',
        'reminder_time',
        'status',
        'category_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function interval()
    {
        return $this->hasOne(Interval::class);
    }
}
