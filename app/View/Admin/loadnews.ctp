<?php
foreach($model as $n)
{
    ?>
    
<div class="infolist">
<?php
$q = $img->find('first',array('conditions'=>array('type'=>'news','type_id'=>$n['News']['id']),'order'=>'id ASC')); 
if($q['Image']['file']!="" && file_exists(APP."webroot/doc/thumb1/".$q['Image']['file'])){?>
<div class="floatLeft img">
<img src="<?php echo $this->webroot.'doc/thumb1/'.$q['Image']['file'];?>" />
<div class="rem"><a class="btn btn-danger" href="javascript:void(0)" onclick="var ids=0;$(this).parent().parent().remove();$.ajax({url:'<?php echo $this->webroot;?>admin/cleanId/<?php echo $n['News']['id'];?>',data:'ids='+$('.art_hidden').val(),type:'post',success:function(res){$('.art_hidden').val(res);$('#art_deal').load('<?php echo $this->webroot;?>admin/loadNewsOption?ids='+res);}});">Remove</a></div>
</div>
<?php }?>
<div class="floatLeft tit">
<strong><?php echo $n['News']['title'];?></strong>
<span><?php echo $n['News']['added_on'];?></span>
<p>
<?php 
$no_tag = strip_tags($n['News']['desc']);
echo substr($no_tag,0,120).'...';
?>
</p>
</div>
<div class="clear"></div>



</div>
<?php
}
?>