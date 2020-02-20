<div class="form-group {{ $errors->has('tag_title') ? 'has-error' : '' }}">
    {{ Form::label('title', 'Category title') }}
    {{ Form::text('title',$category->title,['class'=>'form-control border-input','placeholder'=>'Macbook pro']) }}
    <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','File') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
</div>
