@extends('admin.layout.app')
@section('page-header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-users mr-2"></i> <span class="font-weight-semibold">Partner</span></h4>
            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="multi-select-toolbar" style="display: none">
                <button data-route="{{ route('partner.index') }}" id="delete_selected_rows" class="btn btn-outline-danger mx-1">
                    <i class="far fa-trash-alt mg-x-1"></i> Supprimer
                </button>
            </div>
            <Button id="refreshBtn" class="btn btn-outline-primary mx-1"> <i class="fas fa-redo mr-2"></i>
                Actualiser</Button>
            <a href="{{ route('partner.create') }}" class="btn btn-outline-primary  mx-1"> <i class="icon-add mr-2">
                </i>
                Ajouter</a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
        </div>
        <table id="partner-table" class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>name</th>
                    <th>lien</th>
                    <th>Crée Le</th>
                    <th>###</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('assets/js/pages/partner.js') }}"></script>
<script src="{{ URL::asset('assets/js/databtales.js') }}"></script>
@endSection
