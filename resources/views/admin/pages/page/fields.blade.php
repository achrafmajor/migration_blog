<div class="row">
    <div class=" col-12 ">
        <div class="collapse show" id="demo1">
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        {!! Form::label('title', 'Titre') !!}
                        {!! Form::text('title', null, ['class' => 'form-control ', 'id' => 'title', 'required' => 'required' ]) !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Url') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control ', 'id' => 'slug', 'required' => 'required' ]) !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>									
                    {!! Form::textarea('content', null, ['class' => 'summernote', 'id' => 'desc', 'required' => 'required']) !!}
                    <div class="form-group">
                        {!! Form::label('desciption', 'Description') !!}
                        {!! Form::textarea('desciption', null, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'desciption', 'required' => 'required']); !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Images') !!}
                        <input type="file" id="image" name="image"  accept=" image/jpg, image/jpeg, image/png" class="file-input" @isset ($data) data-default-file="{{ $data->file_url }}" @endIf>
                        <div class="form-control-feedback"></div>
                    </div>
                    <legend class="text-uppercase font-size-sm font-weight-bold ">
                        <div class="ml-2 Text-center">SEO</div>
                    </legend>
                    <div class="form-group">
                        {!! Form::label('seo_titel', 'Seo Titre') !!}
                        {!! Form::text('seo_titel', null, ['class' => 'form-control ', 'id' => 'seo_titel', 'required' => 'required']) !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('seo_keyword', 'Mot Clé') !!}
                        {!! Form::text('seo_keyword', null, ['class' => 'form-control ', 'id' => 'seo_keyword', 'required' => 'required']) !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('seo_description', 'Description Seo') !!}
                        {!! Form::textarea('seo_description', null, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'seo_description', 'placeholder' => 'Entrer une address ', 'required' => 'required']); !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    
                </div>
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('statut', 'Staut') !!}
                        {!! Form::select('statut',[1=>'Publier',0=>'Non Publier'], null, ['class' => 'form-control SlectBox' , 'id' => 'statut','required' => 'required']); !!}
                        <div class="form-control-feedback">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-btn">Save<i class="icon-paperplane ml-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
