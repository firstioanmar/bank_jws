<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\History;
use App\Models\User;

class HistoryController extends Controller
{
    public function index()
    {
      $history = History::orderBy('created_at','desc')->paginate(4);
      $user    = User::all();

      return view('history.index',compact('history','user'));
    }
}
