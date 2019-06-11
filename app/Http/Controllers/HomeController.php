<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Models\Balance;

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
        $user = User::findOrFail(Auth::user()->id);

        return view('home', compact('user'));
    }

    public function create_balance()
    {
        if (Balance::where('user_id',Auth::user()->id)->first() != NULL) {
          return redirect('/home')->with('msg','Gagal! Anda sudah memiliki saldo');
        }

        $balance = new Balance;
        $balance->user_id = Auth::user()->id;
        $balance->cash = 0;
        $balance->point = 0;
        $balance->save();

        return redirect('/home');
    }
}
