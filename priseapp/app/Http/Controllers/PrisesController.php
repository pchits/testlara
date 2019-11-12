<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prise;

class PrisesController extends Controller
{
    //
    /**
     * Create new Prise
     *
     * @return View
     */
    public function store(Request $request)
    {
        Prise::create($request->all());
        return view('prises', ['prises' => Prise::all()]);
    }

    /**
     * Show prises in system
     *
     * @return View
     */
    public function show()
    {
        return view('prises', ['prises' => Prise::all()]);
    }
}
