<?php
include ("top.php");
include ("header.php");
?>

<div id="pagetab">
<h1>Mission 2</h1>
</div>
<div id="pagebody">
<?php
include ("nav.php");
?>
<p>
    Description of Mission 2
</p>
<p class ="riddle"><strong>Search for the X that marks the spot.</strong></p>
<figure class="map">
    <img src="toolbarImage.jpg" alt="Clickable picture of a cluttered tool bar" usemap="#toolbar">
    <map id="toolbar" name="toolbar">
        <area shape="rect" alt="X marks the spot" title="" coords="212,352,219,360" href="mission2Completed.php" target="_top" />
    </map>
</figure>
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
                           value="<?php print $pKey2; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter the pass-key"
                           <?php if ($pKey2ERROR) print 'class="mistake"'; ?>
                           onfocus="this.select()">
                </label>
            </fieldset> <!-- ends contact -->

            <fieldset class="buttons">
                <legend></legend>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="900" class="button">
                <input type="submit" id="btnHint" name="btnHint" value="Hint" tabindex="950" class="button">
            </fieldset> <!-- ends buttons -->
            <?php


//DELETE THIS LATTER!!!
$numHints = 3;


$pKey2 = "";
$pKey2ERROR = false;
$numHintsUsed2 = 0;
$M2Hint1 = "<p>There's more to the picture than the toolbar.</p>";
$M2Hint2 = "<p>Click on one of the tabs at the bottom of the screen</p>";
if (isset($_POST["btnSubmit"])) {
    $pKey2 = filter_var($_POST["txtPasskey"]);
    if ((strcmp($pKey2, "PaSsWoRdFoRmIsSiOn1")) != 0) {
        $pKey1ERROR = true;
        print "<h1>Wrong pass-key. Try again.</h1>";
    }
    if ((strcmp($pKey2, "14Arch5Ily2")) == 0) {
        print "<h1>Correct! Congradulations on passing mission 2.</h2>";
        $numHints = $numHits + 1;
    }
}
?>
            <?php
            if (isset($_POST["btnHint"])) {
                if ($numHints > 0) {
                    $numHints--;
                    $numHintsUsed2 ++;
                    print $numHintsUsed2;
                    print $numHints;
                }
            }
            if ($numHintsUsed2 >= 1) {
                print $M2Hint1;
            }
            if ($numHintsUsed2 >= 2) {
                    print $M2Hint2;
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