
<div class="floatLeft sidebar">
<ul>
<li class="titles">PAGES</li>
<?php 
$pages = $this->requestAction('/admin/pages');
if($pages) 
{

$i=0;
foreach($pages as $p)
{
    $i++;
    ?>

    <li class="">
        <a href="<?php echo $this->webroot; ?>admin/editPage/<?php echo $p['Page']['id'];?>"><?php echo $p['Page']['title']?></a>
    </li>
    <?php 
}

 }
 else echo "<li>No Pages Found</li>"; 
?>
</ul>
</div>
<div class="floatRight contentRight"></div>
<div class="clear"></div>