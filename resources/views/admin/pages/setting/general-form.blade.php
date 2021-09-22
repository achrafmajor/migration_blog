<div class="row">
    <div class="form-group col-6">
        {!! Form::label('site_name', "Nom") !!}
        {!! Form::text('site_name', app(GeneralSettings::class)->site_name, ['class' => 'form-control ', 'id' => 'site_name']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
    <div class="form-group col-6">
        {!! Form::label('phone', "Téléphone") !!}
        {!! Form::text('phone', app(GeneralSettings::class)->phone, ['class' => 'form-control ', 'id' => 'phone']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        {!! Form::label('client_count', "Nombre des clients") !!}
        {!! Form::number('client_count', app(GeneralSettings::class)->client_count, ['class' => 'form-control ', 'id' => 'client_count']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
    
    <div class="form-group col-6">
        {!! Form::label('projet_count', "Nombre des projects") !!}
        {!! Form::number('projet_count', app(GeneralSettings::class)->projet_count, ['class' => 'form-control ', 'id' => 'projet_count']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        {!! Form::label('partner_count', "Nombre des partenaire") !!}
        {!! Form::number('partner_count', app(GeneralSettings::class)->partner_count, ['class' => 'form-control ', 'id' => 'partner_count']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
    <div class="form-group col-6">
        {!! Form::label('country_count', "Nombre des pays") !!}
        {!! Form::number('country_count', app(GeneralSettings::class)->country_count, ['class' => 'form-control ', 'id' => 'country_count']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
</div>