@extends('admin_layout')
@section('title')
Dashboard
@endsection
@section('admin_content')
<?php
	use App\User;
	use App\Product;
	use App\Order;


	$users = count(User::all());
	$products = count(Product::all());
	$orders = count(Order::all());

	$sales = count(DB::table('orders')
																		->where('order_status', 'confirmed')
																		->get());

	$visits = DB::table('pcount')
															->where('id', 1)
															->first();
 ?>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">

				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					<div class="number">{{ $visits->visits }}<i class="icon-arrow-up"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number">{{ $sales }}<i class="icon-arrow-up"></i></div>
					<div class="title">sales</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number">{{ $orders }}<i class="icon-arrow-up"></i></div>
					<div class="title">orders</div>
					<div class="footer">
						<a href="/manage_orders"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">678<i class="icon-arrow-down"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>

			</div>

			<div class="row-fluid">

				<div class="span8 widget blue" onTablet="span7" onDesktop="span8">

					<div id="stats-chart2"  style="height:282px" ></div>

				</div>

				<!-- End .sparkStats -->

			</div>


			<div class="row-fluid">

				<div class="widget blue span5" onTablet="span6" onDesktop="span5">

					<h2><span class="glyphicons globe"><i></i></span> Demographics</h2>

					<hr>

					<div class="content">

						<div class="verticalChart">

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>37%</span>
									</div>

								</div>

								<div class="title">US</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>16%</span>
									</div>

								</div>

								<div class="title">PL</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>12%</span>
									</div>

								</div>

								<div class="title">GB</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>9%</span>
									</div>

								</div>

								<div class="title">DE</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>7%</span>
									</div>

								</div>

								<div class="title">NL</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>6%</span>
									</div>

								</div>

								<div class="title">CA</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>5%</span>
									</div>

								</div>

								<div class="title">FI</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>4%</span>
									</div>

								</div>

								<div class="title">RU</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>3%</span>
									</div>

								</div>

								<div class="title">AU</div>

							</div>

							<div class="singleBar">

								<div class="bar">

									<div class="value">
										<span>1%</span>
									</div>

								</div>

								<div class="title">N/A</div>

							</div>

							<div class="clearfix"></div>

						</div>

					</div>

				</div><!--/span-->

				<div class="widget span3 red" onTablet="span6" onDesktop="span3">

					<h2><span class="glyphicons pie_chart"><i></i></span> Browsers</h2>

					<hr>

					<div class="content">

						<div class="browserStat big">
							<img src="img/browser-chrome-big.png" alt="Chrome">
							<span>34%</span>
						</div>
						<div class="browserStat big">
							<img src="img/browser-firefox-big.png" alt="Firefox">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-ie.png" alt="Internet Explorer">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-safari.png" alt="Safari">
							<span>34%</span>
						</div>
						<div class="browserStat">
							<img src="img/browser-opera.png" alt="Opera">
							<span>34%</span>
						</div>


					</div>
				</div>

				<div class="widget yellow span4 noMargin" onTablet="span12" onDesktop="span4">
					<h2><span class="glyphicons fire"><i></i></span> Server Load</h2>
					<hr>
					<div class="content">
						 <div id="serverLoad2" style="height:224px;"></div>
					</div>
				</div>

			</div>

			<div class="row-fluid">

				<div class="box black span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white list"></i><span class="break"></span>Weekly Stat</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<li>
								<a href="#">
									<i class="icon-arrow-up green"></i>
									<strong>92</strong>
									New Comments
								</a>
							</li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>15</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>36</strong>
							  New Articles
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-comment yellow"></i>
							  <strong>45</strong>
							  User reviews
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-up green"></i>
							  <strong>112</strong>
							  New Comments
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>31</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>93</strong>
							  New Articles
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-comment yellow"></i>
							  <strong>256</strong>
							  User reviews
							</a>
						  </li>
						</ul>
					</div>
				</div><!--/span-->

				<div class="box black span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Last Users</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<li class="green">
								<a href="#">
									<img class="avatar" alt="Lucas" src="img/avatar.jpg">
								</a>
								<strong>Name:</strong> Łukasz Holeczek<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Approved
							</li>
							<li class="yellow">
								<a href="#">
									<img class="avatar" alt="Bill" src="img/avatar9.jpg">
								</a>
								<strong>Name:</strong> Bill Cole<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Pending
							</li>
							<li class="red">
								<a href="#">
									<img class="avatar" alt="Jane" src="img/avatar5.jpg">
								</a>
								<strong>Name:</strong> Jane Sanchez<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Banned
							</li>
							<li class="blue">
								<a href="#">
									<img class="avatar" alt="Kate" src="img/avatar6.jpg">
								</a>
								<strong>Name:</strong> Kate Presley<br>
								<strong>Since:</strong> Jul 25, 2012 11:09<br>
								<strong>Status:</strong> Updated
							</li>
						</ul>
					</div>
				</div><!--/span-->

				<div class="box black span4 noMargin" onTablet="span12" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white check"></i><span class="break"></span>To Do List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="todo metro">
							<ul class="todo-list">
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>
									Windows Phone 8 App
									<strong>today</strong>
								</li>
								<li class="red">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>today</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>tommorow</strong>
								</li>
								<li class="yellow">
									<a class="action icon-check-empty" href="#"></a>
									Windows Phone 8 App
									<strong>tommorow</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this week</strong>
								</li>
								<li class="green">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this week</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									New frontend layout
									<strong>this month</strong>
								</li>
								<li class="blue">
									<a class="action icon-check-empty" href="#"></a>
									Hire developers
									<strong>this month</strong>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="row-fluid">

				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Users</p>
					<span class="badge">{{ $users }}</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-comments-alt"></i>
					<p>Comments</p>
					<span class="badge">46</span>
				</a>
				<a class="quick-button metro blue span2" href="/manage_orders">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge">{{ $orders }}</span>
				</a>
				<a class="quick-button metro green span2" href="/all_products">
					<i class="icon-barcode"></i>
					<p>Products</p>
					<span class="badge">{{ $products }}</span>
				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Messages</p>
					<span class="badge">88</span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Calendar</p>
				</a>

				<div class="clearfix"></div>

			</div><!--/row-->


@endsection
