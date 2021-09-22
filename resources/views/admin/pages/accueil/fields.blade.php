 <div class="form-group">
     {!! Form::label('home_titel', "Titre") !!}
     {!! Form::text('home_titel', app(GeneralSettings::class)->home_titel, ['class' => 'form-control ', 'id' => 'home_titel']) !!}
     <div class="form-control-feedback">
     </div>
 </div>
 <div class="form-group">
    {!! Form::label('home_sub_desc', "Sub Description") !!}
    {!! Form::text('home_sub_desc', app(GeneralSettings::class)->home_sub_desc, ['class' => 'form-control ', 'id' => 'home_sub_desc']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('home_link', "Lien de redériction") !!}
    {!! Form::text('home_link', app(GeneralSettings::class)->home_link, ['class' => 'form-control ', 'id' => 'home_link']) !!}
    <div class="form-control-feedback">
    </div>
</div>

 <div class="form-group">
     {!! Form::label('home_description', "Description") !!}
     {!! Form::text('home_description', app(GeneralSettings::class)->home_description, ['class' => 'form-control ', 'id' => 'home_description']) !!}
     <div class="form-control-feedback">
     </div>
 </div>
 <div class="form-group">
     {!! Form::label('brand', 'Brand') !!}
     <input type="file" id="brand" name="brand" class="dropify" data-default-file="{{app(GeneralSettings::class)->home_image}}">
     <div class="form-control-feedback"></div>
 </div>
 <div class="form-group">
    {!! Form::label('background', 'Background') !!}
    <input type="file" id="background" name="background" class="dropify" data-default-file="{{app(GeneralSettings::class)->home_background}}">
    <div class="form-control-feedback"></div>
</div>
<button type="submit" class="btn btn-primary submit-btn">Validé<i class="icon-paperplane ml-2"></i></button>
