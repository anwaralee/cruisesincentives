    
    <h2 class="page_title"><?php echo ucfirst($model['Page']['title']);?></h2>
    <?php if(count($images)>0){?> 
   	    <div class="img-wrap clearfix">
        <?php foreach($images as $image){?>
        	<?php if(file_exists(APP."webroot/doc/thumb1/".$image['Image']['file'])){?>
        	<div class="img-block">
            <img src="<?php echo $this->webroot."doc/thumb1/".$image['Image']['file'];?>"/>
            </div>
            <?php }?>
        <?php }?>
        </div>
        <?php }?>
    <?php echo $model['Page']['description'];?>
        <?php if($model['Page']['pdf']!= "" && file_exists(APP."webroot/pdf/".$model['Page']['pdf'])){?>
        <div class="pdf-part"> Click here to view the <a href="https://docs.google.com/gview?url=<?php echo $this->webroot."pdf/".$model['Page']['pdf'];?>" class="pdf-link" target="_blank"><?php echo ucfirst($model['Page']['title']);?> </a> </div>
        <?php } ?>
        
        <div class="frame">
        <iframe height="1285" width="945" name="cf-smartsite-iframe" src="http://smartsitesa.cruisefactory.net/?smartsiteid=179" marginwidth="0" marginheight="0" frameborder="0"></iframe>
        </div>
