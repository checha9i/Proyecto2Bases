<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Session;

use App\Http\Requests;
use Charts;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login(Request $req)
     {
      $username = $req->input('form-username');
      $password = $req->input('form-password');
      $date = new \DateTime();
      Session::put('USU', $req->input('form-username'));

      $checkLogin = DB::select('select * from usuario where nombre = :id and contrasenia = :contra ', [ 'id' => $username, 'contra' => $password]);



      if ( $checkLogin!=null) {
      $tipoUsuario= $checkLogin[0]->tipo_puesto_id_puesto;

	      if ($tipoUsuario==1) {


            	$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Ingreso Al sistema']);



	      	    return redirect('/Admin');

	      }else if ($tipoUsuario==2) {
  			return redirect('/Operador');
      // AQUÍ VA EL OPERARIOR


	      }else if ($tipoUsuario==3) {

  	return redirect('/UsuarioPrincipal');

	      }else {
      // AQUÍ VA EL CLIENTE
echo "<script type='text/javascript'>alert('Error no existe el usuario');</script>";
return redirect('/#sign-in');

	      }

  }
echo "<script type='text/javascript'>alert('Error  No existe el usuario');</script>";
  return redirect('/#sign-in');

  }

 public function end(Request $req){

 	Session::put('USU', $req->input(''));

 	return redirect('/END');

 }





  public function CrearFormulario(Request $req)
     {
       $date = new \DateTime();
      $NombreF = $req->input('NForm');
      if ($NombreF != null)
          {
			   Session::put('NumPreg', $req->input('Num'));
               DB::table('formulario')->insert(['NombreF'=>$NombreF,'fecha'=>$date]);

			   $Form = DB::select('select * from formulario order by id_examen DESC');
			   Session::put('IdForm', $Form[0]->id_examen);


			   $NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Crea el formulario']);


			   Session::put('NombreFormulario',$NombreF);
               return view('Questions/PrimeraPregunta');
        }else{
             //return redirect('/Operador');
            echo 'hola jeje';
        }

  }


 public function registrarop(Request $req)
     {
     	  $username = $req->input('first_name');
	      $lasname= $req->input('last_name');
	      $password = $req->input('password');
	      $email= $req->input('email');
	      $Salario= $req->input('Salario');
	      $pass1= $req->input('password_confirmation');
	      $date = new \DateTime();
	        if ($password==$pass1){

	      	 DB::table('usuario')->insert(['nombre'=>$username,'Apellido'=>$lasname,'contrasenia'=>$password,'email'=>$email,'salario'=>$Salario,
	      	      	'tipo_puesto_id_puesto'=>2]);


	        	DB::table('bitacora')->insert(['nombreUsu'=>$username,'fecha'=>$date,'detalle'=>'Crea el formulario']);

	      	     return redirect('/Login');

	          }else {

	          	 return redirect('/ERROR');
	          }


     }

