<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProProceso extends Model
{
    use HasFactory;
    public $table = "pro_procesos";
    protected $fillable = array("*");

    public function pro_procesos(){
        return $this->belongsToMany(ProProceso::class,"pro_procesos");
    }
}