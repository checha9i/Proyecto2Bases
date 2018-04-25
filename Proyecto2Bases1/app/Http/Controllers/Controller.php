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
class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function destroyUser($id) {
    //DB::table('usuario')->where('idusuario', '=', $id)->delete();
    $date = new \DateTime();


    echo "Record deleted successfully.<br/>";
    echo '<a href="/Operador">Click Here</a> to go back.';
  }

  public function AddCondicion(Request $req) {
    $Condicion = $req->input('Condicion');
    $Descripcion = $req->input('Descripcion');

    $Valor = $req->input('Valor');


    if ($Condicion != null)
    {
      $check = DB::table('condicion')->where(['condicion'=>$Condicion])->get();
      if(count($check)==0){
        $data = array('condicion'=>$Condicion,'valor'=>$Valor, 'descripcion'=>$Descripcion, 'tipo'=>"F");
        DB::table('condicion')->insert($data);



        return    redirect('/Usuarios');


      }
      else
      {
        Session::put('error',"ErrorCondicion");
        return redirect('/AddCondicion');
      }


    }
    else
    {
        Session::put('error',"ErrorCondicion");
      return redirect('/AddCondicion');
    }

  }
}
