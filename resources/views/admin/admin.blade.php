@extends('layouts.app')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="e-tabs mb-3 px-3">
      <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" href="#">Résponsables</a></li>
      </ul>
    </div>

    <div class="row flex-lg-nowrap">
      <div class="col mb-3">
        <div class="e-panel card">
          <div class="card-body">

            <div class="e-table">
              <div class="table-responsive table-lg mt-3">
              @if(count($users) === 0)
                    <p>acun responsable trouvé</p>
              @else
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="align-top">
                        id
                      </th>
                      <th class="max-width">Nom</th>
                      <th class="max-width">Email</th>
                      <th class="sortable">Date de création</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($users as $user)
                    <tr>
                        <td class="align-middle">
                            <p>1</p>
                        </td>

                        <td class="text-nowrap align-middle">{{$user->name}}</td>
                        <td class="text-nowrap align-middle">{{$user->email}}</td>

                        <td class="text-nowrap align-middle"><span>{{$user->created_at}}</span></td>
                        <td class="text-center align-middle">
                            <form action="{{ route('delete-responsable',[$user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Supprimer">
                            </form>

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
      <div class="col-12 col-lg-3 mb-3">
        <div class="card">
          <div class="card-body">

              <div class="form-group">
                <label>Search by Name:</label>
                <div><input class="form-control w-100" type="text" placeholder="Name" value=""></div>
              </div>
              <hr class="my-3">
                    <div class="text-center px-xl-3">
                    <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#user-form-modal">New User</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- responsable Form Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer un responsable</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-1">
            <form method="POST" class="form" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Nom</label>
                          <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="John Smith" value="Test Test">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                      </div>



                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="user@example.com" name="email">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <div class="form-group">
                          <label>Mot de passe</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col mb-3">
                        <div class="form-group">
                          <label>Mot de passe confirmation</label>
                          <input type="password" class="form-control" id="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Créer</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
