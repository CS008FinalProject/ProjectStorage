<?php
include ("top.php");
include ("header.php");
?>

<div id="pagetab">
     <h1>Mission 4</h1>
</div>
<div id="pagebody">
<?php
include ("nav.php");
?>
        <p>
            The page is physically blocking the passkey!
        </p>
        <?php
    $pKey4 = "";
    $pKey4ERROR = false;
    $M4Hint1 = "<p>you need to move the body out of the way!</p>";
$M4Hint2 = "<p>go into Firebug and delete the text body</p>";
    //READING FILE
    $registrationFileName = "data/registration";
    $fileExt = ".csv";
    $filename = $registrationFileName . $fileExt;
    if ($debug)
        print "\n\n<p>filename is " . $filename;
    $readFile = fopen($filename, 'r');
    if ($readFile) {
        if ($debug)
            print "<p>File Opened</p>\n";
    }
    if ($readFile) {
        if ($debug)
            print "<p>Begin reading data into an array.</p>\n";
    }
    while (!feof($readFile)) {
        $records[] = fgetcsv($readFile);
    }
    fclose($readFile);
    $numHints = 0;
    foreach ($records as $oneRecord) {
        if ($oneRecord[0] != "") {
            if ($oneRecord[0] == $_SESSION["LoggedIn"]) {
                $numHints = $oneRecord[3];
                $currMission = $oneRecord[2];
            }
        }
    }

    if (isset($_POST["btnHint"])) {
        if ($numHints > 0) {
            $numHints = $numHints - 1;
            $_SESSION["HintsUsed4"] ++;
            if(debug)
                print "<p>" . $_SESSION["HintsUsed4"] . "</p>";
        }
    }
    if ($_SESSION["HintsUsed4"] >= 1) {
        print $M4Hint1;
    }
    if ($_SESSION["HintsUsed4"] >= 2) {
        print $M4Hint2;
    }

    if (isset($_POST["btnSubmit"])) {
        $pKey4 = filter_var($_POST["txtPasskey"]);
        if ((strcmp($pKey4, "iAMtheHTMLbackground")) != 0) {
            $pKey4ERROR = true;
            print "<h1>Wrong pass-key. Try again.</h1>";
        }
        if ((strcmp($pKey4, "iAMtheHTMLbackground")) == 0) {
            print "<h1>Correct! Congradulations on passing mission 4.</h2>";
            $numHints = $numHits + 1;
            $currMission++;
        }
    }
    $length = count($records);
    for ($i = 0; $i < $length; $i++) {
        if ($records[$i][0] == $_SESSION["LoggedIn"]) {
            $records[$i][3] = $numHints;
            $records[$i][2] = $currMission;
        }
    }
    //WRITING TO FILE
    $file = fopen($filename, 'w');
    // write the forms informations
    foreach ($records as $aRecord) {
        fwrite($file, $aRecord);
    }
    foreach ($records as $aRecord) {
        fputcsv($file, $aRecord);
    }

    // close the file
    fclose($file);
    ?>
<article class ="mission">
    <form action="<?php print $phpSelf; ?>"
          method="post"
          id="frmRegister">

        <fieldset class="wrapper">
            <legend></legend>
            <fieldset class="contact">
                <legend>Enter the pass-key to advance to the next mission.</legend>
                <label for="txtPasskey" class="required">Pass-key
                    <input type="text" id="txtPasskey" name="txtPasskey"
                           value="<?php print $pKey4; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter the pass-key"
                           <?php if ($pKey4ERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
            </fieldset> <!-- ends contact -->

            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
                <input type="submit" id="btnHint" name="btnHint" value="Hint" tabindex="950" class="button">
            </fieldset> <!-- ends buttons -->          
        </fieldset> <!-- ends wrapper -->
    </form>

</article>
        <?php
            include ("footer.php");
        ?>
</div>
</html>