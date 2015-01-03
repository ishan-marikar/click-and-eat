<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/24/2014 at 9:05 AM
 * Project name : FinalProjectClickAndEat
 */
include_once("includes/webpage.class.php");
include_once("includes/restaurants.class.php");
session_start();

$restaurantsInstance = new \FinalProject\Restaurants();
$allRestaurants = $restaurantsInstance->getAllRestaurants();
$webPage = new \FinalProject\WebPage("Restaurants");

$headerContent = $webPage->addHeader();
echo $headerContent;
//--------------------------------------------------
// Content
// if no id is set, then show them all the restaurants
?>

<?php if(!isset($_REQUEST['id'])){?>
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
                       <h4><a href="<?php echo "Restaurants.php?id=".$restaurant['Restaurant_ID'] ?>"><?php echo $restaurant['Restaurant_Name'] ?></a></h4>
                   </div>
                   <div class="rating">
                       <p><?php echo $restaurant['Address'] ?></p>
                       <p><?php echo $restaurant['Contact'] ?></p>

                       <span>Ratings</span>
                       <a href="#"> <img src="./images/star<?php echo trim($restaurant['rating']) ?>.png" class="img-responsive" alt="<?php echo $restaurant['rating'] ?>"></a>
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

        if(is_numeric($_REQUEST['id'])) {
            $restaurantID = $_REQUEST['id'];
            $restaurantsInstance->getRestaurantDetails($restaurantID);
    ?>
            <div class="container Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">
                <div class="col-md-3 restaurent-logo">
                    <img src="<?php echo $restaurantsInstance->getRestaurantLogo() ?>" class="img-responsive" alt="" />
                </div>
                <div class="col-md-2">
                    <div class="logo-title">
                        <h1><a href="<?php echo "Restaurants.php?id=".$restaurantsInstance->getRestaurantID()?>"><?php echo $restaurantsInstance->getRestaurantName() ?></a></h1>
                    </div>
                    <div class="rating">
                        <p><strong>Location:</strong> <?php echo $restaurantsInstance->getRestaurantAddress() ?></p>
                        <p><strong>Hotline:</strong> <?php echo $restaurantsInstance->getRestaurantContact() ?></p>

                        <span>Ratings</span>
                        <a href="#"> <img src="./images/star<?php echo trim($restaurantsInstance->getRestaurantRating()) ?>.png" class="img-responsive" alt="<?php echo trim($restaurantsInstance->getRestaurantRating()) ?>"></a>
                    </div>

                </div>

            </div>
            <div class="container wow fadeInRight" data-wow-delay="0.4s">
                <h1>Menu</h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>French Fries</td>
                        <td>Rs. 120</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Submarine</td>
                        <td>Rs. 180</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Chicken Bucket</td>
                        <td>Rs. 200</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pizza</td>
                        <td>Rs. 400</td>
                        <td><a href="">Add to Cart</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>

<?php }
    } ?>
<?php
//--------------------------------------------------
$footerContent = $webPage->addFooter();
echo $footerContent;
?>