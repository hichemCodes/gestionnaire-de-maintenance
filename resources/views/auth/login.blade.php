@extends('layouts.app')

@section('title')
<title>Se Connecter | Gestionnaire de maintenance</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center custum-log-form">
        <div class="col-md-8 custum-container-login">
            <div class="card">
                <div class="card-header">Se connecter</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group column ">
                            <label id="lb-email" for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group column">
                            <label for="password" id="lb-pass" class="col-md-4 col-form-label text-md-right">Mot de passe </label>

                            <div class="col-md-6 cancel-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="forget-pass">
                            @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                             Mot de passe oublié
                                         </a>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 calcel-offset">
                                <button type="submit" class="btn btn-primary log-btn">
                                    Connecter
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
