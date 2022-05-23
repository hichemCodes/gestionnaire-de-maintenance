<?php

namespace App\Http\Controllers;

use App\Anomalie;
use App\Localisation;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Resource;
use App\User;
use Illuminate\Support\Facades\DB;


class ResponsableController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->where('role', 'responsable')->get();
        $resources = Resource::all();
        return view('responsable.resources',['resources' => $resources]);
    }

    public function addResource() {
        $resources = Resource::all();
        $localisations = Localisation::all();
        $responsables = User::where('role','responsable')->get();

        return view('responsable.addResource',
                    ['resources' => $resources,
                    'localisations' => $localisations,
                    'responsables' => $responsables
        ]);
    }

    public function storeResource(Request $request) {

        $lastResources = Resource::all()->sortByDesc("id");
        $newResource = new Resource();

        $newResource->desciption = $request['description'];
        $newResource->localisation_id = $request['localisation'];
        $newResource->responsable_id = $request['responsable'];
        if(count($lastResources) == 0) {
            $new_id = 1;
        } else {
            $new_id = intval($lastResources[0]->id) + 1;
        }

        $newResource->url = '/resources/rapport/'. $new_id ;


        $newResource->save();

        return redirect()->back();
    }

    public function indexAnomalies()
    {
        //$users = DB::table('users')->where('role', 'responsable')->get();
        $anomalies = Anomalie::all();

        return view('responsable.anomalies',['anomalies' => $anomalies]);
    }

    public function closeAnomalie($id) {
        $anomalie = Anomalie::find($id);

        $anomalie->is_closed = 1;

        $anomalie->save();

        return redirect('/responsable/anomalies');

    }

    public function displayRapport($id) {
        $anomalieRapport = Anomalie::where('id',$id)->get();
        return view('responsable.rapport',['anomalieRapport' => $anomalieRapport]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
