<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 28/11/2017
 * Time: 18:46
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        return response()->json(array(
            "servercode" => "200",
            "serverstatus" => "green",
            "team" => "redivide & conquer",
            "members" => array(
                "Jonas De Frère",
                "Ian Kerkhove"
            ),
            "request_at" => date("d-m-Y H:i:s")
        ), 200);
    }

    public function switch(Request $request, $number)
    {
        $data = $request->json()->all();

        switch ($number) {
            case 1:
                return JonasController::caesar($data);
            case 2:
                return null;
            case 3:
                return JonasController::palindrome($data);
            case 4:
                return IanController::longestmatching($data['strandA'], $data['strandB']);
            case 5:
                return IanController::gameoflife($data);
            case 6:
                return JonasController::digits($data);
            case 7:
                return IanController::morse($data);
            default:
                return response()->json(array("code" => 404, "message" => "Number $number not found."), 404);
        }
    }
}