<div class="form-group">
    {!! Form::label('facebook_url', 'Facebook Url') !!}
    {!! Form::text('facebook_url', app(GeneralSettings::class)->facebook_url, ['class' => 'form-control ', 'id' => 'facebook_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('instagrame_url', 'Instagrame Url') !!}
    {!! Form::text('instagrame_url', app(GeneralSettings::class)->instagrame_url, ['class' => 'form-control ', 'id' => 'instagrame_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('youtube_url', 'Youtube Url') !!}
    {!! Form::text('youtube_url', app(GeneralSettings::class)->youtube_url, ['class' => 'form-control ', 'id' => 'youtube_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('whatsup_url', 'WhatsApp Url') !!}
    {!! Form::text('whatsup_url', app(GeneralSettings::class)->whatsup_url, ['class' => 'form-control ', 'id' => 'whatsup_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('messenger_url', 'Messenger Url') !!}
    {!! Form::text('messenger_url', app(GeneralSettings::class)->messenger_url, ['class' => 'form-control ', 'id' => 'messenger_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('linkedin_url', 'Linkedin Url') !!}
    {!! Form::text('linkedin_url', app(GeneralSettings::class)->linkedin_url, ['class' => 'form-control ', 'id' => 'linkedin_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>
<div class="form-group">
    {!! Form::label('twitter_url', 'Twitter Url') !!}
    {!! Form::text('twitter_url', app(GeneralSettings::class)->twitter_url, ['class' => 'form-control ', 'id' => 'twitter_url']) !!}
    <div class="form-control-feedback">
    </div>
</div>