<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $client = DB::table('clients')->get();

        $data = "";
        foreach ($client as $val) {
            $data .= "['" . $val->created_at . "'," . $val->nameCLI . "]";
        }

        return view('home', compact('data'));
    }
}