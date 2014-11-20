<?php
include ("top.php");
include ("header.php");
include ("nav.php");
$debug = false;
if (isset($_GET["debug"])) {
    $debug = true;
}
if ($debug) {
    print "<p>DEBUG MODE IS ON</p>";
}
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form
$password = "";
$verifyPassword = "";
$uName = "";
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
//
//
$passwordERROR = false;
$uNameERROR = false;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// 
$errorMsg = array();
$dataRecord = array(); //change name
$mailed = false;



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck(true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // 
    // 
    $uName = filter_var($_POST["txtUsername"]);
    $password = filter_var($_POST["pwdPassword"]);
    $verifyPassword = filter_var($_POST["pwdVerifyPassword"]);


    $dataRecord[] = $uName;
    $dataRecord[] = $password;
    $dataRecord[] = 1;
    $dataRecord[] = 1;




    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // 
    // 
    // 
    //  
    // 
    // 
    if(debug)
    {
        print "Error is in the error makers.";
    }

    if ($uName == "") {
        $errorMsg[] = "Please enter your username.";
        $uNameERROR = true;
    } else if (strlen($uName) <= 4) {
        $errorMsg[] = "Your username must be at least 5 characters long.";
        $uNameERROR = true;
    }
    if ($password == "") {
        $errorMsg[] = "Please enter a password";
        $passwordERROR = true;
    } else if (strlen($password) <= 4) {
        $errorMsg[] = "Your password must be at least 5 characters long.";
        $passwordERROR = true;
    } else if ($password != $verifyPassword) {
        $errorMsg[] = "Your password must match in both places.";
        $passwordERROR = true;
    }



    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // 
    //
      if (!$errorMsg) {
        if ($debug)
            print "<p>Username is valid</p>";
    }



    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
        // SECTION: 2e Save Data
    //
        // 

    $fileExt = ".csv";

    $myFileName = "data/registration";

    $filename = $myFileName . $fileExt;

    if ($debug)
        print "\n\n<p>filename is " . $filename;

    // now we just open the file for append
    $file = fopen($filename, 'a');

    // write the forms informations
    fputcsv($file, $dataRecord);

    // close the file
    fclose($file);

















    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
        // SECTION: 2f Create message
    //
        // 
    // 
//    $message = '<h2>Welcome </h2>';
//
//    foreach ($_POST as $key => $value) {
//        if ($key == "txtUsername") {
//            $message .= "<p>";
//
//            $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));
//
//            foreach ($camelCase as $one) {
//                $message .= $one . " ";
//            }
//            $message .= htmlentities($value, ENT_QUOTES, "UTF-8") . "!</p>";
//        }
//    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
        // SECTION: 2g Mail to user
    //
        // 
    // 
} // ends if form was submitted.
//#############################################################################
//
// SECTION 3 Display Form
//
//####################################
//
// SECTION 3a.
//
//
//
    //
    // If its the first time coming to the form or there are errors we are going
// to display the form.
/* @var $_POST type */
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
    print "<h1>Account Creation Successful.</h1>";

//    print "<h1>Your information has ";
//    if (!$mailed) {
//        print "not ";
//    }
//    print "been logged</h1>";
//    print "<p>A copy of this message has ";
//    if (!$mailed) {
//        print "not ";
//    }
//    print "been sent</p>";
//    print "<p>To: " . $email . "</p>";
//    print "<p>Mail Message:</p>";
//    print $message;
} else {
    //####################################
    //
        // SECTION 3b Error Messages
    //
        // display any error messages before we print out the form

    if ($errorMsg) {
        print '<div id="errors">';
        print "<ol>\n";
        foreach ($errorMsg as $err) {
            print "<li>" . $err . "</li>\n";
        }
        print "</ol>\n";
        print '</div>';
    }

// form code here but notice this closing bracket on line 315
} // end body submit
?>
<article id="main">
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">

        <h2>Log In</h2>

        <p>Please enter a username and password.</p>

        <fieldset class="wrapper">
            <legend></legend>
            <fieldset class="contact">
                <legend>Log In</legend>
                <label for="txtUsername" class="required">Username
                    <input type="text" id="txtUsername" name="txtUsername"
                           value="<?php print $uName; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter your username"
<?php if ($uNameERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
                <label for="pwdPassword" class="required">Password
                    <input type="password" id="pwdPassword" name="pwdPassword"
                           value="<?php print $password; ?>"
                           tabindex="300" maxlength="50" placeholder="Enter a your password"
<?php if ($passwordERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
                <label for="pwdVerifyPassword" class="required">Verify Password
                    <input type="password" id="pwdVerifyPassword" name="pwdVerifyPassword"
                           
                           value="<?php print $verifyPassword; ?>"
                           tabindex="350" maxlength="50" placeholder="Re-enter a your password"
<?php if ($passwordERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
            </fieldset> <!-- ends contact -->

            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
            </fieldset> <!-- ends buttons -->

        </fieldset> <!-- ends wrapper -->
    </form>

</article>
<?php
include ("footer.php");
?>
