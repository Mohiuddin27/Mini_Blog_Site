<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
       @include('layouts.head')
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			@include('layouts.header')
			
@include('layouts.menu')
			
@section('main-section')
@show
		
        </div>
		<!-- /Main Wrapper -->
		
      @include('layouts.script')
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>
<form id="logout-form" action="{{route('logout')}}" method="POST">
@csrf
</form>