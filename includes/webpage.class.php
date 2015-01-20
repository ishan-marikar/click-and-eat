<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 12/23/2014 at 3:46 PM
 * Project name : FinalProjectClickAndEat
 */

/**
 * Apologies in advance for the poor state of this class. I didn't know of any other way of using
 * this way instead of having to resort to Model-View-Controller.
 * -Ishan (Lead Developer)
 **/

namespace FinalProject;
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
ini_set('display_errors','on');
require_once("database.class.php");

class WebPage extends Database
{

	var $siteName;
	var $copyrightYear;
	var $developedBy;
	var $title;

	public function __construct( $title )
	{
		$this->copyrightYear = date("Y");
		$this->developedBy = "Team B - ICBT City Campus";
		$this->siteName = "Click&Eat";
		$this->title = $title;
	}

	private function init()
	{
		session_start();
		if(!isset($_SESSION))
		{

			$_SESSION['isLogged'] = false;
			$_SESSION['email'] = '';
			$_SESSION['currentUserID'] = null;
			$_SESSION['fullName'] = null;
			$_SESSION['permissions'] = null;
		}
	}


	public function addHeader()
	{
		$this->init();
		$content = "<!DOCTYPE html> ";
		$content .= "<html> ";
		$content .= "<head> ";
		$content .= "<title>{$this->title} | {$this->siteName}</title> ";
		$content .= "<link href='/css/bootstrap.css' rel='stylesheet' type='text/css' /> ";
		$content .= "<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> ";
		$content .= "<script src='/js/jquery.min.js'></script> ";
		$content .= "<!-- Custom Theme files --> ";
		$content .= "<link href='/css/style.css' rel='stylesheet' type='text/css' media='all' /> ";
		$content .= "<!-- Custom Theme files --> ";
		$content .= "<meta name='viewport' content='width=device-width, initial-scale=1'> ";
		$content .= "<script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }</script> ";
		$content .= "<!--webfont--> ";
		$content .= "<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'> ";
		$content .= "<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'> ";
		$content .= "<!--Animation--> ";
		$content .= "<script src='/js/wow.min.js'></script> ";
		$content .= "<link href='/css/animate.css' rel='stylesheet' type='text/css' /> ";
		$content .= "<script> ";
		$content .= "new WOW().init(); ";
		$content .= "</script> ";
		$content .= "<script type='text/javascript' src='/js/move-top.js'></script> ";
		$content .= "<script type='text/javascript' src='/js/easing.js'></script> ";
		$content .= "<script type='text/javascript'> ";
		$content .= "jQuery(document).ready(function($) { ";
		$content .= "$('.scroll').click(function(event){		 ";
		$content .= "event.preventDefault(); ";
		$content .= "$('html,body').animate({scrollTop:$(this.hash).offset().top},1200); ";
		$content .= "}); ";
		$content .= "}); ";
		$content .= "</script> ";
		$content .= "</head> ";
		$content .= "<body> ";
		$content .= "<!-- header-section-starts --> ";
		$content .= "<div class='header'> ";
		$content .= "<div class='container'> ";
		$content .= "<div class='top-header'> ";
		$content .= "<div class='logo'> ";
		$content .= "<a href='./index.php'><img src='/images/logo.png' class='img-responsive' alt='' /></a> ";
		$content .= "</div> ";
		$content .= "<div class='queries'> ";
		$content .= "<p>Questions? Call us!<span>777-830-757 </span><label>(11AM to 11PM)</label></p> ";
		$content .= "</div> ";
		$content .= "<div class='clearfix'></div> ";
		$content .= "</div> ";
		$content .= "</div> ";
		$content .= "<div class='menu-bar'> ";
		$content .= "<div class='container'> ";
		$content .= "<div class='top-menu'> ";
		$content .= "<ul> ";
		$content .=  $this->addNavigationBar();
		$content .= "</ul> ";
		$content .= "</div> ";
		$content .= "<div class='login-section'> ";
		$content .= "<ul> ";
		if(isset($_SESSION['isLogged']) and $_SESSION['isLogged'] == true) {

			$content .= "<li><a href='#'>{$_SESSION['fullName']}</a>  </li> | ";
			$content .= "<li><a href='./includes/functions.php?action=logout'>Sign-out</a> </li> | ";
		}
		else {
			$content .= "<li><a href='#sign-in' data-toggle='modal' data-target='#signinModal'>Login</a>  </li> | ";
			$content .= "<li><a href='./register'>Register</a> </li> | ";
		}
		$content .= "<li><a href='#'>Help</a></li> ";
		$content .= "<div class='clearfix'></div> ";
		$content .= "</ul> ";
		$content .= "</div> ";
		$content .= "<div class='clearfix'></div> ";
		$content .= "</div> ";
		$content .= "</div> ";
		$content .= "</div> ";

		return $content;
	}

	private function addNavigationBar()
	{
		$sql = "SELECT * from pages";
		$queryParameters = ""; // No parameters yet
		$result = $this->query($sql, $queryParameters);
		$content = "";
		foreach ($result as $pages) {
			if ($this->title == $pages['pageTitle']) {
				$content .= "<li class='active'><a href='./{$pages['pageLocation']}'>{$pages['pageTitle']}</a></li>";
			} else {
				$content .= "<li><a href='./{$pages['pageLocation']}'>{$pages['pageTitle']}</a></li>";
			}
		}
		$content .= "<div class='clearfix'></div>";

		return $content;
	}

