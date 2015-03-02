<?php 
session_start();
require("..\includes\database.class.php")
if(isset($_POST))
{
  $username = $_POST['email'];
  $password = $_POST['password'];

  $database = new Database();
  $sql = "SELECT * FROM manager WHERE username = :username AND password = :password";
  $parameter = array(
      ":username" => $email,
      ":password" => $password
    );

  $results = $database->query($sql, $parameter);
  if($results)
  {
    $_SESSION['managerIsLogged'] = true;
    header("Location: /administrator/index.php");
  }
  else
  {
    echo "alert('Your username or password is invalid.');";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Click&Eat | Dashboard - Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="panel panel-info" >
        <div class="panel-heading">
          <div class="panel-title">Sign In - Administrative Portal</div>
          <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >

          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form id="loginform" class="form-horizontal" role="form" method="POST">

            <input type="hidden" name="action" value="signin">
            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="email" class="form-control" name="email" value="" placeholder="username or email">
            </div>

            <div style="margin-bottom: 25px" class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="password">
            </div>



            <div class="input-group">
              <div class="checkbox">
                <label>
                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                </label>
              </div>
            </div>


            <div style="margin-top:10px" class="form-group">
              <!-- Button -->

              <div class="col-sm-12 controls">
                <input type="submit" id="btn-login" href="#" class="btn btn-success" value="login">

              </div>
            </div>


            <div class="form-group">
              <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                  Don't have an account!
                  <a href="register.php" href="register.php">
                    Sign Up Here
                  </a>
                </div>
              </div>
            </div>
          </form>



        </div>
      </div>
    </div>
    </div>
</div>
            <!-- /.container-fluid -->
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
