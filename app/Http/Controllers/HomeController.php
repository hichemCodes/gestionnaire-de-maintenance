<?php

namespace App\Http\Controllers;

use App\Anomalie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Resource;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('generateQR','addAnomalie','saveAnomalie');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role === "admin") {
            return redirect('/admin');
        } else if(Auth::user()->role === "responsable") {
            return redirect('/responsable/resources');
        } else if(Auth::user()->role === "user") {
            return redirect('/');
        } else {
            return view('home');
        }

    }

    public function generateQR($id) {
        $resource = Resource::where('id',$id)->get();

        $url = substr(url()->current(),0,strlen(url()->current()) - 8 );

        return view('codeQr',['resource' => $resource,'url'=>$url]);
    }

    public function addAnomalie($id) {
        $resource = Resource::where('id',$id)->get();
        return view('addAnomalie',['resource' => $resource]);
    }

    public function saveAnomalie(Request $request,$id) {
           $resource = Resource::where('id',$id)->get();
           $newAnomalie = new Anomalie();

           $newAnomalie->nom = $request['nom'];
           $newAnomalie->description = $request['description'];
           $newAnomalie->localisation_id = $resource[0]->localisation->id;
           $newAnomalie->resource_id = $resource[0]->id;

           $newAnomalie->save();

           return redirect()->back();

    }


}
