<?php
include ("top.php");
include ("header.php");

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
$dataRecord = array();
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


    $dataRecord[] = $uName;
    $dataRecord[] = $password;




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
    }
    $registrationFileName = "data/registration";
    $fileExt = ".csv";
    $filename = $registrationFileName . $fileExt;
    if ($debug)
        print "\n\n<p>filename is " . $filename;
    $readFile = fopen($filename, 'r');
    while (!feof($readFile)) {
        $records[] = fgetcsv($readFile);
    }
    fclose($readFile);

    $usernameDNE = true;
    foreach ($records as $oneRecord) {
        if ($oneRecord[0] == $uName) {
            $usernameDNE = false;
            if ($oneRecord[1] != $password) {
                $passwordERROR = true;
                $errorMsg = "Wrong Password.";
            }
        }
    }
    if ($usernameDNE) {
        $uNameERROR = true;
        $errorMsg = "That username does not exist.";
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
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
        // SECTION: 2f Create message
    //
        // 
    // 
    $message = '<h2>Welcome ' . $uName . '!</h2>';




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

?>
<div id="pagetab">
    <h1>Log In</h1>
</div>
<div id="pagebody">
<?php
include ("nav.php");
?>
    <article id="main">
        <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">


            <p>Please enter a username and password.</p>
<?php
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
    print $message;
    $_SESSION["LoggedIn"] = $uName;
    $_SESSION["HintsUsed1"] = 0;
    $_SESSION["HintsUsed2"] = 0;
    $_SESSION["HintsUsed3"] = 0;
    $_SESSION["HintsUsed4"] = 0;
    $_SESSION["HintsUsed5"] = 0;
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
</div>
