<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function destroyUser($id) {
//DB::table('usuario')->where('idusuario', '=', $id)->delete();
       $date = new \DateTime();


     echo "Record deleted successfully.<br/>";
     echo '<a href="/Operador">Click Here</a> to go back.';
  }
}
