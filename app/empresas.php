<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 



class empresas extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'Id_empresa';
    protected $fillable=['Id_empresa','Nomb_emp','Calle_emp','Colonia_emp','Local_emp','Numint_emp','Numext_emp','CP','Telefono'];
    protected $date=['deleted_at'];
}
