<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function getComents(){
    	$query = "select * from mensajespublicos";
    	$res = DB::select( DB::raw("".$query));

    	$arrTotal = [];

    	$arrTmp = [];
		for ($i=1; $i <= count($res); $i++) { 
			
			array_push($arrTmp, $res[$i-1]);

			if($i % 3 == 0){
				array_push($arrTotal, $arrTmp);
				$arrTmp = [];
			}else if($i == count($res)){
				array_push($arrTotal, $arrTmp);
				$arrTmp = [];
			}
			
		}

    	return $arrTotal;
    }

    public function setComents(Request $request){
		
    	$id = DB::table('mensajespublicos')->insertGetId(
            [
                'nombre' => ''.$request->nombre,
                'idReserva' => ''.$request->idReserva,
                'mensaje' => ''.$request->mensaje,
                'fecha' => ''.DB::select( DB::raw('select NOW() fecha'))[0]->fecha,
                'hora' => ''.DB::select( DB::raw('select CURTIME() as hora'))[0]->hora,
                'estrellas' => intval(''.$request->estrellas),
            ]
        );

    	return $id;

    }


    // Reservaciones

        public function postReservacion(Request $request){
            //$data = $request->data;
            //return $data;
            return "Ingreso con éxito";
        }

    // End


    // DashboardTmp

    // inicioDash

    public function setInfoHotel(Request $request){
        
        $ih = $request->infHotel;

        $dat = DB::table('hotel')
            ->where('id', 1)
            ->update([
                'nombre' => ''.$ih["nombre"],
                'ubicacion' => ''.$ih["ubicacion"],
                'telefono' => ''.$ih["telefono"],
                'telefono2' => ''.$ih["telefono2"],
                'descripcion' => ''.$ih["descripcion"],
                'vision' => ''.$ih["vision"],
                'mision' => ''.$ih["mision"]
            ]);

        return "editado";

    }


    public function getInfoHotel(){
        
        $query = "
            select 
                nombre,
                ubicacion,
                telefono,
                telefono2,
                descripcion,
                vision,
                mision
            from hotel";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
    }


    // Controller habitaciones

    public function getHabitacionesTotales(){
        

        // Seleccionar habitaciones totales
        $query = "
            select * from habitacion
        ";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
    }

    public function updateHabitacion(Request $request){
            
            $campo = $request->colName;
            $col = "";

            if($campo == "Número"){
                $col = "numero";
            }else if($campo == "Tipo"){
                $col = "tipo";
            }else if($campo == "Descripción"){
                $col = "des";
            }else if($campo == "Extra"){
                $col = "extra";
            }else if($campo == "Camas"){
                $col = "camas";
            }else if($campo == "Precio"){
                $col = "precio";
            }else if($campo == "Tamaño"){
                $col = "tamanio";
            }


            DB::table('habitacion')
                ->where('id', $request->id)
                ->update([''.$col => ''.$request->nuevo]);

    }

    public function setEnHabitaciones(Request $request){

        if($request->valor == 1){
            DB::table('habitacion')
                ->where('id', $request->id)
                ->update(['en' => '1']);
        }else{
            DB::table('habitacion')
                ->where('id', $request->id)
                ->update(['en' => '0']);
        }

        return "cambio";
    }


    public function addHabitacion(Request $request){

       $id = DB::table('habitacion')->insertGetId(
            [
                'numero' => ''.$request->numero,
                'tipo' => ''.$request->tipo,
                'des' => ''.$request->des,
                'extra' => ''.$request->extra,
                'camas' => ''.$request->camas,
                'precio' => ''.$request->precio,
                'tamanio' => ''.$request->tamanio,
                'en' => 1,
                'id_hotel' => 1
            ]
        );

        return $id;

    }

    // Tours

    public function getToursTotales(){    

        // Seleccionar tours totales
        $query = "
            select * from tours
        ";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
    }

    public function addTour(Request $request){

        $data = $request->data;

        $id = DB::table('tours')->insertGetId(
            [
                'nombre' => ''.$data["nombre"],
                'tipo' => ''.$data["tipo"],
                'descripcion' => ''.$data["des"],
                'cupoMax' => ''.$data["cupoMax"],
                'fechaHoraSalida' => ''.$data["salida"],
                'fechaHoraRetorno' => ''.$data["retorno"],
                'imgTour' => ''.$data["imgTour"]
            ]
        );

        return $id;

    }

    public function getOneTour(Request $request){
        // Seleccionar tours totales
        $query = "
            select * from tours where id = ".$request->id."
        ";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
    }

    public function updateTour(Request $request){
        
        $ih = $request->data;

        $dat = DB::table('tours')
            ->where('id', $ih["id"])
            ->update([
                'nombre' => ''.$ih["nombre"],
                'tipo' => ''.$ih["tipo"],
                'descripcion' => ''.$ih["descripcion"],
                'cupoMax' => ''.$ih["cupoMax"],
                'fechaHoraSalida' => ''.$ih["fechaHoraSalida"],
                'fechaHoraRetorno' => ''.$ih["fechaHoraRetorno"],
                'imgTour' => ''.$ih["imgTour"]
            ]);

        // Seleccionar tours totales
        $query = "
            select * from tours
        ";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
        

    }

    public function delTour(Request $request){

        $d = DB::table('tours')->where('id', '=', $request->id)->delete();

        // Seleccionar tours totales
        $query = "
            select * from tours
        ";
            
        $res = DB::select( DB::raw("".$query));

        return $res;
        
    
    }


}
