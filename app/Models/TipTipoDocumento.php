<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipTipoDocumento extends Model
{
    use HasFactory;
    public $table = "tip_tipo_documentos";
    protected $primaryKey = 'tip_id';
    protected $fillable = array("*");

    public function tip_tipo_documentos(){
        return $this->belongsToMany(TipTipoDocumento::class, 'tip_tipo_documentos');
    }
}