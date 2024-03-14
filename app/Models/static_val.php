<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class static_val extends Model
{
    use HasFactory;
    protected $table = 'static_val';
    protected $fillable = ['symbol','value'];
    
}
