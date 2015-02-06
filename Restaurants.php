<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/24/2014 at 9:05 AM
 * Project name : FinalProjectClickAndEat
 */
include_once("includes/webpage.class.php");
include_once("includes/restaurants.class.php");
  $page = $_SERVER['PHP_SELF'];

// or use $_SERVER['PHP_SELF']

  include ( './includes/libraries/counter/counter.php');
  addinfo($page);
$restaurantsInstance = new \FinalProject\Restaurants();
$webPage = new \FinalProject\WebPage("Restaurants");

$headerContent = $webPage->addHeader();
echo $headerContent;
//--------------------------------------------------
// Content
// if no id is set, then show them all the restaurants
?>
<?php if(!isset($_REQUEST['id']) && !isset($_REQUEST['query'])){
	$allRestaurants = $restaurantsInstance->getAllRestaurants();
	?>
<div class="Popular-Restaurants-content">

  <div class="Popular-Restaurants-grids">
       <?php foreach($allRestaurants as $restaurant){?>
       <div class="container">
           <div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
               <div class="col-md-3 restaurent-logo">
                   <img src="<?php echo $restaurant['restaurantLogo'] ?>" class="img-responsive" alt="" />
               </div>
               <div class="col-md-2 restaurent-title">
                   <div class="logo-title">
                       <h4><a href="<?php echo "?id=".$restaurant['Restaurant_ID'] ?>"><?php echo $restaurant['Restaurant_Name'] ?></a></h4>
                   </div>
                   <div class="rating">
                       <p><?php echo $restaurant['Address'] ?></p>
                       <p><?php echo $restaurant['Contact'] ?></p>

                       <span>Ratings</span>
                       <a href="#"> <img src="/images/star<?php echo trim($restaurant['rating']) ?>.png" class="img-responsive" alt="<?php echo $restaurant['rating'] ?>"></a>
                   </div>
               </div>
               <div class="col-md-7 buy">
                   <a href="<?php echo "?id=".$restaurant['Restaurant_ID'] ?>"><input type="button" value="Order"></a>
               </div>
               <div class="clearfix"></div>
           </div>
       </div>
    <?php }?>
  </div>
</div>
<?php }
	if(isset($_REQUEST['query'])){
	$location = $_REQUEST['query'];
	$allRestaurants = $restaurantsInstance->getRestaurantsByLocation($location);
	?>
		<div class="Popular-Restaurants-content">

			<div class="Popular-Restaurants-grids">
				<?php foreach($allRestaurants as $restaurant){?>
					<div class="container">
						<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
							<div class="col-md-3 restaurent-logo">
								<img src="<?php echo $restaurant['restaurantLogo'] ?>" class="img-responsive" alt="" />
							</div>
							<div class="col-md-2 restaurent-title">
								<div class="logo-title">
									<h4><a href="<?php echo "?id=".$restaurant['Restaurant_ID'] ?>"><?php echo $restaurant['Restaurant_Name'] ?></a></h4>
								</div>
								<div class="rating">
									<p><?php echo $restaurant['Address'] ?></p>
									<p><?php echo $restaurant['Contact'] ?></p>

									<span>Ratings</span>
									<a href="#"> <img src="/images/star<?php echo trim($restaurant['rating']) ?>.png" class="img-responsive" alt="<?php echo $restaurant['rating'] ?>"></a>
								</div>
							</div>
							<div class="col-md-7 buy">
								<input type="button" value="Order">
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
<?php } else {
	if (isset($_REQUEST['id'])) {

		if (is_numeric($_REQUEST['id'])) {
			$restaurantID = $_REQUEST['id'];
			$restaurantsInstance->getRestaurantDetails($restaurantID);
			?>
			<div class="container Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
				<div class="col-md-3 restaurent-logo">
					<img src="<?php echo $restaurantsInstance->getRestaurantLogo() ?>" class="img-responsive" alt=""/>
				</div>
				<div class="col-md-2">
					<div class="logo-title">
						<h1>
							<a href="<?php echo "?id=" . $restaurantsInstance->getRestaurantID() ?>"><?php echo $restaurantsInstance->getRestaurantName() ?></a>
						</h1>
					</div>
					<div class="rating">
						<p><strong>Location:</strong> <?php echo $restaurantsInstance->getRestaurantAddress() ?></p>

						<p><strong>Hotline:</strong> <?php echo $restaurantsInstance->getRestaurantContact() ?></p>

						<span>Ratings</span>
						<a href="#"> <img
								src="/images/star<?php echo trim($restaurantsInstance->getRestaurantRating()) ?>.png"
								class="img-responsive"
								alt="<?php echo trim($restaurantsInstance->getRestaurantRating()) ?>"></a>
					</div>

				</div>

			</div>
			<div class="container wow fadeInRight" data-wow-delay="0.4s">
				<h1>Menu</h1>
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Item ID</th>
				<th>Food Item</th>
				<th>Price</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
				<?php
					$menu = $restaurantsInstance -> getRestaurantMenu($restaurantID);
					foreach ($menu as $food) { ?>
					<tr>
						<td><?php echo $food['mealName'] ?></td>
						<td><?php echo $food['mealDescription'] ?></td>
						<td><?php echo "Rs. " . $food['mealPrice'] ?></td>
          <?php $totalString = "shoppingcart.php?action=add&product_id=".$food['meal_id']."&resId={$restaurantsInstance->getRestaurantID()}";?>
          <td> <a class="btn btn-success" href="<?php echo $totalString ?>">Add to Cart </a></td>
					</tr>
				<?php } ?>
		</tbody>
		</table>
			</div>
		<?php }
	}
	}?>
<?php
//--------------------------------------------------
$footerContent = $webPage->addFooter();
echo $footerContent;
?>