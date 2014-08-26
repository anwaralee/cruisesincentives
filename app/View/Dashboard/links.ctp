<h1>Media Manager</h1>
<a href="<?php echo $this->webroot;?>dashboard/addLink" class="btn btn-success">Add Link</a><br />
<?php 
if($links)
{
?>


<?php
    $i=0;
    foreach($links as $c)
    {
        $i++;
?>
<div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $c['Link']['title']?></div><div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editLink/<?php echo $c['Link']['id'];?>" class="btn btn-info">Edit</a> <a href="<?php echo $this->webroot; ?>dashboard/deleteLink/<?php echo $c['Link']['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></div><div class="clear"></div></div>
<?php
    }
}
else
echo "No Links to Display";
?>