<div id="sidebar">
    <ul id="sidebar_list">
        <?php
          
            $retval = mysqli_query($conn, 'SELECT rpg_id,rpg_name FROM rpg_parentInformation');
            
            if(!$retval)
            {
                
                die('Could Not Get Any Data: ' . mysqli_error($conn));
                
            }
        
            while($row = mysqli_fetch_array($retval))
            {
                
                echo "<li><a href='http://rpgwiki.seanmfrancis.net/wiki.php?rpg_id={$row['rpg_id']}&subpage_id=0'>{$row['rpg_name']}</a></li>";
                
            }
    
        ?>
    </ul>
</div>

<div id="main_content">
    <h1 id="page_title">Home</h1>
    <p>Welcome to the RPG World Wiki, a small project for myself to learn how to handle databases.</p>
    <p>Click the links in the left sidebar to see the test databases in action.</p>
</div>