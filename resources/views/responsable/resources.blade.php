@extends('layouts.app')

@section('title')
<title>Resources | Gestionnaire de maintenance</title>
@endsection

@section('content')

<div class="container">


  <div class="card p-3">
    <div class="e-navlist e-navlist--active-bg">
    <div class="nav nav-tabs" id="myTab" role="tablist"></div>
        <ul class="nav nav-tabs add-mr-left" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active"   id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Ressources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('anomalies') }}"  id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Anomalies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add-resource') }}"  id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Ajouter une resource</a>
            </li>
        </ul>


      <!--div class="row flex-lg-nowrap"!-->
      <div class="nav nav-tabs" id="myTab" role="tablist" ></div>
       <div class="col mb-3">
          <div class="e-panel card">
            <div class="card-body">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="e-table">
                <div class="table-responsive table-lg mt-3">
                @if(count($resources) === 0)
                    <p>Aucune resource trouvée</p>
                @else
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="align-top"> Id </th>
                      <th class="max-width">Description</th>
                      <th class="max-width">Localisation</th>
                      <th class="max-width">Responsable de maintence</th>
                      <th class="max-width"> Liste d'anomalie </th>
                      <th class="max-width"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($resources as $resource)
                    <tr>
                      <td><p>{{$resource->id}}</p></td>
                      <td class="align-middle">
                        <p>{{$resource->desciption}}  </p>
                      </td>

                      <td class="text-nowrap align-middle">{{$resource->localisation->nom}}</td>
                      <td class="text-nowrap align-middle">{{$resource->responsable->name}}</td>

                      <td class="text-center align-middle">
                                @foreach($resource->anomalies as $anomalie)
                                    <p>{{ $anomalie->nom }}</p>
                                @endforeach
                      </td>
                      <td class="text-center align-middle">
                      <a href=" {{route('codeQr',[$resource->id])}}">
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
