<?php
include ("top.php");
include ("header.php");
include ("nav.php");
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
    print "<h1>Wrong pass-key. Try again.</h1>";
}
?>
     <h2>Mission 3</h2>
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
                           value="<?php print $uName; ?>"
                           tabindex="200" maxlength="50" placeholder="Enter the pass-key"
                           <?php if ($uNameERROR) print 'class="mistake"'; ?>
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
</html>