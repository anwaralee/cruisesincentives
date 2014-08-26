<?php
    if($content)
    {
        $i=0;
        foreach($content as $c)
        {
            $i++;
?>
        <div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $c['Media']['title']?></div><div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editMedia/<?php echo $c['Media']['id'];?>" class="btn btn-info">Edit</a> <a href="<?php echo $this->webroot; ?>dashboard/deleteMedia/<?php echo $c['Media']['id'];?>/<?php echo $c['Media']['media_type'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></div><div class="clear"></div></div>
<?php
        }
    }
    else echo "No Content to Display";
?>