<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Game;

class ConversionTest extends TestCase
{
    /**
     * A basic unit test conversion.
     *
     * @return void
     */
    public function testConversion()
    {
        $coef = 5;
        $game = new Game();
        $game->prise_type = 'money';
        $game->prise_value = 10;
        $game->convert_to_mana($coef);

        $this->assertTrue(($game->prise_value == (10 * $coef)) && ($game->prise_type == 'mana'));
    }
}
