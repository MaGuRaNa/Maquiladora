<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class materia_primas extends Model
{
	use SoftDeletes;
    protected $table = 'materia_primas';
   protected $primaryKey = 'Id_mat';  
   protected $fillable=['Id_mat','Nom_mat','Descripcion','Cantidad','Peso','Fecha'];
protected $date=['deleted_at'];
 
}
