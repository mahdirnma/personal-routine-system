<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompletedInterval extends Model
{
    protected $fillable=[
        'interval_id',
        'date'
    ];

    public function interval()
    {
        return $this->belongsTo(Interval::class);
    }
}
