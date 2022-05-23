@extends('layouts.app')

@section('title')
<title>Ajouter une resource | Gestionnaire de maintenance</title>
@endsection

@section('content')

<link href="{{ asset('css/add-anomalie.css') }}" rel="stylesheet">



<div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" col-lg-6 col-md-8">
                <div class="card p-3">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="heading text-center">Ajouter une resource</h2>
                        </div>
                    </div>

                    <form  action="{{ route('store-resource') }}" class="form-card" method="post">
                    @csrf
                        <div class="row justify-content-center form-group">

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="description">
                                    <label>Description de la ressource</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="localisation" class="form-control" id="">
                                        <option selected>Sélectionner une localisation</option>
                                        @foreach($localisations as $localisation)
                                               <option value="{{ $localisation->id }}">{{ $localisation->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="responsable" class="form-control" id="">
                                        <option selected>Sélectionner un responsable pour la maintenance</option>
                                        @foreach($responsables as $responsable)
                                               <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                                        @endforeach
                                    </select>
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
