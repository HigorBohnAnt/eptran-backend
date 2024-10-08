<?php
session_start();
if(isset($_SESSION['userdata']))
{
  header('location: ..');
}
?>