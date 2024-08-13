<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="{{route('client.home')}}">Shop.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li class="has-dropdown">
							<a href="{{route('client.home')}}">Shop</a>
							<ul class="dropdown">
								<li><a href="single.html">Single Shop</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
							<div class="input-group">
								<form action="{{ route('client.search') }}#all" method="GET">
						      		<input type="text" placeholder="Search.." name="search">
							  	</form>
						      <div class="input-group-btn">
						        <button class="btn btn-primary" type="submit"></button>
						      </d>
						    </div>
						</li>
						<li class="has-dropdown">
							
							<a href="#"><i class="icon-user"></i></a>
							<ul class="dropdown">
								@if (Auth::check())
								<div class="menu-item px-1">
                                        <a href="{{route('logout')}}" style="color:#fff"
                                            class="menu-link px-5">Sign Out</a>
                                        <a href="{{route('client.viewCart')}}" style="color:#fff"
                                            >viewCart</a>
                                    </div>
								@else
                                    <div class="menu-item px-2">
                                        <a href="{{route('login')}}" style="color:#fff"
										class="menu-link px-5">Sign In</a>
                                    </div>
                                 @endif   
                            </ul>
						</li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<!-- slide -->
	 	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url({{asset('assret/images/img_bg_1.jpg')}});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$800</span>
		   						<h2>Alato Cabinet</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{asset('assret/images/img_bg_2.jpg')}});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$530</span>
		   						<h2>The Haluz Rocking Chair</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{asset('assret/images/img_bg_3.jpg')}});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$750</span>
		   						<h2>Alato Cabinet</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{asset('assret/images/img_bg_4.jpg')}});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
		   						<span class="price">$540</span>
		   						<h2>The WW Chair</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>