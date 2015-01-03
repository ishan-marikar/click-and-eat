<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/23/2014 at 5:59 PM
 * Project name : FinalProjectClickAndEat
 *
 * When I wrote this, only God and I understood what I was doing.
 * Now, God only knows.
 *
 * For the brave souls who get this far: You are the chosen ones,
 * the valiant knights of programming who toil away, without rest,
 * fixing our most awful code. To you, true saviors, kings of men,
 * I say this: never gonna give you up, never gonna let you down,
 * never gonna run around and desert you. Never gonna make you cry,
 * never gonna say goodbye. Never gonna tell a lie and hurt you.
 */

include_once("includes/webpage.class.php");

$webPage = new \FinalProject\WebPage("Home");
$headerContent = $webPage->addHeader();
echo $headerContent;
// ---------------------------------------------
?>

 <div class="banner wow fadeInUp" data-wow-delay="0.4s" id="Home">
            <div class="container">
                <div class="banner-info">
                    <div class="banner-info-head text-center wow fadeInLeft" data-wow-delay="0.5s">
                        <h1>Order from a variety of restaurants</h1>
                        <div class="line">
                            <h2> Order from us</h2>
                        </div>
                    </div>
                    <div class="form-list wow fadeInRight" data-wow-delay="0.5s">
                        <form>
                            <!--<ul class="navmain">-->
                            <!--<li>--><span>Location Name</span>
                            <input type="text" class="text" id="search-location" value="Secunderabad" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Secunderabad';}" autocomplete>
                            <!--</li>-->
                            <!--<li><span>Restaurant Name</span>
               <input type="text" class="text" id="search-restaurant"value="Swagath Grand" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Swagath Grand';}">
              </li>
              <li><span>Cuisine Name</span>
               <input type="text" class="text" id="search-food" value="Chicken Biriyani" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Chicken Biriyani';}">
                </li>-->
                            </ul>

                            <div class="srch">
                                <button></button>
                            </div>
                        </form>
                    </div>
                    <script src="./js/jquery.autocomplete.js"></script>
                    <!-- start search-->
                    <!--<div class="main-search">
          <form action="search.html">
             <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
              <input type="submit" value=""/>
          </form>
          <div class="close"><img src="./images/cross.png" /></div>
      </div>-->
                    <!--<script type="text/javascript">
           $('.main-search').hide();
          $('button').click(function (){
              $('.main-search').show();
              $('.main-search text').focus();
          }
          );
          $('.close').click(function(){
              $('.main-search').hide();
          });
      </script>
        -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-section-ends -->
    <!-- content-section-starts -->
    <div class="content">
        <div class="ordering-section" id="Order">
            <div class="container">
                <div class="ordering-section-head text-center wow bounceInRight" data-wow-delay="0.4s">
                    <h3>Ordering food was never so easy</h3>
                    <div class="dotted-line">
                        <h4>Just 4 steps to follow </h4>
                    </div>
                </div>
                <div class="ordering-section-grids">
                    <div class="col-md-3 ordering-section-grid">
                        <div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s" ">
              <i class="one "></i><br>
              <i class="one-icon "></i>
              <p>Choose <span>Your Restaurant</span></p>
              <label></label>
            </div>
          </div>
          <div class="col-md-3 ordering-section-grid ">
            <div class="ordering-section-grid-process wow fadeInRight " data-wow-delay="0.4s "">
                            <i class="two"></i>
                            <br>
                            <i class="two-icon"></i>
                            <p>Order <span>Your Cuisine</span>
                            </p>
                            <label></label>
                        </div>
                    </div>
                    <div class="col-md-3 ordering-section-grid">
                        <div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s" ">
              <i class="three "></i><br>
              <i class="three-icon "></i>
              <p>Pay   <span> online / on delivery</span></p>
              <label></label>
            </div>
          </div>
          <div class="col-md-3 ordering-section-grid ">
            <div class="ordering-section-grid-process wow fadeInRight " data-wow-delay="0.4s "">
                            <i class="four"></i>
                            <br>
                            <i class="four-icon"></i>
                            <p>Enjoy <span>your food </span>
                            </p>
                        </div>
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
                                        <img src="./images/p1.jpg" class="img-responsive" alt="" />
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
                                        <img src="./images/p2.jpg" class="img-responsive" alt="" />
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
                                        <img src="./images/p3.jpg" class="img-responsive" alt="" />
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
                                        <img src="./images/p2.jpg" class="img-responsive" alt="" />
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
                                    autoPlay: false,
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
                        <script type="text/javascript" src="./js/jquery.flexisel.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-restaurents" id="Popular-Restaurants">
            <div class="container">
                <div class="col-md-4 top-restaurents">
                    <div class="top-restaurent-head">
                        <h3>Top Restaurants</h3>
                    </div>
                    <div class="top-restaurent-grids">
                        <div class="top-restaurent-logos">
                            <div class="res-img-1 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-1.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="res-img-2 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-2.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="res-img-1 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-3.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="res-img-2 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-4.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="res-img-1 nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-5.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="res-img-2 nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                                <img src="./images/restaurent-6.jpg" class="img-responsive" alt="" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 top-cuisines">
                    <div class="top-cuisine-head">
                        <h3>Top Cuisines</h3>
                    </div>
                    <div class="top-cuisine-grids">
                        <div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine1.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine2.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine3.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid nth-grid wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine4.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine5.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine6.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine7.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="top-cuisine-grid nth-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
                            <a href="">
                                <img src="./images/cuisine8.jpg" class="img-responsive" alt="" />
                            </a>
                            <label>Cuisine Name</label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="service-section">
            <div class="service-section-top-row">
                <div class="container">
                    <div class="service-section-top-row-grids wow bounceInLeft" data-wow-delay="0.4s">
                        <div class="col-md-3 service-section-top-row-grid1">
                            <h3>Enjoy Exclusive Food Order any of these</h3>
                        </div>
                        <div class="col-md-2 service-section-top-row-grid2">
                            <ul>
                                <li><i class="arrow"></i>
                                </li>
                                <li class="lists">Party Orders</li>
                            </ul>
                            <ul>
                                <li><i class="arrow"></i>
                                </li>
                                <li class="lists">Home Made Food</li>
                            </ul>
                            <ul>
                                <li><i class="arrow"></i>
                                </li>
                                <li class="lists">Diet Food</li>
                            </ul>
                        </div>
                        <div class="col-md-5 service-section-top-row-grid3">
                            <img src="./images/lunch.png" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 service-section-top-row-grid4 wow swing animated" data-wow-delay="0.4s">
                            <input type="submit" value="Order Now">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="service-section-bottom-row">
                <div class="container">
                    <div class="col-md-4 service-section-bottom-grid wow bounceIn " data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="./images/icon1.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="icon-data">
                            <h4>100% Service Guarantee</h4>
                            <p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 service-section-bottom-grid wow bounceIn " data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="./images/icon2.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="icon-data">
                            <h4>Fully Secure Payment</h4>
                            <p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 service-section-bottom-grid wow bounceIn " data-wow-delay="0.2s">
                        <div class="icon">
                            <img src="./images/icon3.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="icon-data">
                            <h4>Track Your Order</h4>
                            <p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit.</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

<?php
// ---------------------------------------------
$footerContent = $webPage->addFooter();
echo $footerContent;
?>