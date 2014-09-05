<div class="left-sidebar why-cruise-sidebar clearfix">
    	<div class="request left-content-block">
        	<a href="<?php echo $this->webroot;?>requests"> <img src="<?php echo $this->webroot;?>images/request.png"> </a>
        </div>
        <div class="call-us-wrap left-content-block">
        	<img src="<?php echo $this->webroot;?>images/call-us.png">
            <div class="call-info">
            	<div class="call-info-block">
                	<span class="call-place">North-America</span>
                    <span class="call-no"> 800-529-6916 </span>
                    <span class="call-place">Outside of North-America</span>
                    <span class="call-no"> +1 305-539-6918 </span>
                </div>
            </div>
        </div>
        
        	<?php $banners = $this->requestAction('destinations/getbanners');
                foreach($banners as $banner)
                {?>
                <div class="csi left-block-content">
                   <a href="<?php if($banner['Banner']['link']!="")echo $banner['Banner']['link'];else echo "javascript:void(0);";?>" target="<?php if($banner['Banner']['target']=='1' && $banner['Banner']['link']!="")echo "_blank";?>"><img src="<?php echo $this->webroot.'doc/thumb/'.$banner['Banner']['file'];?>" /></a> 
                </div>
            <?php
                }
            ?>
    </div><!-- left sidebar -->
    <div class="right-content why-cruise-content rightcontent clearfix">
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
        <div class="pdf-part"> Click here to view the <a href="https://docs.google.com/gview?url=<?php echo Router::url($this->webroot,true)."pdf/".$model['Page']['pdf'];?>" class="pdf-link" target="_blank"><?php echo ucfirst($model['Page']['title']);?> </a> </div>
        <?php } ?>
    </div>