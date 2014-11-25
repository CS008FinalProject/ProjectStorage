<?php
include ("top.php");
include ("header.php");
?>

<div id="pagetab">
     <h1>Mission 3</h1>
</div>
     <div id="pagebody">
<?php
include ("nav.php");
?>
        <p>
            Description of Mission 3
        </p>
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
                           value="<?php print $pKey3; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter the pass-key"
                           <?php if ($uNameERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
            </fieldset> <!-- ends contact -->

            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
                <input type="submit" id="btnHint" name="btnHint" value="Hint" tabindex="950" class="button">
            </fieldset> <!-- ends buttons -->
            <?php

//if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
    //print "<h1>Wrong pass-key. Try again.</h1>";
$numHints = 1;
$pKey3 = "";
$pKey3ERROR = false;
$numHintsUsed3 = 0;
$M3Hint1 = "<p>A chameleon is doing its job if you can't see it</p>";
if (isset($_POST["btnSubmit"])) {
    $pKey3 = filter_var($_POST["txtPasskey"]);
    if ((strcmp($pKey3, "cAMofLAge923")) != 0) {
        $pKey3ERROR = true;
        print "<h1>Wrong pass-key. Try again.</h1>";
    }
    if ((strcmp($pKey3, "cAMofLAge923")) == 0) {
        print "<h1>Correct! Congradulations on passing mission 3.</h2>";
        $numHints = $numHits + 1;
    }
}

?>
            <?php
            if (isset($_POST["btnHint"])) {
                if ($numHints > 0) {
                    $numHints = $numHints - 1;
                    $numHintsUsed3 ++;
                }
            }
            if($numHintsUsed3 == 1){
                print $M3Hint1;
            }
            ?>


        </fieldset> <!-- ends wrapper -->
    </form>

</article>
        <?php
            include ("footer.php");
        ?>
     </div>
</html>