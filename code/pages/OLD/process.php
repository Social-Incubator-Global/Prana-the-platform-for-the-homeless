<?php
    /*session_start();
    include('../config.php');
    include('../phpinclude/module_sql.php');

    //get values passed from login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query the database for user
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    // $result = $link->query($sql);
    $result = query_($query);

    //if there is no username and password in database, display error message and go back to index

    if (!$row = mysqli_fetch_assoc($result)) {
        echo 'Password or Username is incorrect<br><br>';
        echo '<a href="login.php">Try again</a>';
        header("Location: login.php");
    } else {

        // if there is a matching username and password in the database
        // Set session
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];

        // ...and the Cookie
		    // $secret = ran( 30 );
        // setcookie('secret', $secret, time() + 3600*24*14);

        // update cookie in database
        // $sql_update_cookie = "UPDATE users SET cookie = '$secret' WHERE usr = '$username'";
        // $link->query($sql_update_cookie);

        // display success message
        // echo 'Success';

        // set logged in
        $_SESSION['logged_in'] = true;

        // redirect!
        header("Location: home.php");
    }*/
?>
