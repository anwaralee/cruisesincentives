<aside class="sidebar floatLeft">
<ul>
<li class="titles"> Resource Center</li>

<?php foreach($resources as $resource)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/resources/<?php echo $resource['Resource']['id'];?>"><?php echo ucfirst($resource['Resource']['title']);?></a>
        </li>
<?php 
}?>
</ul>
</aside>
<aside class="contentRight floatRight" >
<?php if($id!="add"){?><a href="<?php echo $this->webroot.'admin/resources/add'?>" class="btn btn-info">+Add Resource Center</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
<?php if($id!='add' && $id!=""){?><a href="<?php echo $this->webroot.'admin/resource_pdf/'.$resource['Resource']['id'].'/add'?>" class="btn btn-info">+Add Pdf</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
<?php if($id!=""){?><a href="<?php echo $this->webroot;?>admin/resources" class="btn ">Cancel</a><?php }?>
<?php if($id != ""){?>
<h2 class="mytitle"><?php echo ($id == "add")? "Add":"Edit"; ?> Resource center </h2>

    <form action="<?php echo $this->webroot; ?>admin/resources/<?php echo (isset($res)&& ( $res['Resource']['id']!=""))? $res['Resource']['id']:"add"; ?>" id="myform" method="post">
        <label>Title: </label><input type="text" name="title" class="required" value="<?php   if(isset($res)&& $res['Resource']['title']!= "" )echo $res['Resource']['title'];?>" />
        <label>Description: </label>
        <textarea name="desc" class="required" >
        <?php if(isset($res)&& $res['Resource']['desc']!= "" ) echo $res['Resource']['desc'];?>
        </textarea>
        
        <hr />
        <input type="submit" value="<?php echo (isset($res)&& $res['Resource']['id']!="")?"Edit":"Add";?>" name="submit" class="btn btn-primary " />
        <?php if(isset($res)&& $res['Resource']['id']!=""){ echo $this->Html->link("Delete","resource_delete/".$res['Resource']['id'],array('class'=>'btn btn-danger'),"Confirm Delete Resource Center?");}?>
    </form>
    <?php if($id!="add" && $id!=""){?>
    <hr />
  <h2 class="mytitle">Resource Pdfs  </h2>
  <ul>
  <?php foreach($pdfs as $pdf)
  {?>
    <li><?php echo $pdf['ResourcePdf']['title'];?> <a href="<?php echo $this->webroot;?>admin/resource_pdf/<?php echo $id."/".$pdf['ResourcePdf']['id'];?>" class="btn btn-success">Edit</a>
    <?php echo $this->Html->link("Delete","pdf_delete/".$pdf['ResourcePdf']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?>
    <?php if( $child_pdf = $rp->find('all',array('conditions'=>array('parent_id'=>$pdf['ResourcePdf']['id'],'resource_id'=>$id))))
            {?>
             <ul>
                <?php foreach($child_pdf as $ch)
                  {?>
                  <li><?php echo $ch['ResourcePdf']['title'];?> <a href="<?php echo $this->webroot;?>admin/resource_pdf/<?php echo $id."/".$ch['ResourcePdf']['id'];?>" class="btn btn-success">Edit</a>
                  <?php echo $this->Html->link("Delete","pdf_delete/".$ch['ResourcePdf']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?></li>
                <?php }?>
             </ul>   
                
            <?php
            }?>
    </li>
  <?php } ?>  
  </ul>
<?php }
}
?>	
</aside>

<div class="clear"></div>
<script>
$(function(){
   $('#myform').validate();
   var h1 = $('.sidebar').height(); 
   var h2 = $('.contentRight').height();
   var h =0;
   if(h1>h2)
    h = h1;
   else
    h = h2;
    //alert(h);
   $('.sidebar').css('height',h);
   $('.sidebar').css('background','#eee');
   
});
</script>