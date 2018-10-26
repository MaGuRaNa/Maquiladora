<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
   protected $primaryKey = 'Id_emp';  
   protected $fillable=['Id_emp','NombreE','Ap_pat','Ap_mat',
                       'RFC','Telefono','Direccion','Activo_empl'];

}
