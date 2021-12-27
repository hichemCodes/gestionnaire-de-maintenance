@extends('layouts.app')

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
        </ul>


      <!--div class="row flex-lg-nowrap"!-->
      <div class="nav nav-tabs" id="myTab" role="tablist" ></div>
       <div class="col mb-3">
          <div class="e-panel card">
            <div class="card-body">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="e-table">
                <div class="table-responsive table-lg mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="align-top"> Id </th>
                      <th class="max-width">Description</th>
                      <th class="max-width">Localisation</th>
                      <th class="max-width">Responsable de maintence</th>
                      <th class="max-width"> Liste d'anomalie </th>
                      <th class="max-width"> Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @foreach($resources as $resource)
                    <tr>
                      <td>{{$resource->id}}</td>
                      <td class="align-middle">
                        <p>{{$resource->desciption}}  </p>
                      </td>

                      <td class="text-nowrap align-middle">{{$resource->localisation->nom}}</td>
                      <td class="text-nowrap align-middle">{{$resource->responsable->name}}</td>

                      <td class="text-nowrap align-middle"><span>
                        <div class="col d-flex justify-content-center">
                          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#user-form-modal1">

                                <a href=" {{route('rapport',[$resource->id])}}">afficher le rapport d’anomalie.</a>
                          </button>
                        </div>
                      </span></td>
                      <td class="text-center align-middle">
                        <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fas fa-trash-alt"></i></button>
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


        </div>


        </div>


      </div>


    </div>
  </div>
  </div>




@endsection
