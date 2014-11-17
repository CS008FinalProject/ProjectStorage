<?php
include ("top.php");
include ("header.php");
include ("nav.php");


//DELETE THIS LATTER!!!
$numHints = 1;


$pKey1 = "";
$pKey1ERROR = false;
$numHintsUsed1 = 0;
$M1Hint1 = "<p>Check out the source code!</p>";
if (isset($_POST["btnSubmit"])) {
    $pKey1 = filter_var($_POST["txtPasskey"]);
    if ((strcmp($pKey1, "PaSsWoRdFoRmIsSiOn1")) != 0) {
        $pKey1ERROR = true;
        print "<h1>Wrong pass-key. Try again.</h1>";
    }
    if ((strcmp($pKey1, "PaSsWoRdFoRmIsSiOn1")) == 0) {
        print "<h1>Correct! Congradulations on passing mission 1.</h2>";
        $numHints = $numHits + 1;
    }
}
?>
<h2>Mission 1</h2>
<p>
    Description of Mission 1
</p>
<!-- 

THE PASSWORD IS "PaSsWoRdFoRmIsSiOn1"

-->
<p class ="riddle"><strong>The Password is hidden IN the page.</strong></p>
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
                           value="<?php print $pKey1; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter the pass-key"
                           <?php if ($pKey1ERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
            </fieldset> <!-- ends contact -->

            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
                <input type="submit" id="btnHint" name="btnHint" value="Hint" tabindex="950" class="button">
            </fieldset> <!-- ends buttons -->
            <?php
            if (isset($_POST["btnHint"])) {
                if ($numHints > 0) {
                    $numHints = $numHints - 1;
                    $numHintsUsed1 ++;
                }
            }
            if($numHintsUsed1 == 1){
                print $M1Hint1;
            }
            ?>

        </fieldset> <!-- ends wrapper -->
    </form>

</article>
<?php
include ("footer.php");
?>
</html>
