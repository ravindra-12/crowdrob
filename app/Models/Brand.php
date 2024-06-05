<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'brand_id'; // Customize the primary key

    public $timestamps = false; // Disable timestamps
    
    protected $fillable = ['name', 'description']; // Define fillable fields
}
