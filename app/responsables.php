<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class responsables extends Model
{
    use SoftDeletes;
    protected $table ='responsables';
    protected $primaryKey = 'Id_resp';
    protected $fillable=['Id_resp','Nombre_resp','Ap_presp','Ap_mresp','RFC_resp','Id_empresa'];
    protected $date=['deleted_at'];
}
