<script type="text/javascript">
$(function(){
    $('#page-lists ul').sortable({
         items: "li:not(.ui-state-disabled)",
         update : function (event,ui) {
            var order=[];// array to hold the id of all the child li of the selected parent
            $('#'+ui.item.parent().attr('id')).children().each(function(index) {
                    var item=$(this).attr('id').split('_');
                    var val=item[1];
                    order.push(val); 
                });
            var itemList="list="+order;
            $("#showmsg").load("<?php echo $this->webroot.'admin/sort';?>",itemList); 
         }
    });
});
</script>
<div class="floatLeft sidebar">
<ul id="page-lists">
<li class="titles">CRUISELINES</li>
<li>
    <ul id="parentPages">
<?php 
foreach($cruiselines as $id=>$cruise)
    {
?>
        <li id="item_<?php echo $cruise['Cruiseline']['id'];?>" class="botbor">
        
        <?php echo $this->Html->link(ucwords($cruise['Cruiseline']['title']),'cruiseline_edit/'.$cruise['Cruiseline']['id'],array('class'=>''));?>
        <?php /*
    	echo $this->Html->link('Edit','cruiseline_edit/'.$cruise['Cruiseline']['id'],array('class'=>'btn btn-info'))?>
    	<?php echo $this->Html->link('Delete','cruiseline_delete/'.$cruise['Cruiseline']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?")*/?>
    	
        
        
        
        <?php if($cls = $cl->find('all',array('conditions'=>array('parent_id'=>$cruise['Cruiseline']['id']),'order'=>array('sort'=>'ASC')))){
            if(is_array($cls)){?>
            <ul id="subPages" >
            <?php foreach($cls as $c)
                {?>
                    <li id="item_<?php echo $c['Cruiseline']['id'];?>" class="">
                    <?php echo $this->Html->link(ucwords($c['Cruiseline']['title']),'cruiseline_edit/'.$c['Cruiseline']['id'],array('class'=>'child'));?>
                    
                	<?php /*echo $this->Html->link('Edit','cruiseline_edit/'.$c['Cruiseline']['id'],array('class'=>'btn btn-info'))?>
                	<?php echo $this->Html->link('Delete','cruiseline_delete/'.$c['Cruiseline']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?")*/?>
                    
                    </li>
               <?php
                }
            }?>
            </ul>
            
       <?php }?>
       
       </li>
   
  
<?php } ?>
 </ul>
</li>
</ul>

<!--<p><em>Order - Drag and drop the cruiseline order.</em></p>-->

<div id="showmsg"></div>
</div>




<div class="contentRight floatRight" >
<?php if(isset($cruise1) && $cruise1['Cruiseline']['id']!=""){?><a href="<?php echo $this->webroot.'admin/cruiseline_add'?>" class="btn">+Add Cruiselines</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
<a href="<?php echo $this->webroot;?>admin/cruiseline" class="btn ">Cancel</a>
	<!--<a href="<?php echo $this->webroot.'admin/cruiseline_add'?>" class="btn">+Add Cruiselines</a>-->
    <h2 class="mytitle"><?php echo (isset($cruise1) && $cruise1['Cruiseline']['id']!="")?'EDIT':'ADD';?> Cruiseline </h2>

<div class="form">
    <form action="<?php echo $this->webroot;?>admin/<?php echo (isset($cruise1) && $cruise1['Cruiseline']['id']!="")? "cruiseline_edit/".$cruise['Cruiseline']['id']:"cruiseline_add" ;?>" method="post" id="myform">
        <label>Cruiselines:
        <select name="parent_id" class="required">
            <option value="0"> Select Cruiseline</option>
            <?php foreach($cruiselines as $c)
            {?>
               <option value="<?php echo $c['Cruiseline']['id'];?>"<?php echo(isset($cruise1)&& $c['Cruiseline']['id']==$cruise1['Cruiseline']['parent_id'])?"selected='selected'":"";?> ><?php echo $c['Cruiseline']['title'];?></option> 
            <?php
            }?>
        </select></label>
        <label> Title</label>
        <input type="text" value="<?php if(isset($cruise1)&& $cruise1['Cruiseline']['title']!= "" )echo $cruise1['Cruiseline']['title'];?>" name="title" class="required" />
        <label>Description</label>
        <textarea name="desc" class="CKEDITOR required" id="ck">
        <?php   if(isset($cruise1)&& $cruise1['Cruiseline']['desc']!= "" )echo $cruise1['Cruiseline']['desc'];?></textarea>
        <script type="text/javascript">
        	var CustomHTML = CKEDITOR.replace( 'ck');
                                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
        </script>
        <label>SEO Title</label>
        <input type="text" value="<?php if(isset($cruise1)&& $cruise1['Cruiseline']['seo_title']!= "" )echo $cruise1['Cruiseline']['seo_title'];?>" name="seo_title" class="" />
        <label>SEO Description</label>
        <textarea name="seo_desc" class="" ><?php if(isset($cruise1)&& $cruise1['Cruiseline']['seo_desc']!= "" )echo $cruise1['Cruiseline']['seo_desc'];?></textarea>
        
        <hr />
        
        <input type="submit" value="<?php echo (isset($cruise1['Cruiseline']['id']))?'Edit':'Add';?>" name="submit" class="btn btn-primary " />
        <?php echo $this->Html->link('Delete','cruiseline_delete/'.$cruise1['Cruiseline']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?");?>
    </form>
</div>
</div>
<div class="clear"></div>


