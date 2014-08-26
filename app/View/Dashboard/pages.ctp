<h2>Page Manager</h2>
<?php 
if($pages) 
{

$i=0;
foreach($pages as $p)
{
    $i++;
    ?>

    <div class="list"><div class="number"><?php echo $i;?>.</div>
        <div class="title"><?php echo $p['Page']['title']?></div>
        <div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $p['Page']['id'];?>" class="btn btn-info">Edit</a>         </div>
        <div class="clear"></div>
    </div>

    
    
    <hr />
    <?php 
}

 }
 else echo "No Pages Found"; 
?>