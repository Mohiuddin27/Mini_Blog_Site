@extends('layouts.app')
@section('main-section')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome {{Auth::user()->name}}!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
                        <div class="col-lg-12">
                            <br>

                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                    <h4 class="card-title">All Posts</h4>
                                    <div></div>
                                    <a href="#post-modal" data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Add New Post</a>
                                    </div>
                                    {{-- @if(Session::has('success')) --}}
                                    {{-- <p class="alert alert-success">{{ Session::get('success') }}<button class="close"
                                            data-dismiss="alert">&times;</button></p> --}}
                                            {{-- <script>
                                                swal("Great job","{!! Session::get('success') !!}","success",{
                                                    button:"OK",
                                                })
                                            </script> --}}
                                   {{-- @endif --}}
                                   @include('sweetalert::alert')

                                <div class="messs"></div>
                                <div class="mess"></div>
                                </div>
                              
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="post_table" class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Featured Image</th>
                                                    <th style="width:30%">Title</th>
                                                    <th>Category Name</th>

                                                    <th>Author Name</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>
                                                        @if(!empty($d->featured_image))
                                                        <img style="width:60px;height:60px;"src="{{URL::to('/')}}/media/posts/{{$d->featured_image}}" alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{$d->title}}</td>
                                                    <td>
                                                        @foreach ($d->categories as $category )
                                                        {{$category->name}}
                                                            
                                                        @endforeach
                                                    </td>

                                                    <th>{{$d->user->name}}</th>
                                                    <th>{{$d->created_at->diffForHumans()}}</th>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm" id="edit_post" edit_id="{{ $d->id }}" data-toggle="modal" href="#"><i class="fa fa-pencil-square-o  text-light " style="font-size:20px"aria-hidden="true"></i></a>
                                                        <a class="btn btn-light btn-sm" id="delete_post" delete_id="{{ $d->id }}"    data-confirm="Are you sure to delete this Post?" href=""><i class="fa fa-trash text-danger" style="font-size:20px" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					
				</div>			
			</div>
			<!-- /Page Wrapper -->

            <div id="post-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new Post</h4>
                            <button class="close" data-dismiss="modal">&times;</button>

                           
                        </div>
                        <div class="postmess"></div>

                        <div class="modal-body">
                            {{-- <ul class="alert alert-danger" id="saveerrorlist" style="display:none"></ul> --}}
                            <form id="add_post_form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input name="title" class="form-control" type="text" placeholder="title">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories</label>
                                    <hr>
                                    <select name="category[]" class="form-control" style="width:30%" id="category">
                                        <option value="">--Select Category--</option>
                                        @foreach($categories as $category)
                                          <option  value="{{$category->id}}"> {{$category->name}}</option>
                                          @endforeach 

                                      </select>
                                    {{-- @foreach($categories as $category)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="category[]" value="{{$category->id}}"> {{$category->name}}
                                        </label>

                                    </div>
                                    @endforeach --}}
                                </div>
                                <div class="form-group">
                                    <label style="font-size:70px;cursor: pointer;" for="fimage"><i class="fa fa-file-image-o"></i></label>
                                    <input type="file" name="fimg" id="fimage" style="display:none">
                                     <img style="max-width:100%;display:block"id="post_featured_image_load" src="" alt="">
                                </div>
                                <div class="form-group">
                                    <textarea id="post_editor" name="content"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success btn-block" type="submit" value="Add New">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

           //edit post modal
           <div id="edit_post-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Post</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                       
                    </div>
                    <div class="mess"></div>
                    <div class="modal-body">
                        <form  action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input name="title" class="form-control" type="text" placeholder="title">
                                <input name="id" class="form-control" type="hidden" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="">Categories</label>
                                <hr>
                                <div class="cat"></div>
                                {{-- <select name="category[]" class="form-control" style="width:30%" id="category_list">
                                    <option value="">--Select Category--</option>
                               
                                @foreach($categories as $category)
                                <option  value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach 
                               
                            </select> --}}
                            </div>
                            <div class="form-group">
                                <label style="font-size:70px;cursor: pointer;" for="fimageedit"><i class="fa fa-file-image-o"></i></label>
                                <input type="file" name="fimg"id="fimageedit" style="display:none">
                                 <img style="max-width:100%;display:block"id="post_featured_image_edit" src="" alt="">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="6" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success btn-block" type="submit" value="Update Post">
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
@endsection