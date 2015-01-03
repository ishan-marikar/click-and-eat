<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/3/2015 at 11:27 AM
 * Project name : FinalProjectClickAndEat
 *
 * "When I wrote this, only God and I understood what I was doing.
 * Now, God only knows." -Karl Weierstrass
 *
 * For the brave souls who get this far: You are the chosen ones,
 * the valiant knights of programming who toil away, without rest,
 * fixing our most awful code. To you, true saviors, kings of men,
 * I say this: never gonna give you up, never gonna let you down,
 * never gonna run around and desert you. Never gonna make you cry,
 * never gonna say goodbye. Never gonna tell a lie and hurt you.
 *
 */

	include_once("includes/webpage.class.php");
	session_start();

	$webPage = new \FinalProject\WebPage("Home");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
	// ---------------------------------------------
?>
	<div class="content">
		<div class="container">
			<div class="login-page">
				<div class="dreamcrub">
					<ul class="breadcrumbs">
						<li class="home">
							<a href="index.html" title="Go to Home Page">Home</a>&nbsp;
							<span>&gt;</span>
						</li>
						<li class="women">
							Login
						</li>
					</ul>
					<ul class="previous">
						<li><a href="index.html">Back to Previous Page</a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="account_grid">
					<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
						<h3>NEW CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="register.html">Create an Account</a>
					</div>
					<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
						<h3>REGISTERED CUSTOMERS</h3>
						<p>If you have an account with us, please log in.</p>
						<form>
							<div>
								<span>Email Address<label>*</label></span>
								<input type="text">
							</div>
							<div>
								<span>Password<label>*</label></span>
								<input type="text">
							</div>
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="special-offers-section">
			<div class="container">
				<div class="special-offers-section-head text-center dotted-line">
					<h4>Special Offers</h4>
				</div>
				<div class="special-offers-section-grids">
					<div class="m_3"><span class="middle-dotted-line"> </span>
					</div>
					<div class="container">
						<ul id="flexiselDemo3">
							<li>
								<div class="offer">
									<div class="offer-image">
										<img src="web/images/p1.jpg" class="img-responsive" alt="" />
									</div>
									<div class="offer-text">
										<h4>Olister Combo pack lorem</h4>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
										<input type="button" value="Grab It">
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
							<li>
								<div class="offer">
									<div class="offer-image">
										<img src="web/images/p2.jpg" class="img-responsive" alt="" />
									</div>
									<div class="offer-text">
										<h4>Chicken Jumbo pack lorem</h4>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
										<input type="button" value="Grab It">
										<span></span>
									</div>
									<div class="clearfix"></div>
								</div>
							</li>
							<li>
								<div class="offer">
									<div class="offer-image">
										<img src="web/images/p3.jpg" class="img-responsive" alt="" />
									</div>
									<div class="offer-text">
										<h4>Crab Combo pack lorem</h4>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
										<input type="button" value="Grab It">
										<span></span>
									</div>

									<div class="clearfix"></div>
								</div>
							</li>
							<li>
								<div class="offer">
									<div class="offer-image">
										<img src="web/images/p2.jpg" class="img-responsive" alt="" />
									</div>
									<div class="offer-text">
										<h4>Chicken Jumbo pack lorem</h4>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
										<input type="button" value="Grab It">
										<span></span>
									</div>

									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
						<script type="text/javascript">
							$(window).load(function() {

								$("#flexiselDemo3").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint: 480,
											visibleItems: 1
										},
										landscape: {
											changePoint: 640,
											visibleItems: 2
										},
										tablet: {
											changePoint: 768,
											visibleItems: 3
										}
									}
								});

							});
						</script>
						<script type="text/javascript" src="web/js/jquery.flexisel.js"></script>
					</div>
				</div>
			</div>
		</div>

	<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>