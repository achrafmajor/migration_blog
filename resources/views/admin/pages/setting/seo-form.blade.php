
 <div class="form-group">
    {!! Form::label('seo_titel', 'SEO Titel') !!}
    {!! Form::text('seo_titel', app(GeneralSettings::class)->seo_titel, ['class' => 'form-control ', 'id' => 'bank_accounte_num', 'id' => 'bank_accounte_num']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('seo_keyword', 'SEO Keyword') !!}
    {!! Form::text('seo_keyword',  app(GeneralSettings::class)->seo_keyword, ['class' => 'form-control ',"value"=>"John", 'id' => 'seo_keyword']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('seo_description', 'SEO Déscription') !!}
    {!! Form::textarea('seo_description', app(GeneralSettings::class)->seo_description, ['class' => 'form-control ','spellcheck'=>"false" ,'data-gramm'=>"false" ,'rows' => '3', 'cols' => '3', 'id' => 'seo_description']); !!}
    <div class="form-control-feedback">
    </div>
</div>