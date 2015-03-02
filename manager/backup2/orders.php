<?php

require('header.php');

if(isset($_SESSION['restaurantId']))
{
  $restaurantId2 = $_SESSION['restaurantId'];
}

echo "<div class='right-button-margin'>";
  echo "<a href='index.php' class='btn btn-default pull-right'>Show orders</a>";
  echo "</div>";




  echo "<table class='table table-hover table-responsive table-bordered'>";
  echo "<tr>";
    echo "<th>Order Id</th>";
    echo "<th>Full Name</th>";
    echo "<th>Email</th>";
    echo "<th>Actions</th>";
  echo "</tr>";
$users = new ShoppingCart();
  $allUsers = $users->getAllUsers();
  foreach ($allUsers as $singleUser) {

    echo "<tr>";

      echo "<td>{$singleUser['user_id']}</td>";
      echo "<td>{$singleUser['fullName']}</td>";
      echo "<td>{$singleUser['email']}</td>";

      echo "<td>";
      echo "<a delete-id='{$singleUser['user_id']}' class='btn btn-default delete-object'>Delete</a>";
      echo "</td>";

    echo "</tr>";
  }


  echo "</table>";


require('footer.php');
