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
<div class="clear"></div>
<div class="floatRight"><a class="btn btn-danger" href="javascript:void(0)" onclick="var ids=0;$(this).parent().parent().remove();$.ajax({url:'<?php echo $this->webroot;?>admin/cleanId/<?php echo $n['News']['id'];?>',data:'ids='+$('.art_hidden').val(),type:'post',success:function(res){$('.art_hidden').val(res);$('#art_deal').load('<?php echo $this->webroot;?>admin/loadNewsOption?ids='+res);}});">Remove</a></div>
<div class="clear"></div>
</div>
<?php
}
?>