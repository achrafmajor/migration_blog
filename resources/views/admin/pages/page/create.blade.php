@extends('admin.layout.app')


@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-office mr-2"></i> <span class="font-weight-semibold">Page</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
      
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'page.store', 'method' => 'post', 'id' => 'data', 'enctype' => 'multipart/form-data', 'class' => 'form-validate-jquery', 'data-redirect' => route('page.index')]) !!}
            @include('admin.pages.page.fields' , ['action' => 'create'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection()

@section('js')
    <script src="{{ URL::asset('assets/js/pages/pages.js') }}"></script>
@endSection

