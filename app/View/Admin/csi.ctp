<aside class="sidebar floatLeft">
<ul>
<li class="titles">CSI</li>

<?php foreach($csi as $c)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/csi/<?php echo $c['Csi']['id'];?>"><?php echo $c['Csi']['title'];?></a></li>
<?php 
}?>
</ul>
</aside>
<aside class="contentRight floatRight" >
<?php if($id!="add"){?><a href="<?php echo $this->webroot.'admin/csi/add'?>" class="btn btn-info">+Add CSI</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
<?php if($id!=""){?><a href="<?php echo $this->webroot;?>admin/csi" class="btn ">Cancel</a><?php }?>

<?php if($id != ""){?>
<h2 class="mytitle"><?php echo (isset($csi1) && $csi1['Csi']['id']!="")?'EDIT':'ADD';?> CSI </h2>
<div class="form">
    <form action="" method="post" id="myform">
        
        <label> Title</label>
        <input type="text" value="<?php if(isset($csi1)&& $csi1['Csi']['title']!= "" )echo $csi1['Csi']['title'];?>" name="title" class="required" />
        <label>Description</label>
        <textarea name="desc" class="CKEDITOR required" id="ck">
        <?php   if(isset($csi1)&& $csi1['Csi']['desc']!= "" )echo $csi1['Csi']['desc'];?></textarea>
        <script type="text/javascript">
        	var CustomHTML = CKEDITOR.replace( 'ck');
                                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
        </script>
        
        <hr />
        
        <input type="submit" value="<?php echo (isset($csi1) && $csi1['Csi']['id']!="")?'Save':'Add';?>" name="submit" class="btn btn-primary " />
        <?php if(isset($csi1)&& $csi1['Csi']['id']!="")echo $this->Html->link('Delete','csi_delete/'.$csi1['Csi']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?>
    </form>
</div>
<?php }?>
</aside>
<div class="clear"></div>