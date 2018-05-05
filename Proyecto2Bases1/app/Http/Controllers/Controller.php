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

  public function CrearProceso(Request $req)
    {
    Session::put('EtapaFinal', 0);
    Session::put('NumeroEtapa', 0);
    $nombre = $req->input('nombre');
    $fecha_creacion = $req->input('fecha_creacion');
    $fecha_vigencia_inicio = $req->input('fecha_vigencia_inicio');
    $fecha_vigencia_fin = $req->input('fecha_vigencia_fin');
    $descripcion = $req->input('descripcion');
    $tipo = $req->input('tipo');
    $etapa = $req->input('etapa');
    $depto = $req->input('depto');
    if ($nombre != null)
    {
      $data = array('nombre'=>$nombre,'fecha_creacion'=>$fecha_creacion,'fecha_vigencia_inicio'=>$fecha_vigencia_inicio,'fecha_vigencia_fin'=>$fecha_vigencia_fin,'descripcion'=>$descripcion,'tipo'=>$tipo);

      DB::table('proceso')->insert($data);

      $NumProceso = DB::select('select idproceso from proceso ORDER BY idproceso DESC');

      $NumDepto = DB::select('select * from departamento where nombre = :nom',['nom'=>$depto]);

      $data1 = array('iddepartamento'=>$NumDepto[0]->iddepartamento,'idproceso'=>$NumProceso[0]->idproceso);
      DB::table('detalle_proceso_departamento')->insert($data1);

      Session::put('NumProceso', $NumProceso[0]->idproceso);
      Session::put('Depto', substr($depto, 0, 1));
      if ($etapa == 'E')
      {
        $users=DB::select('select * from usuario ORDER BY idusuario ASC');
        //var_dump($users);
        return view('/AgregarEtapa', compact('etapa'), compact('users'));
      }
      else
      {
        return view('/AgregarEtapa', compact('etapa'));
      }
    }
    else
    {
      return view('/CrearProceso');
    }
  }


  public function AgregarEtapa(Request $req)
  {
    $nombre = $req->input('nombre');
    $SelectUsuario = $req->input('SelectUsuario');
    $etapa = $req->input('etapa');

    if ($nombre != null)
    {
      Session::put('NumeroEtapa', Session::get('NumeroEtapa')+1);
      $data = array('nombre'=>$nombre,'idusuario'=>$SelectUsuario);
      DB::table('etapa')->insert($data);

      $NumEtapa = DB::select('select * from etapa ORDER BY idetapa DESC');
      Session::put('EtapaTrabaja', $NumEtapa[0]->idetapa);
      $data1 = array('tipoetapa'=>'E','idproceso'=>Session::get('NumProceso'), 'idetapa'=>$NumEtapa[0]->idetapa, 'idestado'=> 6, 'numeroetapa'=>Session::get('NumeroEtapa'));
      DB::table('flujo')->insert($data1);

      if ($etapa == 'E')
      {
        $users=DB::select('select * from usuario ORDER BY idusuario ASC');
        //var_dump($users);
        return view('/AgregarEtapa', compact('etapa'), compact('users'));
      }
      else
      {
        return view('/AgregarEtapa', compact('etapa'));
      }
    }
    else
    {
      echo 'Error 092: Te haz perdido en la navegacion x.x';
    }
  }

  public function AgregarPausa(Request $req)
  {
    $SelectTipoTiempo = $req->input('SelectTipoTiempo');
    $valor = $req->input('valor');
    $etapa = $req->input('etapa');

    if ($valor != null)
    {
      Session::put('NumeroEtapa', Session::get('NumeroEtapa')+1);
      if ($SelectTipoTiempo == 'F')
      {
        $data = array('tipo'=>$SelectTipoTiempo,'fecha'=>$valor);
        DB::table('pausa')->insert($data);
      }
      else
      {
        $data = array('tipo'=>$SelectTipoTiempo,'tiempo'=>$valor);
        DB::table('pausa')->insert($data);
      }

      $NumEtapa = DB::select('select * from pausa ORDER BY idpausa DESC');
      Session::put('EtapaTrabaja', $NumEtapa[0]->idpausa);
      $data1 = array('tipoetapa'=>'P','idproceso'=>Session::get('NumProceso'), 'idpausa'=>$NumEtapa[0]->idpausa, 'idestado'=> 6, 'numeroetapa'=>Session::get('NumeroEtapa'));
      DB::table('flujo')->insert($data1);

      if ($etapa == 'E')
      {
        $users=DB::select('select * from usuario ORDER BY idusuario ASC');
        //var_dump($users);
        return view('/AgregarEtapa', compact('etapa'), compact('users'));
      }
      else
      {
        return view('/AgregarEtapa', compact('etapa'));
      }
    }
    else
    {
      echo 'Error 092: Te haz perdido en la navegacion x.x';
    }
  }

  public function AgregarIntegracion(Request $req)
  {
    $etapa = $req->input('etapa');

    if ($etapa != "")
    {
      Session::put('NumeroEtapa', Session::get('NumeroEtapa')+1);

      $data = array('etapaproxima'=>null);
      DB::table('integracion')->insert($data);

      $NumEtapa = DB::select('select * from integracion ORDER BY idintegracion DESC');
      Session::put('EtapaTrabaja', $NumEtapa[0]->idintegracion);
      $data1 = array('tipoetapa'=>'I','idproceso'=>Session::get('NumProceso'), 'idintegracion'=>$NumEtapa[0]->idintegracion, 'idestado'=> 6, 'numeroetapa'=>Session::get('NumeroEtapa'));
      DB::table('flujo')->insert($data1);

      if ($etapa == 'E')
      {
        $users=DB::select('select * from usuario ORDER BY idusuario ASC');
        //var_dump($users);
        return view('/AgregarEtapa', compact('etapa'), compact('users'));
      }
      else
      {
        return view('/AgregarEtapa', compact('etapa'));
      }
    }
    else
    {
      echo 'Error 092: Te haz perdido en la navegacion x.x';
    }
  }

  public function AgregarCondicion(Request $req, $id)
  {
    $SelectCondicion = $req->input('SelectCondicion');
    $SiguienteEtapa = $req->input('SiguienteEtapa');

    if ($SiguienteEtapa != null)
    {

      $flujo = DB::select('select * from flujo where idflujo = :tip ', ['tip'=>$id]);

      if ($flujo[0]->tipoetapa == 'P')
      {
        $pausa = DB::select('select * from pausa where idpausa = :tip ', ['tip'=>$flujo[0]->idpausa]);


        $affected = DB::update('update pausa
        set etapaproxima = :nom  where idpausa = :id',
        ['nom'=>$SiguienteEtapa, 'id'=>$pausa[0]->idpausa]);

        $affected1 = DB::update('update flujo
        set idestado = 1 where idflujo = :id',
        ['id'=>$id]);

        $letra = $flujo[0]->tipoetapa;
        $users = DB::select('select * from flujo where idproceso = :tip ORDER BY numeroetapa', ['tip'=> Session::get('NumProceso')]);
        return view('/ConfigurarEtapas', compact('users'));
      }
      elseif ($flujo[0]->tipoetapa == 'E')
      {

        $etapa = DB::select('select * from etapa where idetapa = :tip ', ['tip'=>$flujo[0]->idetapa]);


        $data = array('idetapa'=>$etapa[0]->idetapa, 'condicion'=>$SelectCondicion, 'etapaproxima'=>$SiguienteEtapa);
        DB::table('detalle_condicion_etapa')->insert($data);

        $affected1 = DB::update('update flujo
        set idestado = 1 where idflujo = :id',
        ['id'=>$id]);

        $letra = $flujo[0]->tipoetapa;
        $users = DB::select('select * from flujo where idproceso = :tip ORDER BY numeroetapa', ['tip'=> Session::get('NumProceso')]);
        return view('/ConfigurarEtapas', compact('users'));
      }
      else
      {

        $integracion = DB::select('select * from integracion where idintegracion = :tip ', ['tip'=>$flujo[0]->idintegracion]);

        $affected = DB::update('update integracion
        set etapaproxima = :nom  where idintegracion = :id',
        ['nom'=>$SiguienteEtapa, 'id'=>$integracion[0]->idintegracion]);

        $affected1 = DB::update('update flujo
        set idestado = 1 where idflujo = :id',
        ['id'=>$id]);

        $letra = $flujo[0]->tipoetapa;
        $users = DB::select('select * from flujo where idproceso = :tip ORDER BY numeroetapa', ['tip'=> Session::get('NumProceso')]);
        return view('/ConfigurarEtapas', compact('users'));
      }
    }
    else
    {
      $flujo = DB::select('select * from flujo where idflujo = :tip ', ['tip'=>$id]);

      $Letra = $flujo[0]->tipoetapa;
      $Condiciones = DB::select('select * from condicion where tipo = :tip', ['tip'=> Session::get('Depto')]);
      return view('/AgregarCondicion', compact('Condiciones'), compact('id'))->with('Letra', $Letra);
    }
  }

  public function AgregarDetalleIntegracion($id)
  {

    $data = array('idproceso'=>$id, 'idintegracion'=>Session::get('IntegracionSeleccionada'));
    DB::table('detalle_proceso_integracion')->insert($data);

    $users = DB::select('select * from proceso');
    return view('/AgregarDetalleIntegracion', compact('users'));
  }

  public function saber($id)
  {
    Session::put('IntegracionSeleccionada', $id);

    $users = DB::select('select * from proceso');
    return view('/AgregarDetalleIntegracion', compact('users'));
  }


  public function ConfigurarEtapas(Request $req)
  {
    if (Session::get('EtapaFinal') == 0)
    {
      Session::put('NumeroEtapa', Session::get('NumeroEtapa')+1);
      $data1 = array('tipoetapa'=>'F','idproceso'=>Session::get('NumProceso'), 'idestado'=> 1, 'numeroetapa'=>Session::get('NumeroEtapa'));
      DB::table('flujo')->insert($data1);
      Session::put('EtapaFinal', 1);
    }
    $users = DB::select('select * from flujo where idproceso = :tip ORDER BY numeroetapa', ['tip'=> Session::get('NumProceso')]);
    return view('/ConfigurarEtapas', compact('users'));

  }


  public function destroyUser($id) {
    //DB::table('usuario')->where('idusuario', '=', $id)->delete();
    $date = new \DateTime();


    echo "Record deleted successfully.<br/>";
    echo '<a href="/Operador">Click Here</a> to go back.';
  }


