<div class="form-group">
    {!! Form::label('name', 'Nom') !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'id' => 'name', 'required' => 'required' ]) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control ', 'id' => 'phone', 'required' => 'required' ]) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('contry_code', 'Contry Code') !!}
    {!! Form::text('contry_code', null, ['class' => 'form-control ', 'id' => 'contry_code', 'required' => 'required' ]) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('image', 'Images') !!}
    <input type="file" id="image" name="image"  accept="image/jpg, image/jpeg, image/png" class="file-input" @isset ($data) data-default-file="{{ $data->file_url }}" @endIf>
    <div class="form-control-feedback"></div>
</div>
<button type="submit" class="btn btn-primary submit-btn">Save<i class="icon-paperplane ml-2"></i></button>
