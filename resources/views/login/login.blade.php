@extends('admin.login.index')
@section("content")
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">Connectez-vous</h5>
                <span class="d-block text-muted">
                    Entrez vos identifiants ci-dessous</span>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" class="form-control" name="email" placeholder="Email">
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" class="form-control" name="password" placeholder="Mot de Pass">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">S'identifier</button>
            </div>

            <div class="text-center">
                <a href="{{ route('password.request') }}">Mot de passe oublié?
                </a>
            </div>
        </div>
    </div>
</form>

@endsection