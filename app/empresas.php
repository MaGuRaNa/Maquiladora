<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    protected $primaryKey = 'Id_empresa';
    protected $fillable=['Id_empresa','nomb_emp','ubicacion','CP','Telefono','Activo_empr'];
}
