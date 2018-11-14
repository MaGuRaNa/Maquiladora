<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proveedores extends Model
{
   protected $primaryKey = 'Id_prov';  
   protected $fillable=['Id_prov','NombreProv','Ap_pprov','Ap_mprov',
                       'RFC_prov','Id_empresa'];
 protected $date=['deleted_at'];
}
