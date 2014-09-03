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
<ul>
<li class="titles">CRUISELINES</li>
<li id="page-lists">
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
	<a href="<?php echo $this->webroot.'admin/cruiseline_add'?>" class="btn btn-info">+Add Cruiselines</a>
</div>

<div class="clear"></div>