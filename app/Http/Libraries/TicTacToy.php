<?php

namespace App\Http\Libraries;

class TicTacToy
{
    /**
     * @var int Matix Size (N x N)
     */
    private $n = 3;

    const PLAYER_1 = 'X';
    const PLAYER_2 = 'O';

    /**
     * Get the size of the array
     *
     * @param array
     * @return float|int
     */
    public function getN($matrix = null)
    {
        if (is_array($matrix))
        {
            return sqrt(count($matrix));
        }
        else
        {
            return $this->n;
        }
    }

    /**
     * @param int $n
     */
    public function setN($n)
    {
        $this->n = $n;
    } 
    
    public function getMatrix($n = 3)
    {
        for ($i = 1; $i < ($n+1); $i++)
        {
            for ($j = 1; $j < ($n + 1); $j++)
            {
                $matrix[$i.$j] = $i . $j;
            }
        }

        return $matrix;
    }

    public function checkGame($arrMatrix)
    {
        $matrix = array_map('strtoupper', $arrMatrix);

        $n = $this->getN($matrix);//Matrix Size

        //Player 01
        $p1D = 0;// Player 01 - Diagonal
        $p1AD = 0;// Player 01 - Ant Diagonal
        $p1H = array_fill(1,$n,0);// Player 01 - Horizontal ($n lines)
        $p1V = array_fill(1,$n,0);// Player 01 - Vertical ($n lines)

        //Player 02
        $p2D = 0;// Player 02 - Diagonal
        $p2AD = 0;// Player 02 - Ant Diagonal
        $p2H = array_fill(1,$n,0);// Player 02 - Horizontal
        $p2V = array_fill(1,$n,0);// Player 02 - Vertical

        //Loop on each row
        for ($i = 1; $i < ($n+1); $i++)
        {
            //Loop on each column
            for ($j = 1; $j < ($n+1); $j++)
            {
                //Testing Diagonal
                if ($i == $j)
                {
                    if ($matrix[$i.$j] == self::PLAYER_1)
                        $p1D++;

                    if ($p1D == $n)
                        return self::PLAYER_1;

                    if ($matrix[$i.$j] == self::PLAYER_2)
                        $p2D++;

                    if ($p2D == $n)
                        return self::PLAYER_2;
                }

                //Testing Anti Diagonal
                if (($i+$j) == ($n+1))
                {
                    if ($matrix[$i.$j] == self::PLAYER_1)
                        $p1AD++;

                    if ($p1AD == $n)
                        return self::PLAYER_1;

                    if ($matrix[$i.$j] == self::PLAYER_2)
                        $p2AD++;

                    if ($p2AD == $n)
                        return self::PLAYER_2;
                }

                if ($matrix[$i.$j] == self::PLAYER_1)
                {
                    $p1H[$i]++; //Testing Horizontal Lines for player 1
                    $p1V[$j]++; //Testing Vertical Lines for player 1
                }

                if ($p1H[$i] == $n || $p1V[$j] == $n)
                    return self::PLAYER_1;

                if ($matrix[$i.$j] == self::PLAYER_2)
                {
                    $p2H[$i]++; //Testing Horizontal Lines for player 2
                    $p2V[$j]++; //Testing Vertical Lines for player 2
                }

                if ($p2H[$i] == $n || $p2V[$j] == $n)
                    return self::PLAYER_2;
            }
        }

        return false;
    }
}