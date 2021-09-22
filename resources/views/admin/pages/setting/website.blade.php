<div class="form-group">
    {!! Form::label('scripte', 'Script') !!}
    {!! Form::textarea('scripte', app(GeneralSettings::class)->scripte, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'scripte']); !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('google_maps', 'Google maps') !!}
    {!! Form::textarea('google_maps', app(GeneralSettings::class)->google_maps, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'google_maps']); !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('recapachekey', 'reCAPTCHA key') !!}
    {!! Form::text('recapachekey', app(GeneralSettings::class)->recapachekey, ['class' => 'form-control ', 'id' => 'recapachekey']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('recapachesitekey', 'reCAPTCHA Site key') !!}
    {!! Form::text('recapachesitekey', app(GeneralSettings::class)->recapachesitekey, ['class' => 'form-control ', 'id' => 'recapachesitekey']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('google_analytics', 'Google analytics UID*') !!}
    {!! Form::text('google_analytics', app(GeneralSettings::class)->google_analytics, ['class' => 'form-control ', 'id' => 'google_analytics']) !!}
    <div class="form-control-feedback">
    </div>
</div>