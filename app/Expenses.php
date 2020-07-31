<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'desc',
        'budget',
        'status'
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }
}
