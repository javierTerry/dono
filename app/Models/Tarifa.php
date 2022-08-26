<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $fillable =['ltds_id','servicio_id','kg_ini','kg_fin','kg_extra','extendida'];
}
