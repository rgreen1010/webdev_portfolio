<?php
require_once $mem_db;
defined("VALID_USER") or define("VALID_USER", 1000);
defined("INVALID_USER") or define("INVALID_USER", 1111);
defined("VALID_PASSWORD") or define("VALID_PASSWORD", 2000);
defined("INVALID_PASSWORD") or define("INVALID_PASSWORD", 2111);
defined("MAX_USERNAME_LEN") or define("MAX_USERNAME_LEN", 50);
defined("MAX_PASSWORD_LEN") or define("MAX_PASSWORD_LEN", 250);


/*
 *
 *
 *
 */
function newDBConnect ($servername, $username, $password, $dbname){
        // Create connection '@' supressing warnings
    $conn = @new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        error_log('Member database connection error: ' . mysqli_connect_error());
        die("Member database connection failed: " . $conn->connect_error);
    }
    return $conn;
}

/*
 *
 *
 * simple checks to keep things reasonable 
 */
function validateUser ($inUsername, $inPassword){

    if (( strlen($inUsername) >= MAX_USERNAME_LEN) || 
        (strlen($inPassword) >= MAX_PASSWORD_LEN)){
        return FAILED;
    }

    // check for invalid chars
    if((!ctype_print($inUsername)) || (!ctype_print($inPassword)) {
        return FAILED;
    }
    /*
    if () {
    }
    */

    return PASSED;
}

/*
 *
 *
 *
 */
function authenticateUser ($inUsername, $inPassword){
// validate username and password

    //connect to database
    $dbConn = newDBConnect($mem_servername, $mem_username, $mem_password, $mem_dbname);
    // lookup username in database
    $sql="select ";
        // if found compare encrypted password with stored password(encrypted)
            // if match
                    //return match code
            // else
                    //return invalid password code
        // else
            //return invalid user code
    //disconnect from database
}
/*
 *
 *
 *
 */
function lockoutUser ($inUsername, $duration=1){
//
    //connect to database
    // lookup username
        // if match
            // caculate lockout endpoint
            // update database
            //return update status code
        // else
            //return invalid user code

    //disconnect from database
}



function registerMember(){

    return;
}

function validateUsername($username) {

}


function validatePassword($password) {
    
}

function verifyPassword($userDB, $password) {
    
}






/*
 *
 *
 *
 */
function islockedout ($inUsername){
// validate username and password
    //connect to database
    // lookup username
        // if match
            // caculate lockout endpoint and update database
                //return match code
        // else
                //return invalid code

    //disconnect from database
}


?>
