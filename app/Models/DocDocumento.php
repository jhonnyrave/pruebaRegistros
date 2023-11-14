<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    use HasFactory;
    public $table = "doc_documentos";
    protected $primaryKey = 'doc_id';
    protected $fillable = ['doc_nombre', 'doc_codigo','doc_id_tipo', 'doc_id_proceso','doc_id','doc_contenido'];

    public function doc_documentos(){
        return $this->belongsToMany(DocDocumento::class, "doc_documentos");
    }
}