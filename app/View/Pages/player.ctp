<?php
if($media['Media']['file']){
?>
<p style="margin-top: 10px;">
<audio controls>
  <source src="<?php echo $this->webroot;?>doc/<?php echo $media['Media']['file'];?>" type="audio/ogg">
  <source src="<?php echo $this->webroot;?>doc/<?php echo $media['Media']['file'];?>" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
</p> 
<?php
}
else
{
    $you = $media['Media']['youtube'];
    $arr = explode('?v=',$you);
    $code = $arr['1'];
    ?>
    <iframe width="500" height="300" src="//www.youtube.com/embed/<?php echo $code;?>" frameborder="0" allowfullscreen></iframe>
    <?php
}
?>