<html>

<?php

    //Web Links: rpgwiki.seanmfrancis.net/wiki.php?rpg_id=1&subpage_id=1    
    //Remember to Censor these values when posting to Github!!
    $conn = mysqli_connect('XXXXXXXX', 'XXXXXXXXX', 'XXXXXXXXXXXXX', 'XXXXXXXXXXXXXX');
   
    if(! $conn ) {
        die('Could not connect: ' . mysqli_connect_error());
    }    
    
    
    $pageTitle = "RPG Wiki";
    $css = "wiki.css";

    include("pages/header.php");
    include("pages/index_content.php");
    include("pages/footer.php");
    
    mysqli_close($conn);

?>
    
</html>