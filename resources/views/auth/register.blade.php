@extends('layouts.app')

@section('title')
<title>S'inscrire | Gestionnaire de maintenance</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 custum-container-login">
            <div class="card">
                <div class="card-header">S'inscrire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group column">
                            <label for="name" id="lb-name" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column ">
                            <label id="lb-email" for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="password" id="lb-pass" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="password-confirm"  id="lb-pass2" class="col-md-4 col-form-label text-md-right">Confirmation </label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 cancel-md-4">
                                <button type="submit" class="btn btn-primary">
                                    S'inscrire
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
