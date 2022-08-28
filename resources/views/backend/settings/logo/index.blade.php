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
                                    <h4 class="card-title">Website Logo</h4>
                                    @if (Session::has('success'))
                                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close"
                                            data-dismiss="alert">&times;</button></p>
                                @endif
                                  
                                </div>
                                
                                <div class="card-body">
                                   <form action="{{route('logo.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                     <div class="form-group">
                                        <img src="{{URL::to('/')}}/media/settings/logo/{{$logo->logo}}" alt="">
                                        <br>
                                        <input type="hidden" name="old_logo" value="{{$logo->logo}}">
                                        <input type="file" name="logo">
                                     </div>
                                     <input type="submit" class="btn btn-success" value="Update">
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>

					
				</div>			
			</div>
			<!-- /Page Wrapper -->

         

        </div>
@endsection