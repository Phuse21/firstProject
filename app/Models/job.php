<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'salary',
    ];
}
;