	public function addFooter()
	{
		$content = "<div class='contact-section' id='contact'>";
		$content .= "<div class='container'>";
		$content .= "<div class='contact-section-grids'>";
		$content .= "<div class='col-md-3 contact-section-grid wow fadeInLeft' data-wow-delay='0.4s'>";
		$content .= "<h4>Site Links</h4>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>About Us</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Contact Us</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Privacy Policy</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Terms of Use</a></li>";
		$content .= "</ul>";
		$content .= "</div>";
		$content .= "<div class='col-md-3 contact-section-grid wow fadeInLeft' data-wow-delay='0.4s'>";
		$content .= "<h4>Site Links</h4>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>About Us</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Contact Us</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Privacy Policy</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='point'></i></li>";
		$content .= "<li class='data'><a href='#'>Terms of Use</a></li>";
		$content .= "</ul>";
		$content .= "</div>";
		$content .= "<div class='col-md-3 contact-section-grid wow fadeInRight' data-wow-delay='0.4s'>";
		$content .= "<h4>Follow Us On...</h4>";
		$content .= "<ul>";
		$content .= "<li><i class='fb'></i></li>";
		$content .= "<li class='data'> <a href='#'>  Facebook</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='tw'></i></li>";
		$content .= "<li class='data'> <a href='#'>Twitter</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='in'></i></li>";
		$content .= "<li class='data'><a href='#'> Linkedin</a></li>";
		$content .= "</ul>";
		$content .= "<ul>";
		$content .= "<li><i class='gp'></i></li>";
		$content .= "<li class='data'><a href='#'>Google Plus</a></li>";
		$content .= "</ul>";
		$content .= "</div>";
		$content .= "<div class='col-md-3 contact-section-grid nth-grid wow fadeInRight' data-wow-delay='0.4s'>";
		$content .= "<h4>Subscribe Newsletter</h4>";
		$content .= "<p>To get latest updates and food deals every week</p>";
		$content .= "<input type='text' class='text' value='' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = '';}'>";
		$content .= "<input type='submit' value='submit'>";
		$content .= "</div>";
		$content .= "<div class='clearfix'></div>";
		$content .= "</div>";
		$content .= "</div>";
		$content .= "</div>";
		$content .= "<!-- content-section-ends -->";
		$content .= "<!-- footer-section-starts -->";
		$content .= "<div class='footer'>";
		$content .= "<div class='container'>";
		$content .= "</div>";
		$content .= "<p class='wow fadeInLeft' data-wow-delay='0.4s'>&copy; {$this->copyrightYear} {$this->siteName} | Developed by {$this->developedBy} </p>";
		$content .= "</div>";
		$content .= "<!-- footer-section-ends -->";
		$content .= "<script type='text/javascript'>";
		$content .= "$(document).ready(function() {";
		$content .= "/*";
		$content .= "var defaults = {";
		$content .= "containerID: 'toTop', // fading element id";
		$content .= "containerHoverID: 'toTopHover', // fading element hover id";
		$content .= "scrollSpeed: 1200,";
		$content .= "easingType: 'linear'";
		$content .= "};";
		$content .= "*/";
		$content .= "$().UItoTop({ easingType: 'easeOutQuart' });";
		$content .= "});";
		$content .= "</script>";
		$content .= "<a href='#' id='toTop' style='display: block;'> <span id='toTopHover' style='opacity: 1;'> </span></a>";

		$content .= "<div class='modal fade' id='signinModal' tabindex='-1' role='dialog' aria-labelledby='basicModal' aria-hidden='true'> ";
		$content .= "    <div class='modal-dialog'>";
		$content .= "      <div class='modal-content'>";

		$content .= "        <div class='modal-header'>";
		$content .= "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
		$content .= "          <h2 class='modal-title' id='myModalLabel'>Sign in</h2>";
		$content .= "        </div>";
		$content .= "          <form class='form-horizontal' id='register-form' name='login' action='./includes/functions.php' onsubmit='return validateLoginForm();'>";
		$content .= "            <div class='modal-body'>";
		$content .= "            <fieldset>";
		$content .= "              <!-- Text input-->";
		$content .= "              <div class='form-group'>";
		$content .= "                <label class='col-md-4 control-label' for='email'>Email:</label>";
		$content .= "                <div class='col-md-5'>";
		$content .= "                <input id='email' name='email' type='text' placeholder='username' class='form-control input-md' required=''>";
		$content .= "                </div>";
		$content .= "              </div>";
		$content .= "              <!-- Text input-->";
		$content .= "              <div class='form-group'>";
		$content .= "                <label class='col-md-4 control-label' for='password'>Password:</label>";
		$content .= "                <div class='col-md-5'>";
		$content .= "                <input id='password' name='password' type='password' placeholder='password' class='form-control input-md' required=''>";
		$content .= "                </div>";
		$content .= "              </div>";
		$content .= "                <input type='hidden' name='action' value='signin'>";
		$content .= "            </fieldset>";
		$content .= "        </div>";
		$content .= "        <div class='modal-footer'>";
		$content .= "          <button class='btn btn-danger' data-dismiss='modal' aria-hidden='true'>Cancel</button>";

		$content .= "            <input type='submit' class='btn btn-success' id='signin-button' value='Sign In'>";
		$content .= "        </div>";
		$content .= "          </form>";


		$content .= "<script src='./js/bootstrap.min.js'></script>";
		$content .= "</body>";
		$content .= "</html>";
		return $content;
	}
} 