<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs'; 
    protected $primaryKey = 'id'; 

    use HasFactory;

    protected $fillable = ['job_title', 'job_description', 'job_status'];
}
