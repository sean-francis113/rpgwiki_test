<div id="sidebar">
    <ul id="sidebar_list">
        <?php
          
            $page_title = 'Error: Lost';
            $page_content = 'We are not exactly sure how you got to this page, but you are not supposed to be here. Do not worry, we can help you get out. All you need to do is either click on the Home button at the top or bottom of the page. That will take you to a safe place in the site for you to explore from.';
            $rpg_id = $_GET['rpg_id'];
            $main_retval = mysqli_query($conn, 'SELECT * FROM rpg_parentInformation');
            $subpage_retval = mysqli_query($conn, 'SELECT * FROM rpg_subpages WHERE rpg_id=' . $rpg_id);
            
            if(!$main_retval && !$subpage_retval)
            {
                
                die('Could Not Get Any Data: ' . mysqli_error($conn));
                
            }
        
            $valid_rpg = false;
        
            while($row = mysqli_fetch_array($main_retval))
            {
                
                if($row['rpg_id'] == $rpg_id)
                {
                    
                    $valid_rpg = true;
                    break;
                    
                }
                
            }
        
            mysqli_data_seek($main_retval, 0);
        
            $itterator = 0;

            while($main_row = mysqli_fetch_array($main_retval))
            {

                $itterator += 1;
                echo "<li><a href='http://rpgwiki.seanmfrancis.net/wiki.php?rpg_id={$main_row['rpg_id']}&subpage_id=0'>{$main_row['rpg_name']}</a></li>";

                if($rpg_id == $itterator && $subpage_retval)
                {

                    echo "<ul class='subpage_list'>\n";
                    while($subpage_row = mysqli_fetch_array($subpage_retval))
                    {

                        echo "<li><a href='http://rpgwiki.seanmfrancis.net/wiki.php?rpg_id={$rpg_id}&subpage_id={$subpage_row['subpage_id']}'>{$subpage_row['subpage_name']}</a></li>\n";

                    }
                    echo "</ul>\n";

                }

            }

            if($valid_rpg)
            {
                
                if($_GET['subpage_id'] == 0)
                {

                    $rpg_retval = mysqli_query($conn, 'SELECT rpg_name,rpg_desc FROM rpg_parentInformation WHERE rpg_id=' . $_GET['rpg_id']);
                    $rpg_row = mysqli_fetch_array($rpg_retval);

                    $page_title = $rpg_row['rpg_name'];
                    $page_content = $rpg_row['rpg_desc'];

                }
                else
                {

                    $rpg_retval = mysqli_query($conn, 'SELECT subpage_name,subpage_content FROM rpg_subpages WHERE subpage_id=' . $_GET['subpage_id']);

                    if(!$rpg_retval)
                    {

                        $page_title = 'Error: Lost';
                        $page_content = 'We are not exactly sure how you got to this page, but you are not supposed to be here. Do not worry, we can help you get out. All you need to do is either click on the Home button at the top or bottom of the page. That will take you to a safe place in the site for you to explore from.'; 

                    }
                    else
                    {

                        $rpg_row = mysqli_fetch_array($rpg_retval);
                        $page_title = $rpg_row['subpage_name'];
                        $page_content = $rpg_row['subpage_content'];

                    }

                }
                
            }
    
        ?>
    </ul>
</div>

<div id="main_content">
    <h1 id="page_title"><?php echo $page_title ?></h1>
    <div id="rpg_content"><? echo $page_content ?></div>
</div>