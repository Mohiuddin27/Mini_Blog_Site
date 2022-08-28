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
                                    <h4 class="card-title">Website Settings</h4>
                                    {{-- @if (Session::has('success'))
                                    <p class="alert alert-success">{{ Session::get('success') }}<button class="close"
                                            data-dismiss="alert">&times;</button></p>
                                @endif --}}
                                @include('sweetalert::alert')
                                  
                                </div>
                                
                                <div class="card-body">
                                   <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Website Title</label>
                                
                                        <input type="text" class="form-control w-50" name="website_title" value="{{$allsetting->website_title}}">
                                    </div>
                                     <div class="form-group">
                                        <label for="" class="font-weight-bold text-uppercase">Website banner</label><br>
                                        <img style="max-width:100%"src="{{URL::to('/')}}/media/settings/banner/{{$allsetting->banner}}" alt="">
                                        <br><br>
                                        <input type="hidden" name="old_banner" value="{{$allsetting->banner}}">
                                        <input type="file" name="banner">
                                     </div>
                                     <div class="form-group">
                                        <label for="" class="font-weight-bold text-uppercase">Website logo</label><br>
                                        <img src="{{URL::to('/')}}/media/settings/logo/{{$allsetting->logo}}" alt="">
                                        <br><br>
                                        <input type="hidden" name="old_logo" value="{{$allsetting->logo}}">
                                        <input type="file" name="logo">
                                     </div>
                                     <div class="form-group">
                                        <label for="">Banner Heading</label>
                                
                                        <input type="text" class="form-control w-50" name="banner_heading" value="{{$allsetting->banner_heading}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banner Paragraph</label>
                                
                                        <input type="text" class="form-control w-50" name="banner_paragraph" value="{{$allsetting->banner_paragraph}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Footer Paragraph</label>
                                
                                        <input type="text" class="form-control w-50" name="footer_paragraph" value="{{$allsetting->footer_paragraph}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Facebook Link</label>
                                
                                        <input type="text" class="form-control w-50" name="facebook" value="{{$allsetting->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter Link</label>
                                
                                        <input type="text" class="form-control w-50" name="twitter" value="{{$allsetting->twitter}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instragram Link</label>
                                
                                        <input type="text" class="form-control w-50" name="instragram" value="{{$allsetting->instragram}}">
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