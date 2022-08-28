@extends('layouts.app')
@section('main-section')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
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
                            <a href="{{route('post-category.index')}}" class="btn btn-primary btn-sm mb-3">All Category</a>
                            
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Categories</h4>
                                    @if (Session::has('success-update'))
                                    <p class="alert alert-success">{{ Session::get('success-update') }}<button class="close"
                                            data-dismiss="alert">&times;</button></p>
                                @endif
                                   
                                </div>
                                <div class="card-body">
                                    <form id="edit_post_category_form"  action="{{route('category.update',$data->id)}}" method="POST">
                                        @csrf
                                      
                                        <div class="form-group">
                                            <input name="name" id="name" class="form-control" value="{{$data->name}}"type="text" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-success btn-block" class="update" type="submit" value="Update Category">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

					
				</div>			
			</div>
			<!-- /Page Wrapper -->

           
@endsection