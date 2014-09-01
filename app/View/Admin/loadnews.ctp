<?php
foreach($model as $n)
{
    ?>
    
<div class="infolist">

<strong><?php echo $n['News']['title'];?></strong>
<span><?php echo $n['News']['added_on'];?></span>
<p>
<?php 
$no_tag = strip_tags($n['News']['desc']);
echo substr($no_tag,0,120);
?>
</p>
</div>
<?php
}
?>