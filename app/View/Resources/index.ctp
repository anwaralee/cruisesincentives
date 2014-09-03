<div id="main" class="clearfix">
  <div class="left-sidebar why-cruise-sidebar clearfix">
    <div class="call-us-wrap left-content-block"> <img src="images/call-us.png">
      <div class="call-info">
        <div class="call-info-block"> <span class="call-place">North-America</span> <span class="call-no"> 800-529-6916 </span> <span class="call-place">Outside of North-America</span> <span class="call-no"> +1 305-539-6918 </span> </div>
      </div>
    </div>
    <div class="csi left-block-content"> <a href="csi.html"> <img src="images/csi.png"> </a> </div>
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