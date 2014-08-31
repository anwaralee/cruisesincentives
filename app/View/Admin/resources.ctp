<aside class="left_body floatLeft">
<div class="line"></div>
<h1><span class="green"> Resource Center </span></h1>
<ul>
<?php foreach($resources as $resource)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/resources/<?php echo $resource['Resource']['id'];?>"><?php echo $resource['Resource']['title'];?></a>
        </li>
<?php 
}?>
</ul>
</aside>
<aside class="right_body floatRight" >
<?php if($id != ""){?>
<h3><?php echo ($id == "add")? "Add":"Edit"; ?> Resource center </h3>

    <form action="<?php echo $this->webroot; ?>admin/resources/<?php echo (isset($res)&& ( $res['Resource']['id']!=""))? $res['Resource']['id']:"add"; ?>" id="myform" method="post">
        <label>Title: <input type="text" name="title" class="required" value="<?php   if(isset($res)&& $res['Resource']['title']!= "" )echo $res['Resource']['title'];?>" /></label>
        <label>Description: 
        <textarea name="desc" class="required" id="ck">
        <?php   if(isset($res)&& $res['Resource']['desc']!= "" )echo $res['Resource']['desc'];?></textarea></label>
        
        <hr />
        <input type="submit" value="<?php echo (isset($res)&& $res['Resource']['id']!="")?"Edit":"Add";?>" name="submit" class="btn btn-primary " />
        <?php if(isset($res)&& $res['Resource']['id']!=""){ echo $this->Html->link("Delete","resource_delete/".$res['Resource']['id'],array('class'=>'btn btn-danger'),"Confirm Delete Resource Center?");}?>
    </form>
    <hr />
  <h3>Resource Pdfs  <a href="<?php echo $this->webroot.'admin/resource_pdf/'.$resource['Resource']['id'].'/add'?>" class="btn">Add Pdf</a></h3>
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
else
{?>
    <a href="<?php echo $this->webroot.'admin/resources/add'?>" class="btn">Add Resource</a>
    
<?php }?>	
</aside>

<div class="clear"></div>
<script>
$(function(){
   $('#myform').validate(); 
   
});
</script>