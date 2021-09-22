@extends('admin.layout.app')

@section('page-header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-office mr-2"></i> <span class="font-weight-semibold">Modifié Les Données</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($data, ['route' => ['service.update', $data->id], 'id' => 'data', 'enctype' => 'multipart/form-data', 'class' => 'form-validate-jquery', 'data-redirect' => route('service.index')]) !!}
            {{ method_field('PATCH') }}
            @include('admin.pages.service.fields' , ['action' => 'edit'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection()
@section('js')
    <script src="{{ URL::asset('assets/js/pages/service.js') }}"></script>
@endSection
