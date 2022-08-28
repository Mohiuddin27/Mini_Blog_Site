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
                        <div class="col-lg-10">
                            <br>
                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">All Categories</h4>
                                        <div></div>
                                        <div>
                                            <a href="#category-modal"  data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Category</a>
                                        </div>
                                    </div>
                                    <div class="messs"></div>
                                   
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="category_table"class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$d->name}}</td>
                                                    <td>{{$d->slug}}</td>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm" href="{{route('category.edit',$d->id)}}"><i class="fa fa-pencil-square-o  text-light " style="font-size:20px"aria-hidden="true"></i>
                                                        </a>
                                                        <a class="btn btn-light btn-sm" id="delete_category" category_id="{{ $d->id }}"  data-confirm="Are you sure to delete this item?" href=""><i class="fa fa-trash text-danger" style="font-size:20px" aria-hidden="true"></i>
                                                        </a>
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

            <div id="category-modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new Category</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                           
                        </div>
                        <div class="mess"></div>
                        <div class="modal-body">
                            <form id="add_post_category_form" action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success btn-block"type="submit" value="Add New">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            <div id="edit_category_modal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Category</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                           
                        </div>
                        <div class="mess"></div>
                        <div class="modal-body">
                            <form id="edit_post_category_form"  action="{{route('category.update',$d->id)}}" method="POST">
                                @csrf
                                <input type="text" name="id" id="category_id">
                                <div class="form-group">
                                    <input name="name" id="name" class="form-control" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success btn-block" class="update" type="submit" value="Update Category">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
@endsection