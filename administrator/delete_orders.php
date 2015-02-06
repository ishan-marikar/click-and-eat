<?php

require_once("../includes/users.class.php");
if($_POST)
{
  $users = new \FinalProject\Users();
  $users->deleteUser($_REQUEST['object_id']);
}