public function eliminarOperadores(Request $req)
     {

     	$user4=DB::select('select * from usuario');


		return view('Auth/Eop',compact('user4'));

   	 }


     public function EliminarPreguntas(Request $req)
          {
          	$formu=DB::select('select * from formulario');

     		return view('Auth/SelFormEli',compact('formu'));
        	 }

           public function EliminarPregunta(Request $req,$id)
                {
                	$formu=DB::select('select * from pregunta p, formulario f where f.id_examen = :id', [ 'id' => $id]);

           		return view('Auth/EliminarPregunta',compact('formu'));
              	 }

     public function EliminarFormulario(Request $req)
          {
          	$date = new \DateTime();
          	$Formu=DB::select('select * from formulario');

          	 $NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Elimina Formulario']);

     		return view('Questions/BorrarFormulario',compact('Formu'));

        	 }


 public function destroy($id) {

 		$date = new \DateTime();

       $NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Eliminar Operadores ['.$id.']' ]);


      DB::delete('delete from usuario where id_usu = ?',[$id]) ;



      echo "Record deleted successfully.<br/>";
      echo '<a href="/Admin">Click Here</a> to go back.';
   }




 public function destroyF($id) {
   DB::delete('delete * from pregunta where id_examen = ? ',[$id]) ;
   DB::delete('delete from formulario where id_examen = ? ',[$id]) ;
        $date = new \DateTime();
      $NombreF=Session::get('USU');
	     DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Eliminó Pregunta ['.$id.']' ]);

      echo "Record deleted successfully.<br/>";
      echo '<a href="/Operador">Click Here</a> to go back.';
   }

   public function destroyP(Request $req,$id) {

     DB::delete('delete from respuestacliente where preguntaformulario_idpreguntaformulario= (select idpreguntaformulario from preguntaformulario where pregunta_idpregunta=:id ) ', ['id'=>$id]);
      DB::delete('delete  from preguntaformulario where pregunta_idpregunta = ?', [$id]);
          DB::delete('delete  from pregunta where idpregunta = ?', [$id]);
        $date = new \DateTime();
           $NombreF=Session::get('USU');
         DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Eliminó Pregunta ['.$id.']' ]);

        echo "Record deleted successfully.<br/>";
        echo '<a href="/Admin">Click Here</a> to go back.';
     }

 public function edit( Request $req,$id=null) {

  $editar = DB::table('usuario')-> where (['id_usu'=>$id])->get();

  $editar->nombre = $req->input('name');

  if ($editar->nombre != null)
  {
    echo 'update';
    // return redirect('/EliminarOp');
  }
  else
  {
    return View('Auth/EditarUsuario')->with('user', $editar);
  }


 }

  public function Reporte1(Request $req){

    $report=DB::select('select c.nombre, c.edad, fo.NombreF from formulario fo,cliente c, respuestacliente f,preguntaformulario p where c.cliente_id=f.cliente_cliente_id and c.edad<18 and f.preguntaformulario_idpreguntaformulario=p.idpreguntaformulario and fo.id_examen=p.formulario_id_examen ');


    return view('APrincipales/Reporte1',compact('report'));
  }

  public function Reporte2(Request $req)
           {

             $report=DB::select('select * from preguntas,');


         return view('APrincipales/Reporte2',compact('report'));

            }
            public function Reporte4(Request $req){

              $report=DB::select('select * from bitacora;');


              return view('APrincipales/Reporte4',compact('report'));
            }
            public function Reporte3(Request $req){



              return view('APrincipales/Reporte3');
            }

            public function Reporte5(Request $req){

              $report=DB::select('SELECT  c.nombre, count(*) as \'Formulario\' from cliente c, respuestacliente rc, preguntaformulario pf where rc.preguntaformulario_idpreguntaformulario=pf.idpreguntaformulario and c.cliente_id=rc.cliente_cliente_id group by c.nombre order BY count(*) DESC  limit 10');


                                  return view('APrincipales/Reporte5',compact('report'));
                                }



                                public function Reporte8(Request $req)
                                         {

                                           $report=DB::select('select * from formulario');


                                       return view('APrincipales/Reporte8',compact('report'));

                                          }




            public function Reporte6(Request $req){

              $report=DB::select('select c.nombre, f.NombreF from respuestacliente rc, preguntaformulario pf, cliente c, formulario f where rc.cliente_cliente_id=c.cliente_id and pf.idpreguntaformulario=rc.preguntaformulario_idpreguntaformulario group by nombre, NombreF');


              return view('APrincipales/Reporte6',compact('report'));
            }
            public function Reporte7(Request $req){

              $report=DB::select('select rc.Respuesta, p.pregunta, c.nombre from cliente c,respuestacliente rc, pregunta p, preguntaformulario pf where rc.preguntaformulario_idpreguntaformulario=pf.idpreguntaformulario and c.cliente_id=rc.cliente_cliente_id order by pregunta');

              return view('APrincipales/Reporte7',compact('report'));
            }



  public function AgregarPregunta(Request $req)
  {    $date = new \DateTime();
		$SelectTipoPregunta = $req->input('SelectTipoPregunta');
		if ($SelectTipoPregunta != null)
		{


			if ($SelectTipoPregunta == 'Directa')
			{
				Session::put('Reporte', 'r1');
				$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Agregó pregunta directa']);
				return view('Questions/CrearPregunta');
			}
			elseif ($SelectTipoPregunta == 'OpcionMul')
			{
				Session::put('Reporte', 'r2');
				$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Agregó pregunta Opcinal']);
				return view('Questions/CrearPregunta');
			}
			elseif ($SelectTipoPregunta == 'VF')
			{
				Session::put('Reporte', 'r3');
				$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Agregó pregunta falso verdadera']);
				return view('Questions/CrearPregunta');
			}
			elseif ($SelectTipoPregunta == 'Final')
			{
				Session::put('Reporte', 'r4');
				$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Agregó pregunta Final']);
				return view('Questions/CrearPregunta');
			}
		}
		else
		{
      echo 'jeje juajsujf uasjfuajsdufasd';
      //Session::put('Reporte', 'r5');
			//return view('Questions/CrearPregunta');
		}
	}



     public function AgregarPrimeraPregunta(Request $req)
        {    $date = new \DateTime();
			Session::put('ContadorPre', 1);
            $Formulario=Session::get('NombreFormulario');
             $Pregunta = $req->input('Pregunta');
             $Respuesta = $req->input('Respuesta');

             $Sig_Pregunta=$req->input('Buena');
             $Sig_Pregunta_Mala=$req->input('Mala');

		   if ($Sig_Pregunta > Session::get('NumPreg') || $Sig_Pregunta_Mala > Session::get('NumPreg'))
		   {
			   echo 'error se intenta acceder a una pregunta inexistente';
		   }
		   else
		   {
			   if ($Pregunta != null||$Respuesta != null||$Sig_Pregunta != null||$Sig_Pregunta_Mala != null)
               {
    $date = new \DateTime();
                DB::table('pregunta')->insert(['pregunta'=>$Pregunta,'respuesta'=>$Respuesta,'TipoPregunta'=>1,'SigPregunta'=>$Sig_Pregunta,'SigPregunta_Mala'=>$Sig_Pregunta_Mala]);

				$NombreF=Session::get('USU');
	      		DB::table('bitacora')->insert(['nombreUsu'=>$NombreF,'fecha'=>$date,'detalle'=>'Agregó primera pregunta']);

				$Preg = DB::select('select * from pregunta order by idpregunta DESC');

				DB::table('preguntaformulario')->insert(['numemro'=>Session::get('ContadorPre'),'formulario_id_examen'=>Session::get('IdForm'),'pregunta_idpregunta'=>$Preg[0]->idpregunta]);
                Session::put('ContadorPre', Session::get('ContadorPre') + 1);


				return view('Questions/CrearPregunta');
                }
				else
				{
                   echo 'error';
               }
		   }

        }


        public function GuardarPreguntaDina(Request $req) // 1-DIRECTA 2-OPCIONMULTIPLE 3-VERFALSO 4-FINAL
         {
			if ($req->input('TRB') > Session::get('NumPreg') || $req->input('TRM') > Session::get('NumPreg'))
		   {
			   echo 'error se intenta acceder a una pregunta inexistente';
		   }
		   else
		   {

			   if (SESSION::GET('Reporte')=='r1')
			   {
				 DB::table('pregunta')->insert(['pregunta'=>$req->input('TPregunta'),'respuesta'=>$req->input('TRespuesta'),'TipoPregunta'=>1,'SigPregunta'=>$req->input('TRB'),'SigPregunta_Mala'=>$req->input('TRM')]);
				 Session::put('Reporte', 'r5');




				 $Preg = DB::select('select * from pregunta order by idpregunta DESC');

				 DB::table('preguntaformulario')->insert(['numemro'=>Session::get('ContadorPre'),'formulario_id_examen'=>Session::get('IdForm'),'pregunta_idpregunta'=>$Preg[0]->idpregunta]);
                 Session::put('ContadorPre', Session::get('ContadorPre') + 1);

				 if (Session::get('NumPreg') == Session::get('ContadorPre'))
				   {
					   Session::put('Reporte', 'r4');
					  
				   }

				 return view('Questions/CrearPregunta');
			   }
			   else if (SESSION::GET('Reporte')=='r2')
			   {
				 DB::table('pregunta')->insert(['pregunta'=>$req->input('TPregunta'),'respuesta'=>$req->input('TRespuesta'),'TipoPregunta'=>2,'SigPregunta'=>$req->input('TRB'),'SigPregunta_Mala'=>$req->input('TRM'),'respuesta1'=>$req->input('Op1'), 'respuesta2'=>$req->input('Op2'),'respuesta3'=>$req->input('Op3'),'respuesta4'=>$req->input('Op4')]);
				  Session::put('Reporte', 'r5');

				  $Preg = DB::select('select * from pregunta order by idpregunta DESC');

				 DB::table('preguntaformulario')->insert(['numemro'=>Session::get('ContadorPre'),'formulario_id_examen'=>Session::get('IdForm'),'pregunta_idpregunta'=>$Preg[0]->idpregunta]);
                 Session::put('ContadorPre', Session::get('ContadorPre') + 1);

				  if (Session::get('NumPreg') == Session::get('ContadorPre'))
				   {
					   Session::put('Reporte', 'r4');
					  				   }

				  return view('Questions/CrearPregunta');
			   }
			   else if (SESSION::GET('Reporte')=='r3')
			   {
				 DB::table('pregunta')->insert(['pregunta'=>$req->input('TPregunta'),'respuesta'=>$req->input('TRespuesta'),'TipoPregunta'=>3,'SigPregunta'=>$req->input('TRB'),'SigPregunta_Mala'=>$req->input('TRM')]);
				 Session::put('Reporte', 'r5');


				 $Preg = DB::select('select * from pregunta order by idpregunta DESC');

				 DB::table('preguntaformulario')->insert(['numemro'=>Session::get('ContadorPre'),'formulario_id_examen'=>Session::get('IdForm'),'pregunta_idpregunta'=>$Preg[0]->idpregunta]);
                 Session::put('ContadorPre', Session::get('ContadorPre') + 1);

				 if (Session::get('NumPreg') == Session::get('ContadorPre'))
				   {
					   Session::put('Reporte', 'r4');

				   }

				 return view('Questions/CrearPregunta');
			   }
			   else if (SESSION::GET('Reporte')=='r4')
			   {

				 DB::table('pregunta')->insert(['pregunta'=>$req->input('TPregunta'),'TipoPregunta'=>4, 'SigPregunta'=>1,'SigPregunta_Mala'=>1]);
				  Session::put('Reporte', 'r5');

				  $Preg = DB::select('select * from pregunta order by idpregunta DESC');





				 DB::table('preguntaformulario')->insert(['numemro'=>Session::get('ContadorPre'),'formulario_id_examen'=>Session::get('IdForm'),'pregunta_idpregunta'=>$Preg[0]->idpregunta]);
                 Session::put('ContadorPre', Session::get('ContadorPre') + 1);


          if (Session::get('NumPreg') == Session::get('ContadorPre'))
				   {
					   Session::put('Reporte', 'r4');
				   }

         
				  return view('Questions/Operador');
			   }
			   else
			   {
				   Session::put('Reporte', 'r5');
					echo 'error';
			   }
		   }

         }


         	  public function registrar(Request $req)
         	  {
         			$Nombre = $req->input('name');
         			$Edad = $req->input('edad');
         			$Direccion = $req->input('dir');
         			$tel = $req->input('tel');
         			$corr = $req->input('corr');
         			$fo = $req->input('SelectForm');

         			if ($Nombre != null)
         			{
         				$data = array('nombre'=>$Nombre, 'edad'=>$Edad, 'direccion'=>$Direccion, 'telefono'=>$tel,
         				'correo_e'=>$corr,'estado'=>0);
         				DB::table('cliente')->insert($data);

         				$Clien = DB::select('select * from cliente order by cliente_id DESC');

         				Session::put('IdClient', $Clien[0]->cliente_id);




                $Form = DB::select('select * from formulario where id_examen = :nom', ['nom'=>$fo ]);
         				$exa = $Form[0]->id_examen;
         				Session::put('IdForm', $exa);

         				return redirect()->route('LeerPublicacion', ['id' => $Form[0]->id_examen]);

         			}
         			else
         			{
         				$Formularios = DB::select('select * from formulario');

         				return View('Auth/Register')->with('pregs',$Formularios);
         			}

         	  }

            	  public function Leer(Request $req, $id )
            	{

            		Session::put('IdForm', $id);
            		$Publicaciones = DB::select('select * from preguntaformulario where formulario_id_examen = :id order by numemro ASC', ['id'=>$id]);

            		$conteo = DB::select('select sum(sub1.Conteo) as Suma from (
            				select count(p.idpreguntaformulario) as Conteo
            				from preguntaformulario p
            				where p.formulario_id_examen = :id
            				)sub1', ['id'=>$id]);

            		Session::put('ConteoPreguntas', $conteo[0]->Suma);
            		
            		$Opcion = $req->input('SelectRespuesta');
            		if ($Opcion != null)
            		{
            			$Actual = Session::get('PreguntaActual');
            			$Actual = $Actual + 1;
            			Session::put('PreguntaActual', $Actual);

            			if ($Actual >= Session::get('ConteoPreguntas'))
            			{
            				$idsaber = DB::select('select * from preguntaformulario where formulario_id_examen = :id  and numemro = :num ;', ['id'=>Session::get('IdForm'), 'num'=>($Actual-1)]);

            				$data = array('Respuesta'=>$Opcion, 'cliente_cliente_id'=>Session::get('IdClient'),'preguntaformulario_idpreguntaformulario'=>$idsaber[0]->idpreguntaformulario);
            				DB::table('respuestacliente')->insert($data);

				DB::table('cliente')->where('cliente_id', Session::get('IdClient'))->update(['estado' => 1]);
            				
            				return view('/Questions/Operador');
            			}
            			else
            			{
            				$idsaber = DB::select('select * from preguntaformulario where formulario_id_examen = :id  and numemro = :num ;', ['id'=>Session::get('IdForm'), 'num'=>($Actual)]);

            				$data = array('Respuesta'=>$Opcion, 'cliente_cliente_id'=>Session::get('IdClient'),'preguntaformulario_idpreguntaformulario'=>$idsaber[0]->idpreguntaformulario);
            				DB::table('respuestacliente')->insert($data);

            				$verificacion = DB::select('select p.respuesta ,p.SigPregunta, p.SigPregunta_Mala
            									from pregunta p, respuestacliente rc, preguntaformulario pf
            									where rc.preguntaformulario_idpreguntaformulario = :id and rc.preguntaformulario_idpreguntaformulario = pf.idpreguntaformulario and pf.pregunta_idpregunta = p.idpregunta',
            									['id'=>$idsaber[0]->idpreguntaformulario]);

            				if ($verificacion[0]->respuesta == $Opcion)
            				{
            					$Actual = $verificacion[0]->SigPregunta - 1;
            				}
            				else
            				{
            					$Actual = $verificacion[0]->SigPregunta_Mala - 1;
            				}

            				$enun = DB::select('select * from pregunta where idpregunta = :pre', ['pre'=>$Publicaciones[$Actual]->pregunta_idpregunta]);
            				Session::put('Pregunta', $enun[0]->pregunta);
            				Session::put('TipPreg', $enun[0]->TipoPregunta);

            				$preguntas = DB::select('select * from pregunta where idpregunta = :pre', ['pre'=>$Publicaciones[$Actual]->pregunta_idpregunta]);

            				return View('Questions/LeerPublicacion')->with('pregs',$preguntas);
            			}
            		}
            		else
            		{
            				Session::put('PreguntaActual', 0);

            				$enun = DB::select('select * from pregunta where idpregunta = :pre', ['pre'=>$Publicaciones[0]->pregunta_idpregunta]);

            				Session::put('Pregunta', $enun[0]->pregunta);
            				Session::put('TipPreg', $enun[0]->TipoPregunta);

            				$preguntas = DB::select('select * from pregunta where idpregunta = :pre', ['pre'=>$Publicaciones[0]->pregunta_idpregunta]);

            				return View('Questions/LeerPublicacion')->with('pregs',$preguntas);
            		}
            	}


 public function grafica() {
        $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
                ->datasets([
                    [
                        "label" => "My First dataset",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [65, 59, 80, 81, 56, 55, 40],
                    ],
                    [
                        "label" => "My Second dataset",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [12, 33, 44, 44, 55, 23, 40],
                    ]
                ])
                ->options([]);

        return view('APrincipales/example', compact('chartjs'));

        }


