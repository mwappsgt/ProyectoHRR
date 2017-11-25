<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PHPController extends Controller
{
    public function verDisponibilidad(Request $request){
        $fechapin = date("Y-m-d", strtotime("".$request->fechaIn));
        $fechapout = date("Y-m-d", strtotime("".$request->fechaOut));
        $hab = [];

        $query = "
                    SELECT h.numero as numero,arh.fechain as fin,arh.fechaout as fout FROM arh
                    INNER JOIN habitacion h on h.id = arh.id_habitacion
                    INNER JOIN reservacion r on r.id = arh.id_reservacion
                    WHERE h.tipo like '".$request->tipo."'
                  ";

        $tab = DB::select( DB::raw("".$query));
        $str = "";

        for ($j = 0; $j < count($tab); $j++) {
            $contg = 0;
            for ($i = $tab[$j]->fin; $i <= $tab[$j]->fout; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                $str .= "Habitación: ".$tab[$j]->numero."<br>";
                $cont = 0;
                for ($k = $fechapin; $k <= $fechapout; $k = date("Y-m-d", strtotime($k . "+ 1 days"))) {
                    $str .= $i . "=".$k."<br>";
                    if($i == $k){
                        $cont++;
                    }
                }
                $contg += $cont;
                $str .= "cont: ".$cont."<br>";
                $str .= "<br/>";
            }
            $str .= "ContGeneral: ".$contg;
            if($contg<=1){
                array_push($hab,intval($tab[$j]->numero));
            }
            $str .= "<br/>";
            $str .= "<br/>";
            $str .= "<br/>";
        }

        $query = "
                    SELECT h.numero as numero FROM arh
                    RIGHT JOIN habitacion h on h.id = arh.id_habitacion
                    WHERE arh.id is null AND h.tipo like '".$request->tipo."'
                  ";

        $tab = DB::select(DB::raw("" . $query));
  

        for ($i=0;$i<count($tab);$i++){
            array_push($hab,intval($tab[$i]->numero));
        }

        $hab = collect($hab)->sort()->values()->all();
        $habFinal = [];
        foreach ($hab as $i=>$h){
            array_push($habFinal,[
                "num" => $h,
                "disp" => true,
                "selected" => false
            ]);
        }

        return $habFinal;
    }


    //----- v:archivos ---------


    public function addFiles(Request $request){
        if($request->file('archivo') != "") {
            $file = $request->file('archivo');
            $nombre = $file->getClientOriginalName();
            
            $id_arc = DB::table('archivospagos')->insertGetId(
                [
                    'nombre' => "".$nombre,
                    'url' => "",
                    //'id_reservacion' => intval($request->idTicket)
                    'id_reservacion' => 1
                ]
            );

            DB::table('archivospagos')
                ->where('id', $id_arc)
                ->update(['url' => ''.$id_arc.'_'.$nombre]);

            \Storage::disk('local')->put(''.$id_arc.'_'.$nombre,  \File::get($file));

            $query = "
                    select * 
                    from archivospagos            
            ";

            $tab = DB::select(DB::raw("" . $query));

            return $tab;
        }else{
            return 0;
        }
    }


    //--------------------------


}
