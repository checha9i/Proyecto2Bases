<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contacts';
	
     protected $fillable = ['Nombre', 'Apellido', 'Correo','Password', 'Puesto','Jefe','Departamento','Permisos'];
}
