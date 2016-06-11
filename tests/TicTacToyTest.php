<?php

use App\Http\Libraries\TicTacToy;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicTacToyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $a11 = ''; $a12 = ''; $a13 = '';
        $a21 = ''; $a22 = ''; $a23 = '';
        $a31 = ''; $a32 = ''; $a33 = '';
        $matrix = [
            '11' => TicTacToy::PLAYER_1, '12' => '', '13' => '',
            '21' => '', '22' => 'X', '23' => '',
            '31' => '', '32' => '', '33' => 'o',
        ];

        $this->json('POST', '/', $matrix)
            ->seeJsonEquals([
                'hasWinner' => false,
                'winner' => false
            ]);
    }
}
