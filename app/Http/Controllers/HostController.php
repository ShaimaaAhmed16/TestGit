<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HostController extends Controller
{
   public function index(Request $request){
       $host = $request->getHost();
       $port = $request->getPort();
      return view('host.index',compact('host','port'));
   }
}
