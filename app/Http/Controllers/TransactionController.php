<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Models\Balance;
use App\Models\History;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = User::all();

      return view('transaction.index', compact('user'));
    }

    public function transfer(Request $request)
    {
      $sender = Balance::where('user_id',Auth::user()->id)->first();
      $receiver = Balance::where('user_id',$request->receiver)->first();

      if ($sender->cash < $request->value) {
        return redirect('/transaction')->with('msg','Cash Anda Tidak Cukup');
      }

      $sender->cash = $sender->cash - $request->value - ($request->value*0.002);
      $sender->point = $sender->point + ($request->value*0.02);
      $sender->save();

      $receiver->cash = $receiver->cash + $request->value;
      $receiver->save();

      $history = new History;
      $history->type_history = 1;
      $history->from = Auth::user()->id;
      $history->to   = $request->receiver;
      $history->value = $request->value;
      $history->save();

      $value       = $request->value;
      $biaya_admin = $request->value*0.002;
      $get_point   = $request->value*0.02;

      return view('transaction.show', compact('value','biaya_admin','get_point'));
    }

    public function topup(Request $request)
    {
      $user = Balance::where('user_id',Auth::user()->id)->first();

      $user->cash = $user->cash + $request->value;
      $user->save();

      return redirect('/home');
    }
}
