<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encargado_maquiladoras extends Model
{
    protected $table ='encargado_maquiladoras';
    protected $guarded = ['_token'];
    protected $primaryKey = 'Id_em';
    protected $fillable=['Id_em','Usuario','Contrasena','Nom_enc','Ap_penc','Ap_menc','RFC_enc','Imagen_enc','Id_empresa'];
    protected $date=['deleted_at'];
   
}
