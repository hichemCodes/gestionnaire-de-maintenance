@extends('layouts.app')

@section('content')

<div class="container">

<div class="card  p-3">

<div class="row flex-lg-nowrap">
    <div class="col">
        <div class="e-tabs adapte-mr-l-home">
        <ul class="nav nav-tabs add-mr-left" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"   id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Ressources</a>
            </li>

        </ul>

        </div>

        <div class="row flex-lg-nowrap">
            <div class="col mb-3">
                <div class="e-panel card">
                    <div class="card-body">

                        <div class="e-table">
                            <div class="table-responsive table-lg mt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th class="max-width">Description</th>
                                            <th class="max-width">Localisation</th>

                                            <th class="max-width">Responsable de maintenance</th>


                                            <th class="max-width">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resources as $resource)

                                        <tr>


                                            <td class="text-nowrap align-middle"> {{$resource->desciption}}</td>
                                            <td class="text-nowrap align-middle"> {{$resource->localisation->nom}}</td>

                                            <td class="text-nowrap align-middle">{{$resource->responsable->nom}}</td>


                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-primary">Code QR</button>
                                                <button type="button" class="btn btn-primary">
                                                    Rapport d'anomalies
                                                </button>

                                            </td>



                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-3">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Rechercher par nom:</label>
                            <div><input class="form-control w-100" type="text" value="">
                            </div>
                        </div>
                        <div class="text-center px-xl-3">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</div>


</div>




@endsection
