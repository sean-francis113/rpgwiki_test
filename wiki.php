<html>

<?php

//Web Links: rpgwiki.seanmfrancis.net/wiki.php?rpg_id=1&subpage_id=1
//Remember to Censor these values when posting to Github!!
$conn = mysqli_connect('XXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXX');
   
if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}

include("pages/header.php");
include("pages/wiki_content.php");
include("pages/footer.php");

?>
    
</html>