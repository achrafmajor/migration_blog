@extends('login.index')
@section("content")
<form class="login-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">Récupération de mot de passe</h5>
                <span class="d-block text-muted">Nous vous enverrons des instructions par e-mail</span>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-right">
                <input type="email" name="email"class="form-control" placeholder="Email">
                <div class="form-control-feedback">
                    <i class="icon-mail5 text-muted"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
        </div>
    </div>
</form>

@endsection