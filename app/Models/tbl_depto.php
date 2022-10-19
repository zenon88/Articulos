<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_depto extends Model
{
    use HasFactory;
    protected $table = 'tbl_depto';
    protected $primaryKey = 'Id_depto';
    protected $guarded = [];
    public $timestamps = false;
}
