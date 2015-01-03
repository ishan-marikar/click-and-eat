<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/30/2014 at 1:02 PM
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

	if(isset($_REQUEST["firstName"])
		and isset($_REQUEST["lastName"])
		and isset($_REQUEST["emailAddress"])
		and isset($_REQUEST["password"])
		and isset($_REQUEST["confirmPassword"]))
	{
		$firstName = $_REQUEST["firstName"];
		$lastName = $_REQUEST["lastName"];
		$email = $_REQUEST["emailAddress"];
		$password = $_REQUEST["password"];
		$passwordConfirm = $_REQUEST["passwordConfirm"];
		// Add the data to the database
		$users = new Users();
		$users->setFirstName($firstName);
		$users->setLastName($lastName);
		$users->setEmail($email);
		$users->setPassword($password);
		$users->setIsAdmin(false);
		$status = $users->registerUser();

		if($status){
			header("");
		}
		else{
			echo "Uh-oh. Something went wrong: ";
			echo $users->getError();
		}
	}
	else {
	}
?>

	<!-- content-section-starts -->
	<div class="content">
		<div class="main">
			<div class="container">
				<div class="register">
					<form id="registrationForm" method="post" action="register.php">
						<div class="register-top-grid">
							<h3>PERSONAL INFORMATION</h3>
							<div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>First Name<label>*</label></span>
								<input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required autofocus>
							</div>
							<div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Last Name<label>*</label></span>
								<input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required autofocus>
							</div>
							<div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Email Address<label>*</label></span>
								<input type="email"  id="emailAddress" name="emailAddress" placeholder="Enter your email" class="check-exists" data-type="email" required autofocus>
								<span id="check-exists-feedback" data-type="emailAddress" ></span>
							</div>
							<div class="clearfix"> </div>
							<a class="news-letter" href="#">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
							</a>
						</div>
						<div class="register-bottom-grid">
							<h3>LOGIN INFORMATION</h3>
							<div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password<label>*</label></span>
								<input type="password" id="password" name="password" placeholder="Enter your password" required autofocus>
							</div>
							<div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password<label>*</label></span>
								<input type="password"  id="confirmPassword" name="confirmPassword" placeholder="Re-Enter your password" required autofocus>
							</div>
						</div>
						<div class="clearfix"> </div>
						<div class="register-but">
							<!--<form>-->
							<input type="submit" value="submit" id="registerButton">
							<div class="clearfix"> </div>
							<!-- </form> -->
						</div>
					</form>

				</div>
			</div>
		</div>
		<script src="js/existcheck.jquery.js"></script>
		<script>
			$("check-exists").existsChecker();
		</script>

<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>