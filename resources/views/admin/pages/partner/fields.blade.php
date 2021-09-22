<div class="row">
    <div class=" col-12 ">
        <div class="collapse show" id="demo1">
            <div class="form-group">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['class' => 'form-control ', 'id' => 'name', 'required' => 'required' ]) !!}
                <div class="form-control-feedback">
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('link', 'Lien') !!}
                {!! Form::text('link', null, ['class' => 'form-control ', 'id' => 'link', 'required' => 'required' ]) !!}
                <div class="form-control-feedback">
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input type="file" id="image" name="image"  accept=" image/jpg, image/jpeg, image/png" class="file-input" @isset ($data) data-default-file="{{ $data->file_url }}" @endIf>
                <div class="form-control-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Save<i class="icon-paperplane ml-2"></i></button>


        </div>
    </div>
</div>
