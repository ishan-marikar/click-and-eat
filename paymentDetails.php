<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 1/21/2015 at 11:29 PM
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
	if (isset($_REQUEST['user_id'])) {

	}

	$webPage = new \FinalProject\WebPage("Payment Details");
	$headerContent = $webPage->addHeader();
	echo $headerContent;
	// ---------------------------------------------
?>

	<style>
		.submit-button {
			margin-top: 10px;
		}
	</style>
	<br>
	<div class="panel panel-danger"></div>
	<div class="container">
		<div class='row'>
			<div class='col-md-4'></div>
			<div class='col-md-4'>
				<div class='col-md-12 form-group'>
					<h1>Payment page</h1>
					<hr class="featurette-divider"></hr>
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
						Step 4: Payment
					</div><br>
					<hr class="featurette-divider"></hr></div>
				<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
				<form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
					<div class='form-row'>
						<div class='col-xs-12 form-group required'>
							<label class='control-label'>Name on Card</label>
							<input class='form-control' size='4' type='text' name="nameOnCard" id="nameOnCard">
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Card Number</label>
							<input autocomplete='off' class='form-control card-number' size='20' type='text' name="cardNumber" id="cardNumber">
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Billing Address</label>
							<input autocomplete='off' class='form-control' size='20' type='text' name="billingAddress" id="billingAddress">
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-12 form-group card required'>
							<label class='control-label'>Contact Number</label>
							<input autocomplete='off' class='form-control' size='20' type='tel' name="contactNumber" id="contactNumber">
						</div>
					</div>
					<div class='form-row'>
						<div class='col-xs-4 form-group cvc required'>
							<label class='control-label'>CVC</label>
							<input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc" id="cvc">
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'>Expiration</label>
							<input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'name="cardExpiryMonth">
						</div>
						<div class='col-xs-4 form-group expiration required'>
							<label class='control-label'> </label>
							<input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="cardExpiryYear">
						</div>
					</div>


					<div class='form-row'>
						<div class='col-md-12 form-group'>
							<hr class="featurette-divider"></hr>
							<button class='form-control btn btn-success submit-button' disabled><span class="badge">Your total today: <?php echo $_SESSION['totalPayment'] ?></php></span></button>
							<button class='form-control btn btn-primary submit-button' type='submit'> Pay »</button>

						</div>
					</div>

					<div class='form-row'>
						<div class='col-md-12 error form-group hide'>
							<div class='alert-danger alert'>
								Please correct the errors and try again.
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class='col-md-4'></div>
		</div>
	</div>
	<br>
	<div class="panel panel-danger"></div>
	<script src="js/paymentValidation.js" type="text/javascript"></script>


<?php

	if($_REQUEST['submit'])
	{
		require_once("./includes/purchase.class.php");
		$cardName = $_REQUEST['cardName'];
		$cardNumber = $_REQUEST['cardNumber'];
		$billingAddress = $_REQUEST['billingAddress'];
		$cvc = $_REQUEST['cvc'];
		$contactNumber = $_REQUEST['contactNumber'];
		$cardExpiryMonth = $_REQUEST['cardExpiryMonth'];
		$cardExpiryYear =$_REQUEST['cardExpiryYear'];

		$purchase = new Purchase();
		$purchase->setCardName($cardName);
		$purchase->setCreditCardNumber($cardNumber);
		$purchase->setDeliveryAddress($billingAddress);
		$purchase->setCvc($cvc);


	}
// ---------------------------------------------
	$footerContent = $webPage->addFooter();
	echo $footerContent;
?>