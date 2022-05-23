@extends('layouts.app')

@section('title')
<title>HOME | Gestionnaire de maintenance</title>
@endsection

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
                            @if(count($resources) === 0)
                                   <p>aucune resource trouvée</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th class="max-width">Description</th>
                                            <th class="max-width">Localisation</th>

                                            <th class="max-width">Responsable de maintenance</th>


                                            <th class="max-width">
                                                Liste d'anomalies
                                            </th>
                                            <th class="max-width">
                                                code QR
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resources as $resource)

                                        <tr>


                                            <td class="text-nowrap align-middle"> {{$resource->desciption}}</td>
                                            <td class="text-nowrap align-middle"> {{$resource->localisation->nom}}</td>

                                            <td class="text-nowrap align-middle">{{$resource->responsable->name}}</td>


                                            <td class="text-center align-middle">

                                                @foreach($resource->anomalies as $anomalie)
                                                    <p>{{ $anomalie->nom }}</p>
                                                @endforeach



                                            </td>
                                            <td class="text-center align-middle">

                                                    <a href=" {{route('codeQrGuest',[$resource->id])}}">
                                                        <button type="button" class="btn btn-primary">
                                                             Code QR
                                                         </button>
                                                    </a>
                                            </td>




                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif

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


</div>




@endsection
