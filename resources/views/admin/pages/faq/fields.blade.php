<div class="row">
    <div class=" col-12 ">
        <div class="collapse show" id="demo1">
            <div class="form-group">
                {!! Form::label('ordre', 'Ordre') !!}
                {!! Form::number('ordre', null, ['class' => 'form-control ', 'id' => 'ordre', 'required' => 'required' ]) !!}
                <div class="form-control-feedback">
                </div>
            </div>
                <div class="form-group">
                    {!! Form::label('title', 'Question') !!}
                    {!! Form::text('title', null, ['class' => 'form-control ', 'id' => 'title', 'required' => 'required' ]) !!}
                    <div class="form-control-feedback">
                    </div>
                </div> 
                <div class="form-group">
                    {!! Form::label('content', 'Repense') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'content', 'required' => 'required']); !!}
                    <div class="form-control-feedback">
                    </div>
                </div>
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
