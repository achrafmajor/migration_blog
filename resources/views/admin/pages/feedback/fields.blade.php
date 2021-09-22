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
                {!! Form::label('job', 'Job') !!}
                {!! Form::text('job', null, ['class' => 'form-control ', 'id' => 'job', 'required' => 'required' ]) !!}
                <div class="form-control-feedback">
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', 'FeedBack') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'content', 'required' => 'required']); !!}
                <div class="form-control-feedback">
                </div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Save<i class="icon-paperplane ml-2"></i></button>


        </div>
    </div>
</div>
