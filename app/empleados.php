<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class empleados extends Model
{
	use SoftDeletes;
   protected $primaryKey = 'Id_emp';  
   protected $fillable=['Id_emp','NombreE','Ap_pat','Ap_mat',
                       'RFC','Telefono','Calle_emple','Colonia_emple','Local_emple','Numint_emple','Numext_emple'];
     protected $date=['deleted_at'];

}
