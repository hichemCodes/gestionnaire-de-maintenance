@extends('layouts.app')

@section('title')
<title>Signaler Anomalie | Gestionnaire de maintenance</title>
@endsection

@section('content')

<link href="{{ asset('css/add-anomalie.css') }}" rel="stylesheet">



<div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" col-lg-6 col-md-8">
                <div class="card p-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="heading text-center">Signaler une anomalie</h2>
                        </div>
                    </div>
                    @guest
                        <form  action="{{ route('store-anomalie-guest',[$resource[0]->id]) }}" class="form-card" method="post">
                    @else
                        <form  action="{{ route('store-anomalie',[$resource[0]->id]) }}" class="form-card" method="post">
                    @endguest
                    @csrf
                        <div class="row justify-content-center form-group">

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" value="{{$resource[0]->desciption}}" name="descriptionR" readonly>
                                    <label>Description de la ressource</label>

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="localisation" value="{{$resource[0]->localisation->nom}}" readonly>
                                    <label name="localisation_id" value="{{$resource[0]->localisation->id}}">Localisation de la ressource</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group">

                                        <p>Liste d'anomalies déja saisées</p>

                                         <ul>
                                         @foreach($resource[0]->anomalies as $anomalie)
                                                <li>{{$anomalie->nom}}</li>
                                         @endforeach
                                         </ul>





                                    <br><br><br>

                                </div>
                            </div>
                        </div>



                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="nom">
                                    <label>Nom de l'anomalie</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="description">
                                    <label>Description de l'anomalie</label>
                                </div>
                            </div>
                        </div>




                        <div class="row justify-content-center">
                            <div class="col-md-12"> <input type="submit" value="Soummetre" class=" btn-pay placeicon">
                            </div>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection
