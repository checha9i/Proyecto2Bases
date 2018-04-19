<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;

class loginController extends BaseController
{
     public function login(Request $req)
     {
      $username = $req->input('username');
      $password = $req->input('password');

      $checkLogin = DB::table('usuario')->where(['correo'=>$username,'contrasena'=>$password])->get();
      if(count($checkLogin)  >0)
      {
    return    redirect('/Admin');
      }
      else
      {
       echo "Login Failed Wrong Data Passed";
      }
     }

     public function register(Request $req)
             	  {
             			$nombre = $req->input('nombre');
             			$apellido = $req->input('apellido');
             			$correo = $req->input('correo');
             			$contrasena = $req->input('contrasena');
             			$contrasena2 = $req->input('contrasena2');


             			if ($nombre != null && $contrasena==$contrasena2)
             			{


                    $data = array('nombre'=>$nombre, 'apellido'=>$apellido, 'correo'=>$correo, 'contrasena'=>$contrasena,'idpuesto'=>1);
             				DB::table('usuario')->insert($data);

             				$Clien = DB::select('select idusuario from usuario where correo= :pre order by idusuario DESC limit 1;', ['pre'=>$correo]);


        return    redirect('/home/Admin');
             			}
             			else
             			{
             	echo "error";
             			}

             	  }





}

?>
