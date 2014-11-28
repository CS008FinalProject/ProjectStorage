<nav class="nav_tabs">
    <ul>
        <?php
        $registrationFileName = "data/registration";
        $fileExt = ".csv";
        $filename = $registrationFileName . $fileExt;
        if ($debug)
            print "\n\n<p>filename is " . $filename;
        $rFile = fopen($filename, "r");
        if ($rFile) {
            if ($debug)
                print "<p>File Opened</p>\n";
        }
        if ($rFile) {
            if ($debug)
                print "<p>Begin reading data into an array.</p>\n";
            $headers = fgetcsv($rFile);
        }
        $headers[0];
        $headers[1];
        $headers[2];
        $headers[3];
        while (!feof($rFile)) {
            $recor[] = fgetcsv($rFile);
        }
        fclose($rFile);
        $currMission = 0;
        foreach ($recor as $one_Record) {
            if ($one_Record[0] == $_SESSION["LoggedIn"]) {
                $currMission = $one_Record[2];
            }
        }
        /* This sets the current page to not be a link. Repeat this if block for
         *  each menu item */
        if ($path_parts['filename'] != "index") {
            print '<li><a href="index.php">Home</a></li>';
        } else {
            print '<li class="activePage">Home</li>';
        }

        /* example of repeating */
        if ($path_parts['filename'] != "mission1" && $currMission >= 1) {
            print '<li><a href="mission1.php">mission 1</a></li>';
        } else {
            print '<li class="activePage">mission 1</li>';
        }

        if ($path_parts['filename'] != "mission2" && $currMission >= 2) {
            print '<li><a href="mission2.php">mission 2</a></li>';
        } else {
            print '<li class="activePage">mission 2</li>';
        }

        if ($path_parts['filename'] != "mission3" && $currMission >= 3) {
            print '<li><a href="mission3.php">mission 3</a></li>';
        } else {
            print '<li class="activePage">mission 3</li>';
        }

        if ($path_parts['filename'] != "mission4" && $currMission >= 4) {
            print '<li><a href="mission4.php">mission 4</a></li>';
        } else {
            print '<li class="activePage">mission 4</li>';
        }

        if ($path_parts['filename'] != "etisoppo" && $currMission >= 5) {
            print '<li><a href="etisoppo.php">mission 5</a></li>';
        } else {
            print '<li class="activePage">mission 5</li>';
        }
        ?>

    </ul>
</nav>