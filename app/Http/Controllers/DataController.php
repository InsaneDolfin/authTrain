<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data;
use Auth;

class DataController extends Controller
{
    public function afficher() {
      if (auth()->check()) {
        $id = Auth::user()->id;
        if ($id == 1) {
          $content = Data::get()->pluck('content');
          return $content;
        }
        /*
        else {
          $content = Data::where('user_id', $id)->get()->pluck('content');
          return $content;
        }
        */
        else {
          if (Auth::user()->partner == 'REVOL') {
            return "revol";
          }
          else if (Auth::user()->partner == 'CORNILLEAU') {
            return "cornilleau";
          }
        }
      }
      else { return "not logged in";}
    }
}
