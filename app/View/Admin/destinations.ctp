<aside class="sidebar floatLeft">


<ul>
<li class="titles">Destinations</li>
<?php foreach($destinations as $destination)
{?>
    <li <?php if(isset($dest)&& $dest['Destination']['id']==$destination['Destination']['id']){?>class="active"<?php }?>><a href="<?php echo $this->webroot;?>admin/destinations/<?php echo $destination['Destination']['id'];?>"><?php echo $destination['Destination']['title'];?></a></li>
<?php 
}?>
</ul>
</aside>
<aside class="contentRight floatRight" >
<?php if(isset($dest)&& $dest['Destination']['id']!=""){?>
    <form action="" id="myform" method="post">
        <label>Title: <input type="text" name="title" class="required" value="<?php   if(isset($dest)&& $dest['Destination']['title']!= "" )echo $dest['Destination']['title'];?>" /></label>
        <label>Description: </label>
        <textarea name="desc" class="CKEDITOR required" id="ck">
        <?php   if(isset($dest)&& $dest['Destination']['desc']!= "" )echo $dest['Destination']['desc'];?></textarea>
        <script type="text/javascript">
        	var CustomHTML = CKEDITOR.replace( 'ck');
                                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
        </script>
        <hr />
        <label>Youtube Link: <input name="youtube_link" value="<?php   if(isset($dest)&& $dest['Destination']['youtube_link']!= "" )echo $dest['Destination']['youtube_link'];?>" type="text" class="url"  /></label>
        <hr />
        <strong>Highlights</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="addmore" class="btn btn-primary">+Add More</a>
        <hr />
        <div class="highlight">
        <?php if(count($high)<1){?>
        <span><textarea name="highlight[]" style="width: 485px;margin-bottom:5px;"></textarea> &nbsp;  &nbsp; <a href="javascript:void(0);" onclick="$(this).parent().remove();"  class="btn btn-danger">Delete</a></span>
        <?php }else{foreach($high as $h){?>
            <span><textarea name="highlight[]" style="width: 485px;margin-bottom:5px;"><?php echo $h['Highlight']['desc'];?></textarea> &nbsp;  &nbsp; <a href="javascript:void(0);" onclick="$(this).parent().remove();"  class="btn btn-danger">Delete</a></span>
        <?php }
        }?>
        
        </div>
        <hr />
        <input type="submit" value="Save" name="submit" class="btn btn-primary" />
    </form>
<?php }?> 	
</aside>

<div class="clear"></div>
<script>
$(function(){
   $('#myform').validate(); 
   $('#addmore').click(function(){
    $('.highlight').prepend('<span><textarea name="highlight[]" style="width: 485px;margin-bottom:5px;"></textarea> &nbsp;  &nbsp; <a href="javascript:void(0);" onclick="$(this).parent().remove();" class="btn btn-danger">Delete</a><span>')
   })
});
</script>