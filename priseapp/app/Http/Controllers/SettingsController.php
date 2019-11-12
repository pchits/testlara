<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    //
    /**
     * Update Settings or create new if it's missing
     *
     * @return View
     */
    public function store(Request $request)
    {
        //there could be only one
        $settings = Settings::find(1);
        if ($settings === NULL) {//if someone forget about seeding
            $settings = new Settings;
        }

        $settings->money_max = $request->money_max;
        $settings->money_min = $request->money_min;
        $settings->money_limit = $request->money_limit;
        $settings->mana_min = $request->mana_min;
        $settings->mana_max = $request->mana_max;
        $settings->conversion_coef = $request->conversion_coef;
        $settings->save();

        return view('settings', ['settings' => $settings]);
    }

    /**
     * Show prises in system
     *
     * @return View
     */
    public function show()
    {
        $settings = Settings::find(1);
        
        return view('settings', ['settings' => $settings]);
    }
}
