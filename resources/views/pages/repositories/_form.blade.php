
@include('partials.message')

{{ csrf_field() }}

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('title', 'Name') }}
            {{ Form::text('title', isset($repository) ? $repository->title : null, ['class' => 'form-control', 'required' => true]) }}
        </div>
        @if ($errors->first('title'))
            <p class="message-error">{{ $errors->first('title') }}</p>
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('url', 'Repository URL') }}
            {{ Form::text('url', isset($repository) ? $repository->url : null, ['class' => 'form-control', 'required' => true]) }}
        </div>
        @if ($errors->first('url'))
            <p class="message-error">{{ $errors->first('url') }}</p>
        @endif
    </div>
</div>

{{ Form::submit(isset($repository) ? 'Update' : 'Create', ['class' => 'btn']) }}