//$Condiciones
public function destroyCondicion($id) {
  DB::table('condicion')->where('condicion', '=', $id)->delete();
return redirect("/DropCondicion");
}

public function modifyCondicion($id) {
  Session::put('modifystate',$id);
return redirect("/ModifyCondicion1");
}

public function actualizarCondicion(Request $req) {
  $Condicion = Session::get('modifystate');
  $Descripcion = $req->input('Descripcion');
  $Valor = $req->input('Valor');
  DB::table('condicion')
            ->where('condicion', $Condicion)
            ->update(['descripcion' => $Descripcion,'valor'=>$Valor]);
Session::put('modifystate',"");
return redirect('/ModifyCondicion');
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
  //$Proceso
  public function destroyProceso($id) {
    DB::table('flujo')->where('idproceso', '=', $id)->delete();
  DB::table('detalle_proceso_departamento')->where('idproceso', '=', $id)->delete();
    DB::table('detalle_proceso_integracion')->where('idproceso', '=', $id)->delete();
    DB::table('proceso')->where('idproceso', '=', $id)->delete();
  return redirect("/DropProcess");
  }

//Gestion
public function AnadirGestion(Request $req)
{
  $proceso = $req->input('process');
    $tipos = DB::table('proceso')->where(['idproceso'=>$proceso])->get();

    if ($tipos[0]->tipo =='A')
    {

Session::put('proceso',$proceso);
      return redirect("/AddActivity");
    }else if($tipos[0]->tipo == 'D')
    {
      Session::put('proceso',$proceso);
            return redirect("/AddDocument");
    }

return redirect("/AddGestion");
}

//Actividad
public function AnadirActividad(Request $req)
{
  $proceso = Session::get('proceso');
  $data = array('nombre'=>$req->input('nombre'),'fechahora'=>$req->input('fecha'), 'descripcion'=>$req->input('Descripcion'), 'coordinador'=>$req->input('coordinador'),'lugar'=>$req->input('lugar'));
  DB::table('actividad')->insert($data);
  $noactividad=DB::table('actividad')->max('idactivdiad');
  $data2 =array('tipo'=>'A','usuarioregistrador'=>Session::get('User'),'idactivdiad'=>$noactividad,'idproceso'=>$proceso);
  DB::table('gestion')->insert($data2);

return redirect("/AddGestion");
}


//Documento
public function AnadirDocumento(Request $req)
{
  $proceso = Session::get('proceso');
  $data = array('nombre'=>$req->input('nombre'),'fechahora'=>$req->input('fechahora'), 'descripcion'=>$req->input('Descripcion'), 'ruta'=>$req->input('ruta'),'proceso'=>$proceso);
  DB::table('documento')->insert($data);
  $noactividad=DB::table('documento')->max('iddocumento');
  $data2 =array('tipo'=>'D','usuarioregistrador'=>Session::get('User'),'iddocumento'=>$noactividad,'idproceso'=>$proceso);
  DB::table('gestion')->insert($data2);

return redirect("/AddGestion");
}

}
