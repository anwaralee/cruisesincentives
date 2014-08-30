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
<aside class="left_body1 floatLeft">
<div class="line"></div>
<h1><span class="green"> List of Cruiselines </span></h1>
<div class="line"></div>
<p><em>Order - Drag and drop the cruiseline order.</em></p>
<div id="page-lists">
<ul id="parentPages">
<?php foreach($cruiselines as $id=>$cruise)
    {
?>
        <li id="item_<?php echo $cruise['Cruiseline']['id'];?>" class="pageManagerList greybg" style="font-size:17px; color:#333;">
        <div class="floatLeft margintop5"><?php echo ucwords($cruise['Cruiseline']['title']);?></div>
        <div class="floatRight">
    	<?php echo $this->Html->link('Edit','cruiseline_edit/'.$cruise['Cruiseline']['id'],array('class'=>'btn btn-info'))?>
    	<?php echo $this->Html->link('Delete','cruiseline_delete/'.$cruise['Cruiseline']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?")?>
    	
        </div>
        <div class="clear"></div>
        
        <?php if($cls = $cl->find('all',array('conditions'=>array('parent_id'=>$cruise['Cruiseline']['id']),'order'=>array('sort'=>'ASC')))){
            if(is_array($cls)){?>
            <ul id="subPages" >
            <?php foreach($cls as $c)
                {?>
                    <li id="item_<?php echo $c['Cruiseline']['id'];?>"class="pageManagerList greybg" style="font-size:17px; color:#333;">
                    <div class="floatLeft margintop5"><?php echo ucwords($c['Cruiseline']['title']);?></div>
                    <div class="floatRight">
                	<?php echo $this->Html->link('Edit','cruiseline_edit/'.$c['Cruiseline']['id'],array('class'=>'btn btn-info'))?>
                	<?php echo $this->Html->link('Delete','cruiseline_delete/'.$c['Cruiseline']['id'],array('class'=>'btn btn-danger'),"Confirm Delete?")?>
                    </div>
                    <div class="clear"></div>
                    </li>
               <?php
                }
            }?>
            </ul>
       <?php }?>
       </li>
   
  
<?php } ?>
 </ul>
</div>
<div id="showmsg"></div>
</aside>




<aside class="right_body1 floatRight" >
	<a href="<?php echo $this->webroot.'admin/cruiseline_add'?>" class="btn">+Add Cruiselines</a>
</aside>

<div class="clear"></div>