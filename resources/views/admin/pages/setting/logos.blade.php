
<div class="form-group">
    {!! Form::label('logo_512x512', 'Logo 512x512') !!}
    <input type="file" id="logo_512x512" name="logo_512x512" class="dropify" data-default-file="{{app(GeneralSettings::class)->logo_512x512}}" >
    <div class="form-control-feedback"></div>
</div>