<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;


/**
 * Class RatesController.
 */
class RatesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.rates');
    }

}
