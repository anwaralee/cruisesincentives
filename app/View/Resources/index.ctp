<div id="main" class="clearfix">
  <div class="left-sidebar why-cruise-sidebar clearfix">
    <div class="call-us-wrap left-content-block"> <img src="<?php echo $this->webroot;?>images/call-us.png">
      <div class="call-info">
        <div class="call-info-block"> <span class="call-place">North-America</span> <span class="call-no"> 800-529-6916 </span> <span class="call-place">Outside of North-America</span> <span class="call-no"> +1 305-539-6918 </span> </div>
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
  </div>
  <!-- left sidebar -->
  <div class="right-content why-cruise-content resource-center clearfix">
    <h2 class="page_title"> <?php $page['Page']['title'];?> </h2>
    <?php echo $page['Page']['description'];?>
    <div class="pdf-link-wrap clearfix">
    <?php foreach($resources as $key=>$resource)
    {?>
      <div class="resource-pdf-link"> <a class="title" href="<?php echo $this->webroot."resources/pdf/".$resource['Resource']['slug'];?>"><?php echo $resource['Resource']['title'];?> </a>
        <p><?php echo $resource['Resource']['desc'];?></p>
      </div>
          <?php if($key%2 !=0){?>
          <div class="clear"> </div>
          <?php }?>
      <?php }?>
     
    </div>
    <!-- pdf link wrap --> 
  </div>
  <!-- right content --> 
  
</div>