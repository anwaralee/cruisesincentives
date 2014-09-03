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
        <textarea name="desc" class="required" ><?php if(isset($res)&& $res['Resource']['desc']!="" )echo trim($res['Resource']['desc']);?>
        </textarea>
        
        <hr />
        <input type="submit" value="<?php echo (isset($res)&& $res['Resource']['id']!="")?"Edit":"Add";?>" name="submit" class="btn btn-primary " />
        <?php if(isset($res)&& $res['Resource']['id']!=""){ echo $this->Html->link("Delete","resource_delete/".$res['Resource']['id'],array('class'=>'btn btn-danger'),"Confirm Delete Resource Center?");}?>
    </form>
    <?php if($id!="add" && $id!=""){?>
    <hr />
  <h2 class="mytitle">Resource Pdfs  </h2>
  <ul class="resourcepdf">
  <?php foreach($pdfs as $pdf)
  {?>
    <li>
    <div>
        <span class="icons-pdf floatLeft"></span>
        <div class="floatLeft pdftitle"><?php echo $pdf['ResourcePdf']['title'];?></div>
        <div class="floatRight">
            <a href="<?php echo $this->webroot;?>admin/resource_pdf/<?php echo $id."/".$pdf['ResourcePdf']['id'];?>" class="btn btn-success">Edit</a>
            <?php echo $this->Html->link("Delete","pdf_delete/".$pdf['ResourcePdf']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php if( $child_pdf = $rp->find('all',array('conditions'=>array('parent_id'=>$pdf['ResourcePdf']['id'],'resource_id'=>$id))))
            {?>
             <ul>
                <?php foreach($child_pdf as $ch)
                  {?>
                  <li>
                  <div>
                  <span class="icons-pdf floatLeft"></span>
                  <div class="floatLeft pdftitle"><?php echo $ch['ResourcePdf']['title'];?></div>
                  <div class="floatRight">
                      <a href="<?php echo $this->webroot;?>admin/resource_pdf/<?php echo $id."/".$ch['ResourcePdf']['id'];?>" class="btn btn-success">Edit</a>
                      <?php echo $this->Html->link("Delete","pdf_delete/".$ch['ResourcePdf']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?>
                  </div>
                  <div class="clearfix"></div>
                  </div>
                  </li>
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
   
   
});
</script>