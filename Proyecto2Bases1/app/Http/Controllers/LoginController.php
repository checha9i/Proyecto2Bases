<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
use Session;
class loginController extends BaseController
{
  public function login(Request $req)
  {
    $username = $req->input('username');
    $password = $req->input('password');

    $checkLogin = DB::table('usuario')->where(['correo'=>$username,'contrasena'=>$password])->get();

    if(count($checkLogin)  >0)
    {
  Session::put('boolnotificacion',0) ;

      $permiso4= DB::table('detalle_permiso')->where(['permiso'=>4,'idusuario'=>$checkLogin[0]->idusuario])->get();
if(count($permiso4)>0){
    if($checkLogin[0]->idusuario==1){
Session::put('User',1);
         return    redirect('/Admin');
       }
       Session::put('User',$checkLogin[0]->idusuario);
        return    redirect('/Usuarios');
      }
    }
    return    redirect('/login');

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
