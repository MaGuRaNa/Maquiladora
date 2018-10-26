<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materia_primas extends Model
{
    protected $table = 'materia_primas';
   protected $primaryKey = 'Id_mat';  
   protected $fillable=['Id_mat','Nom_mat','Descripcion','Cantidad','Peso','Fecha','Activo_mat'];

 
}
