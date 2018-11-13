<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pigmentos extends Model
{
   protected $primaryKey = 'Id_pig';  
   protected $fillable=['Id_pig','Clave','Color'];
 protected $date=['deleted_at'];
}
