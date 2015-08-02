<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Cakeology</a>
		</div>
		<div class="navbar-collapse collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
					<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Category <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider" role="separator"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">322</span></a></li>



				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7 - Items<span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-cart" role="menu">
						<li>
							<span class="item">
								<span class="item-left">
									<img src="http://lorempixel.com/50/50/" alt="" />
									<span class="item-info">
										<span>Item name</span>
										<span>23$</span>
									</span>
								</span>
								<span class="item-right">
									<button class="btn btn-xs btn-danger pull-right">x</button>
								</span>
							</span>
						</li>
						<li>
							<span class="item">
								<span class="item-left">
									<img src="http://lorempixel.com/50/50/" alt="" />
									<span class="item-info">
										<span>Item name</span>
										<span>23$</span>
									</span>
								</span>
								<span class="item-right">
									<button class="btn btn-xs btn-danger pull-right">x</button>
								</span>
							</span>
						</li>
						<li>
							<span class="item">
								<span class="item-left">
									<img src="http://lorempixel.com/50/50/" alt="" />
									<span class="item-info">
										<span>Item name</span>
										<span>23$</span>
									</span>
								</span>
								<span class="item-right">
									<button class="btn btn-xs btn-danger pull-right">x</button>
								</span>
							</span>
						</li>
						<li>
							<span class="item">
								<span class="item-left">
									<img src="http://lorempixel.com/50/50/" alt="" />
									<span class="item-info">
										<span>Item name</span>
										<span>23$</span>
									</span>
								</span>
								<span class="item-right">
									<button class="btn btn-xs btn-danger pull-right">x</button>
								</span>
							</span>
						</li>
						<li class="divider"></li>
						<li><a class="text-center" href="">View Cart</a></li>
					</ul>
				</li>



				
@if(Auth::check())
				<li class="dropdown">
					<a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">My account <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider" role="separator"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="{{ URL::route('logout') }}">Logout</a></li>
					</ul>
				</li>
@else
				<li><a href="{{ URL::route('login') }}">Login</a></li>
@endif
				
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>