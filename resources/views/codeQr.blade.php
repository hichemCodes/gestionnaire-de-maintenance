@extends('layouts.app')

@section('title')
<title>Code QR | Gestionnaire de maintenance</title>
@endsection

@section('content')

<div class="container">


  <div class="card p-3">
    <div class="e-navlist e-navlist--active-bg">
    <div class="nav nav-tabs" id="myTab" role="tablist"></div>
        <ul class="nav nav-tabs add-mr-left" id="myTab" role="tablist">

            <li class="nav-item">
                <span class="nav-link active"  href="#" id="profile-tab"  role="tab" aria-controls="profile" aria-selected="false">
                    Code Qr pour la resource  : {{$resource[0]->desciption}}
                </span>
            </li>

        </ul>
        <div class="col mb-3">
          <div class="e-panel card">
            <div class="card-body">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="e-table">
                <div class="table-responsive table-lg mt-3 racine-qr">


                        <div class="round-qr " id="qrcode">

                        </div>
                        <span class="flash-me mt-4 mb-2">
                            Flashez-moi pour rapporter un problème
                        </span>
                        @if(  (Auth::user() == null ) || (Auth::user()->role  === 'user')   )
                           <a href=" {{route('add-anomalie-guest',[$resource[0]->id])}}"> Ou bien cliquez sur ce lien</a>
                           <span id="url" class="{{route('add-anomalie-guest',[$resource[0]->id])}}"></span>

                        @else
                            <a href=" {{route('add-anomalie',[$resource[0]->id])}}"> Ou bien cliquez sur ce lien</a>
                            <span id="url" class="{{route('add-anomalie',[$resource[0]->id])}}"></span>
                        @endguest

                       <button class="btn btn-primary hidden-print" onclick="imprimerQR()">
                             <span class="glyphicon glyphicon-print" aria-hidden="true">

                             </span>
                             Imprimer
                        </button>
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

@section('script')
<script>



var qrcode = new QRCode("qrcode");

var url = document.querySelector('#url').className;


qrcode.makeCode(url);


function imprimerQR() {
    window.print();
}

</script>


@endsection
