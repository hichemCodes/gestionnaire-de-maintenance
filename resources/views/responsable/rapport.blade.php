@extends('layouts.app')

@section('title')
<title>Rapport d'anomalie | Gestionnaire de maintenance</title>
@endsection


@section('content')


<div class="container">


  <div class="card p-3">
    <div class="e-navlist e-navlist--active-bg">
    <div class="nav nav-tabs" id="myTab" role="tablist"></div>
        <ul class="nav nav-tabs add-mr-left" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active"  href="#" id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">
                    Rapport de l'anomalie : {{$anomalieRapport[0]->description}}
                </a>
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
                                <th class="max-width">Responsable</th>
                                <th class="max-width"> Fermée </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($anomalieRapport as $ano)
                            <tr>
                                <td>{{$ano->id}}</td>
                                <td class="align-middle">
                                <p>{{$ano->description}} </p>
                                </td>

                                <td class="text-nowrap align-middle">{{$ano->localisation->nom}}</td>
                                <td class="text-nowrap align-middle">{{$ano->resource->responsable->name}}</td>


                                <td class="text-nowrap align-middle">
                                @if ($ano->is_closed == 1)
                                    <span>oui</span>
                                @elseif ($ano->is_closed == 0)
                                   <span>non</span>
                                @endif
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
