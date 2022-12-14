<?php

  include('config.php');

  //check is submit button is clicked
  if(isset($_POST['signin']))
  {
      //catches user/password submitted by html form
      $username = $_POST['username'];
      $password = $_POST['password'];

      //Check if the htmls form is filled
      if (empty($_POST['username']) || empty ($_POST['password'])){
          $warning = "Fill all the fields!";
          $_SESSION['warning'] = $warning;
      }
// if the user is admin
      // if () {
      //   $is_admin, $is_driver,
      // }

      else {

          $sql = "SELECT * FROM user WHERE username=:username AND is_active = 1 LIMIT 1";
          $stmt = $dbconnect->prepare($sql);

          /* Execute the Query */
          $stmt->bindparam(':username', $username);
          $stmt->execute();

          /* Store Returned Data from query into array */
          $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

          /*Get number of Return Rows */
          $count_row = $stmt->rowCount();

          if ($count_row == 1) {
            $_SESSION['UserID'] = $user_data['user_id'];
            $_SESSION['FullName'] =$user_data["first_name"];
            if ($user_data['is_admin']== 0) {
              if ($user_data['is_driver/manager']== 1) {
                header("location:../management-dashboard");
              }else {
                header("location:../driver-dashboard");
              }
            }else {
              if ($user_data['is_admin']== 1) {
                if(password_verify($password, $user_data['password'])) {
                  header("location:../user-dashboard");
                }
                else {
                  $error ="Wrong password";
                  $_SESSION['error'] = $error;
                }
              }
            }
          }
          else {
            $error ="Wrong username";
            $_SESSION['error'] = $error;
          }

      }
  }
