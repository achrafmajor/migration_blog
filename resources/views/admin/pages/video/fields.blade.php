<div class="row">
    <div class="form-group col-6">
        {!! Form::label('video_url', "Video URL") !!}
        {!! Form::text('video_url', app(GeneralSettings::class)->video_url, ['class' => 'form-control ', 'id' => 'video_url']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
    <div class="form-group col-6">
        {!! Form::label('video_link', "Video redirect Link") !!}
        {!! Form::text('video_link', app(GeneralSettings::class)->video_link, ['class' => 'form-control ', 'id' => 'video_link']) !!}
        <div class="form-control-feedback">
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('video_background', 'Image') !!}
    <input type="file" id="video_background" name="video_background" class="dropify" data-default-file="{{app(GeneralSettings::class)->video_background}}" >
    <div class="form-control-feedback"></div>
</div>
<button type="submit" class="btn btn-primary submit-btn">Validé<i class="icon-paperplane ml-2"></i></button>