public function chartjs()
{
    $viewer = View::select(DB::raw("SUM(numberofview) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("year(created_at)"))
        ->get()->toArray();
    $viewer = array_column($viewer, 'count');

    $click = Click::select(DB::raw("SUM(numberofclick) as count"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("year(created_at)"))
        ->get()->toArray();
    $click = array_column($click, 'count');


    return view('APrincipales/chartjs')
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
}





public function index()
    {
        $chart = Charts::multi('bar', 'material')
            // Setup the chart settings
            ->title("My Cool Chart")
            // A dimension of 0 means it will take 100% of the space
            ->dimensions(0, 400) // Width x Height
            // This defines a preset of colors already done:)
            ->template("material")
            // You could always set them manually
            // ->colors(['#2196F3', '#F44336', '#FFC107'])
            // Setup the diferent datasets (this is a multi chart)
            ->dataset('Element 1', [5,20,100])
            ->dataset('Element 2', [15,30,80])
            ->dataset('Element 3', [25,10,40])
            // Setup what the values mean
            ->labels(['One', 'Two', 'Three']);

        return view('test', ['chart' => $chart]);
    }


	 public function statistcs(){

	 	$data= DB::table('usuario')->get(['']);
	 	return view ('pages.statistics')->with('data',$data);
	 }
		

		

}
