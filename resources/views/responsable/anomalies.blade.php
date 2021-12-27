@extends('layouts.app')

@section('content')

<div class="container">


  <div class="card p-3">
    <div class="e-navlist e-navlist--active-bg">
    <div class="nav nav-tabs" id="myTab" role="tablist"></div>
        <ul class="nav nav-tabs add-mr-left" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link"  href="{{ route('resources') }}" id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Ressources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active "  id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">Anomalies</a>
            </li>
        </ul>




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

                                <th class="max-width"> Fermée </th>
                                <th class="max-width">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anomalies as $anomalie)
                            <tr>
                                <td>{{$anomalie->id}}</td>
                                <td class="align-middle">
                                <p>{{$anomalie->description}} </p>
                                </td>

                                <td class="text-nowrap align-middle">{{$anomalie->localisation->nom}}</td>


                                <td class="text-nowrap align-middle">
                                @if ($anomalie->is_closed = 1)
                                    <span>oui</span>
                                @elseif ($finance->is_closed = 0)
                                   <span>non</span>
                                @endif
                                </td>
                                <td class="text-center align-middle">
                                <div class="col d-flex flex-column  justify-content-end">

                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#user-form-modal">

                                        <a href=" {{route('rapport',[$anomalie->resource->id])}}">Plus d'informations</a>

                                     </button>

                                    <button class="btn btn-danger mt-2" type="button" data-toggle="modal" data-target="#user-form-modal">Fermer</button>
                                </div>
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

    <!-- User Form Modal1 -->
    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal1">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">CodeQR</h5>
            <button type="button" class="close" data-dismiss="modal1">
               <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-1">
              <form class="form" novalidate="">
                <div class="row">

                <div class="text-center">
                  <img src="/img/qr.png" class="rounded img-qr" alt="CodeQR">
                  <p>"Flashez-moi pour rapporter un problème"</p>
                </div>

                </div>
                <div class="row">
                  <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Imprimer CodeQR</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>


@endsection
