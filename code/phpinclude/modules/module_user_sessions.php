<?php

function new_user($uname, $password, $user_type)
{
    if(!check_user_exists($uname))
    {
        $pwd = password_hash($password, PASSWORD_DEFAULT);
        unset($password);

        $random = verifyRandomString(generateRandomString(), "user_details", "onboard_key");
        $random2 = verifyRandomString(generateRandomString(), "users", "email_confirm_token");
        sql_set("users", "DEFAULT, '".$uname."', '".$pwd."', '', 'false','".$random2."'");
        sql_set("user_details", "DEFAULT, '".$uname."', '".$user_type."', '".$random."', 'false', 'false'");
        sql_set("user_information_customer", "DEFAULT, '".$uname."', '', '', '', '', ''");
		send_email($uname, "Cleanery: Confirm your email address - DO NOT REPLY", "<html>Hi ".$uname."!<br><br>You have been successfully signed up. We now need to confirm your email address by clicking on the button below.<br><br><a href='www.cleanery.de/pages/account/confirm.php?ky=".$random2."'><input type='button' value='Confirm my email address'></input></a><br><br>Cheers!<br>The Cleanery team</html>");    
        return true;
    }
    else
    {
        return false;
    }
}

function forgot_password($uname)
{
    $random = verifyRandomString(generateRandomString(), "forgot_password", "forgot_token");
    if(!check_forgotten_exists($uname))
    {
        sql_set("forgot_password", "DEFAULT, '".$uname."', '".$random."'");
    }
    else
    {
        sql_update("forgot_password", "uname='".$uname."'", "forgot_token='".$random."'");
    }

    send_email($uname, "Cleanery - Reset your password", "<HTML>Hi ".$uname."!,<br><br>You seem to have forgotten your password. Click on the button below to reset your password.<br><br><a href='www.cleanery.de/pages/account/reset.php?ky=".$random."'><input type='button' value='Reset my password'></input></a><br><br>Cheers!<br>The Cleanery team");

    return;
}

function reset_password($key, $password)
{
    $row = return_first_row(sql_get("forgot_password", "forgot_token='".$key."'"));
    sql_update("users", "uname='".$row["uname"]."'", "pwd='".to_hash("", $password)."'");
    sql_delete("forgot_password", "forgot_token='".$key."'");
    return;
}

function confirm_email()
{
    return;
}

function login($uname, $password)
{
    $row = return_first_row(sql_get("users", "uname='".$uname."'"));
    if($row == null)
    {
        //returns 0 when a user row in the db is not found
        return false;
    }
    
    if(verify_password($row["pwd"], $password) != 1)
    {
        //returns 0 when the password is incorrect
        return false;
    }

    $random = verifyRandomString(generateRandomString(), "users", "login_token");

    //CREATE SESSION TOKEN
    sql_update("users", "uname='".$uname."'", "login_token='".$random."'");

    //set_cookie("cleanery_login", $random);

    $_SESSION['logged_in'] = true;
    unset($password);
    return $random;
}

function mock_signup()
{
    sql_set("users", "1, 'oscartark91@gmail.com', '".password_hash("mock", PASSWORD_DEFAULT)."', ''");
    return;
}

function logout($token)
{
    sql_update("users", "login_token='".$uname."'", "login_token=''");
    $_SESSION['logged_in'] = false;
    return true;
}

function check_user_exists($uname)
{
    if(ifnull(return_first_row(sql_get("users","uname='".$uname."'"))))
    {
        return false;
    }
    return true;
}

function check_joining_exists($uname)
{
    if(ifnull(return_first_row(sql_get("`joining_details`","`1`='".$uname."'"))))
    {
        return false;
    }
    return true;
}

function check_forgotten_exists($uname)
{
    if(ifnull(return_first_row(sql_get("forgot_password","uname='".$uname."'"))))
    {
        return false;
    }
    return true;
}

function throwout()
{
    echo("<script>document.location='../access.php';</script>");
}

function verify_contract_agb_signed($uname)
{
    $row = return_first_row(sql_get("user_details" ,"uname='".$uname."'"));
    if($row['agb_accepted'] == 'false')
    {
        js_execute('show_overground_informable();');
        js_execute('overground_window(2, "accept", "AJAX(418);");');
    }
    return;
}

function accept_agb()
{
    //sql_update();
    return;
}

function post_login($level, $login_result)
{
    if($login_result != '')
    {
        echo("<script>document.location='./account/account.php?ky=".$login_result."';</script>");
    }
    else
    {
        echo("<script>wrong_email(8411);</script>");
    }
    return;
}

function token_verify($token)
{
    if(ifnull(return_first_row(sql_get("users", "login_token='".$token."'"))['uname']))
    {
        throwout();
    }
    return true;
}

function get_uname_fromtoken($token)
{
    return return_first_row(sql_get("users","login_token='".$token."'"))["uname"];
}

function verify_user_type($uname)
{
    $row = return_first_row(sql_get("user_details", "uname='".$uname."'"));
    return $row["user_type"];
}

function verify_user_type_by_token($key)
{
    $row = return_first_row(sql_get("users", "login_token='".$key."'"));
    $u_type = verify_user_type($row["uname"]);
    return $u_type;
}

function set_login($name)
{
    return set_cookie($name);
}

function continue_login($name)
{
    //TOKEN VERIFY REQUIRED --> IMPLEMENT TOKEN VERIFIED HERE
    return get_cookie($name);
    //return token_verify(get_cookie($name));
}
?>