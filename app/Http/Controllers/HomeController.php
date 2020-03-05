<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Movement;

class HomeController extends Controller {
    public function home() {
        $array = [];

        # $movements = Movement::all();
        $movements = Movement::where('user_id', '1')->get();

        $negativo = 0;
        $positivo = 0;

        foreach($movements as $move) {

            # adiconando valor negativo
            if($move->type_movement > 1) {
                $negativo += $move->money_quantity;
            }

            # adiconando valor positivo
            if($move->type_movement == 1) {
                $positivo += $move->money_quantity;
            }
        }

        $total = $positivo - $negativo;

        $array = [
            'total' => number_format((float)$total, 2, '.', '.'),
            'negativo' => number_format((float)$negativo, 2, '.', '.'),
            'positivo' => number_format((float)$positivo, 2, '.', '.'),
            'movements'=>$movements
        ];

        return view('home', $array);
    }

    public function addMovement(Request $req) {
        if($req->has('type_movement')) {
            $type_movement = $req->input('type_movement');
            $money_quantity = $req->input('money_quantity');
            $description = $req->input('description');
            $user_id = 1;
            $user_logged = 1;

            $movement = new Movement();

            $movement->user_id = $user_id;
            $movement->user_logged = $user_logged;
            $movement->type_movement = $type_movement;
            $movement->money_quantity = $money_quantity;
            $movement->description = $description;
            $movement->save();

        } 
        return redirect('/');        
    }

    function delete($id) {
        $movement = Movement::find($id);
        $movement->delete();
        return redirect('/');  
    }
}