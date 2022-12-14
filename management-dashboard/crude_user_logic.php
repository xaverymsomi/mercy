<?php include('../includes/connection.php');;

if (isset($_POST['delete_user'])) {
    $id = $_POST['user_id'];

    $delete_driver = mysqli_query($conn, "DELETE FROM user WHERE user_id='$id' ");

    //if user deleted successfully
    if ($delete_driver) {
        $_SESSION['success'] = "User " . $id . " Deleted Successfully";
        header('location:user.php');
    } else {
        $_SESSION['Error'] = "Fail please try agan";
        header('location:user.php');
    }
}

// edit user
elseif (isset($_POST['edit_user'])) {

    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $update_user = mysqli_query($conn, "UPDATE user SET 
        first_name='$first_name', last_name='$last_name', email='$email', username='$username'
        WHERE user_id = '$user_id'");

    //if user updated successfully
    if ($update_user) {
        $_SESSION['success'] = "User Updated " . $user_id . " Successfully";
        header('location:user.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:user.php');
    }
}

// activate user to admin
elseif (isset($_GET['admin'])) {

    $user_id = $_GET['admin'];

    $admin_user = mysqli_query($conn, "UPDATE user SET is_admin = 1 WHERE user_id = '$user_id'");

    //if user updated successfully
    if ($admin_user) {
        $_SESSION['success'] = "User Updated " . $user_id . " Successfully";
        header('location:user.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:user.php');
    }
}

// deactivate user from admin
elseif (isset($_GET['not_admin'])) {

    $user_id = $_GET['not_admin'];

    $admin_user = mysqli_query($conn, "UPDATE user SET is_admin = 0 WHERE user_id = '$user_id'");

    //if user updated successfully
    if ($admin_user) {
        $_SESSION['success'] = "User Updated " . $user_id . " Successfully";
        header('location:user.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:user.php');
    }
}

// activate user
elseif (isset($_GET['activate'])) {

    $user_id = $_GET['activate'];

    $admin_user = mysqli_query($conn, "UPDATE user SET is_active = 1 WHERE user_id = '$user_id'");

    //if user updated successfully
    if ($admin_user) {
        $_SESSION['success'] = "User Updated " . $user_id . " Successfully";
        header('location:user.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:user.php');
    }
}

// deactivate user account
elseif (isset($_GET['deactivate'])) {

    $user_id = $_GET['deactivate'];

    $admin_user = mysqli_query($conn, "UPDATE user SET is_active = 0 WHERE user_id = '$user_id'");

    //if user updated successfully
    if ($admin_user) {
        $_SESSION['success'] = "User Updated " . $user_id . " Successfully";
        header('location:user.php');
    } else {
        $_SESSION['error'] = "Fail please try again";
        header('location:user.php');
    }
}