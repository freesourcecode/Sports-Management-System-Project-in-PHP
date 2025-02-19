<?php
 $db = mysqli_connect('localhost:3307', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'sports_management_system' ) or die(mysqli_error($db));
?>