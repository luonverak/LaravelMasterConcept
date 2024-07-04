<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoModel extends Model
{
    use HasFactory;
    protected $table = "logo";
    protected $fillable = ["logo_image"];
}
