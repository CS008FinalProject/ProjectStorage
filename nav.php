<nav class="nav_tabs">
        <ul>
            <?php
            /* This sets the current page to not be a link. Repeat this if block for
             *  each menu item */
            if ($path_parts['filename'] == "index") {
                print '<li class="activePage">Home</li>';
            } else {
                print '<li><a href="index.php">Home</a></li>';
            }

            /* example of repeating */
            if ($path_parts['filename'] == "mission1") {
                print '<li class="activePage">mission 1</li>';
            } else {
                print '<li><a href="mission1.php">mission 1</a></li>';
            }

            if ($path_parts['filename'] == "mission2") {
                print '<li class="activePage">mission 2</li>';
            } else {
                print '<li><a href="mission2.php">mission 2</a></li>';
            }

           if ($path_parts['filename'] == "mission3") {
                print '<li class="activePage">mission 3</li>';
            } else {
                print '<li><a href="mission3.php">mission 3</a></li>';
            }
            
           if ($path_parts['filename'] == "mission4") {
                print '<li class="activePage">mission 4</li>';
            } else {
                print '<li><a href="mission4.php">mission 4</a></li>';
            }
            
            if ($path_parts['filename'] == "mission5") {
                print '<li class="activePage">mission 5</li>';
            } else {
                print '<li><a href="mission5.php">mission 5</a></li>';
            }
            ?>

        </ul>
</nav>