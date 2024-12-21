<?php
require_once("../controller/controller.php");
class UserController extends Controller{

public function login()
{
  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];
  $this->model->login($email,$password);
}

// public function rating()
// {
//   $username=$_REQUEST['username'];
//   $feedback=$_REQUEST['feedback'];
//   $this->model->submitFeedback($username,$feedback);
// }

}
?>