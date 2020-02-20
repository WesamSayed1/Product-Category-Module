@extends('Admin.layouts.master')

@section('page')

View Products

@endsection

@section('content')

				<div class="row">

                    <div class="col-md-12">
                    	@include('Admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <a class="btn bg-pink btn-flat pull-right" href="#" data-toggle="modal" data-target="#myModal">New Product</a>
                                <h4 class="title">All Products</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($products))
                                    	@foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                           <td>
                                            
                                            <table class="table">
                                            <tr>
                                                  <td>{{$product->category->title}}</td>
                                            </tr>                     
                                           </table>
                                            
                                        </td>
                                      
                                       
                                        <td><img src="{{url('/uploads').'/'.$product->image}}"alt="{{$product->image}}" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                        	{!! Form::open(['route' => ['products.destroy', $product->id] , 'method'=>'DELETE' ])!!}

                                        	{{Form::button('<span class="fa fa-trash"></span>',['type'=>'submit', 'class'=>'btn btn-sm btn-danger','onClick'=>'return confirm("Are You Sure to Delete ? ")' ])}}

                                        	{{link_to_route('products.edit','',$product->id,['type'=>'submit', 'class'=>'btn btn-sm btn-info ti-pencil-alt'])}}

                                        	
                                           
                                            {!! Form::close() !!}
                                     	</td>
                                 	</tr>
                                 		@endforeach
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        <label for="message-text" class="col-form-label">Product Title:</label>
                                                        <input type="text" name="title" id="title" class="form-control">
                                                            <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>

                                                    </div>

                                                </div>
                                                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                                    <label for="category" class="col-form-label">Category Type:</label>

                                                    <select  class="form-control" id="Category" name="category">
                                                        @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                        <span class="text-danger">{{ $errors->has('category') ? $errors->first('category') : '' }}</span>

                                                </div>
                                                
                                                
                                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                                    {{ Form::label('file','File') }}
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