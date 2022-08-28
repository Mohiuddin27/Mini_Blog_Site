			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="{{route('home')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
                            <li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('post.index')}}">All Posts</a></li>
                                    <li><a href="{{route('post-category.index')}}">Categories</a></li>
                                    <li><a href="invoice-report.html">Tags</a></li>
								</ul>
							</li>
							
							 <li class="submenu">
								<a href="#"><i class="fe fe-vector"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('setting.index')}}">All Setting</a></li>
									{{-- <li><a href="{{route('logo.index')}}">Logo</a></li>
                                    <li><a href="{{route('banner.index')}}">Banner</a></li> --}}
                                   
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-vector"></i> <span>Supplier/Customer</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{route('customer.category')}}">Add Customer Category</a></li>
									<li><a href="{{route('setting.index')}}">Add Supplier/Customer</a></li>

									{{-- <li><a href="{{route('logo.index')}}">Logo</a></li>
                                    <li><a href="{{route('banner.index')}}">Banner</a></li> --}}
                                   
								</ul>
							</li>
						</li>

							
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->