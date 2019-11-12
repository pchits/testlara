<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Settings;
use App\Game;
use App\User;

class GamesController extends Controller
{
    //
    /**
     * Create new Prise
     *
     * @return Redirect
     */
    public function generate(Request $request)
    {
        //get settings
        $settings = $settings = Settings::findOrFail(1);
        //generate game results
        $game = new Game;
        $game->generate(
            [$settings->money_min, $settings->money_max],
            [$settings->mana_min, $settings->mana_max],
            $settings->money_limit
        );

        session(['game' => $game]);
        return redirect('games/new');
    }

    /**
     * Create new Prise
     *
     * @return Redirect
     */
    public function save(Request $request)
    {
        $current_game = session('game');
        $current_game->save();
        session(['game' => null]);
        
        return redirect('games/new');
    }

    /**
     * Create new Prise
     *
     * @return Redirect
     */
    public function convert(Request $request)
    {
        //get settings
        $settings = $settings = Settings::findOrFail(1);

        $current_game = session('game');
        $current_game->convert_to_mana($settings->conversion_coef);
        
        $current_game->save();

        // $id = Auth::user()->id;
        // $user = User::find($id);
        // $user->add_mana($current_game->prise_value);
        // $user->save();

        session(['game' => null]);
        return redirect('games/new');
    }

    /**
     * Show prises in system
     *
     * @return View
     */
    public function new()
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        $your_mana = $user->mana;

        $current_prise = NULL;
        $current_game = session('game');
        if ($current_game) {
            if ($current_game->prise_id) {
                $current_prise = $current_game->prise()->first()->name;
            }
        }
        return view('newgame', ['current_game' => $current_game, 'current_prise' => $current_prise, 'your_mana' => $your_mana]);
    }

    /**
     * Show prises in system
     *
     * @return View
     */
    public function show()
    {
        return view('games', ['games' => Game::with('user')->with('Prise')->get()]);
    }
}
