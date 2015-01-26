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

	$webPage = new \FinalProject\WebPage("Home");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
// ---------------------------------------------
	?>

	<!-- content-section-starts -->
	<div class="content">
		<div class="main">
			<div class="container">
				<div class="register">
					<form id="registrationForm" method="get" action="../includes/functions.php">
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
								<span class="check-exists-feedback" data-type="email" style="color: red;"></span>
							</div>
							<div class="clearfix"> </div>
							<a class="news-letter" href="#">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
							</a>
						</div>

						</div>
						<div class="register-bottom-grid">
							<h3>LOGIN INFORMATION</h3>
							<div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password<label>*</label></span>
								<input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="password" name="password" placeholder="Enter your password" required autofocus onchange="
                                    this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                    if(this.checkValidity()) form.confirmPassword.pattern = this.value;">
							</div>
							<div class="wow fadeInRight" data-wow-delay="0.4s">
								<span>Confirm Password<label>*</label></span>
								<input type="password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" id="confirmPassword" name="confirmPassword" placeholder="Re-Enter your password" required autofocus onchange="
								this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
							</div>

							<input type='hidden' name='action' value='register'>
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
		<script src="../js/existcheck.jquery.js"></script>
		<script>
			$(".check-exists").existsChecker();
		</script>

	<script type="text/javascript">

		document.addEventListener("DOMContentLoaded", function() {

			// JavaScript form validation

			var checkPassword = function(str)
			{
				var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
				return re.test(str);
			};

			var checkForm = function(e)
			{
				if(this.username.value == "") {
					alert("Error: Username cannot be blank!");
					this.username.focus();
					e.preventDefault(); // equivalent to return false
					return;
				}
				re = /^\w+$/;
				if(!re.test(this.username.value)) {
					alert("Error: Username must contain only letters, numbers and underscores!");
					this.username.focus();
					e.preventDefault();
					return;
				}
				if(this.pwd1.value != "" && this.pwd1.value == this.pwd2.value) {
					if(!checkPassword(this.pwd1.value)) {
						alert("The password you have entered is not valid!");
						this.pwd1.focus();
						e.preventDefault();
						return;
					}
				} else {
					alert("Error: Please check that you've entered and confirmed your password!");
					this.pwd1.focus();
					e.preventDefault();
					return;
				}
				alert("Both username and password are VALID!");
			};

			var myForm = document.getElementById("myForm");
			myForm.addEventListener("submit", checkForm, true);

			// HTML5 form validation

			var supports_input_validity = function()
			{
				var i = document.createElement("input");
				return "setCustomValidity" in i;
			}

			if(supports_input_validity()) {
				var usernameInput = document.getElementById("emailAddres");
				usernameInput.setCustomValidity(usernameInput.title);

				var pwd1Input = document.getElementById("password");
				pwd1Input.setCustomValidity(pwd1Input.title);

				var pwd2Input = document.getElementById("cofirmPassword");

				// input key handlers

				usernameInput.addEventListener("keyup", function() {
					usernameInput.setCustomValidity(this.validity.patternMismatch ? usernameInput.title : "");
				}, false);

				pwd1Input.addEventListener("keyup", function() {
					this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : "");
					if(this.checkValidity()) {
						pwd2Input.pattern = this.value;
						pwd2Input.setCustomValidity(pwd2Input.title);
					} else {
						pwd2Input.pattern = this.pattern;
						pwd2Input.setCustomValidity("");
					}
				}, false);

				pwd2Input.addEventListener("keyup", function() {
					this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : "");
				}, false);

			}

		}, false);

	</script>


<?php
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>