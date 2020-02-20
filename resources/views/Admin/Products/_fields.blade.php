<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {{ Form::label('product_title', 'Product Title') }}
    {{ Form::text('title',$product->title,['class'=>'form-control border-input','placeholder'=>'Macbook pro']) }}
    <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
</div>


<div class="form-group">
    <label for="">Category</label>
    <select  name="category">
        @foreach($categories as $category)
        <!-- <option value="" selected="">Select Category</option> -->
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>

</div>


<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','File') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
</div>