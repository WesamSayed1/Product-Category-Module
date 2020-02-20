@extends('Admin.layouts.master')

@section('page')

View Categories

@endsection

@section('content')

				<div class="row">

                    <div class="col-md-12">
                    	@include('Admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <a class="btn bg-pink btn-flat pull-right" data-toggle="modal" data-target="#myModal">New Category</a>
                                <h4 class="title">All Categories</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category title</th>
                                        <th>Category image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td><img src="{{url('/uploads').'/'.$category->image}}"alt="{{$category->image}}" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        
                                    <td>
                                            {!! Form::open(['route' => ['categories.destroy', $category->id] , 'method'=>'DELETE' ])!!}

                                            {{Form::button('<span class="fa fa-trash"></span>',['type'=>'submit', 'class'=>'btn btn-sm btn-danger','onClick'=>'return confirm("Are You Sure to Delete ? ")' ])}}

                                            {{link_to_route('categories.edit','',$category->id,['type'=>'submit', 'class'=>'btn btn-sm btn-info ti-pencil-alt'])}}

                                                                 
                                            {!! Form::close() !!}
                                     	</td>
                                 	</tr>
                                 		@endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{url('admin/categories')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        <label for="message-text" class="col-form-label">Category Title:</label>
                                                        <input type="text" name="title" id="title" class="form-control">
                                                            <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>

                                                    </div>

                                                </div>
                                                   
                                                
                                                
                                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                                    {{ Form::label('file','Category Image') }}
                                                    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
                                                    <div id="thumb-output"></div>
                                                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                    </div>

@endsection