<?php

namespace App\Http\Controllers;

use App\Http\Libraries\TicTacToy;
use Illuminate\Http\Request;

use App\Http\Requests;

class TicTacToyController extends Controller
{
    public function index(Request $request)
    {
        $ttt = new TicTacToy();

        $matrix = [
            '11' => TicTacToy::PLAYER_1, '12' => '', '13' => '',
            '21' => '', '22' => 'X', '23' => '',
            '31' => '', '32' => '', '33' => 'X',
        ];

        $gameResult = $ttt->checkGame($matrix);

        $response = [
            'hasWinner' => ($gameResult == TicTacToy::PLAYER_1 || $gameResult == TicTacToy::PLAYER_2),
            'winner' => $gameResult,
        ];

        return json_encode($response);
    }
}
