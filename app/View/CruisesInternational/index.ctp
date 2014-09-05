  <div class="left-sidebar why-cruise-sidebar clearfix">
        <div class="siderbar-title">
        	Cruise line
        </div>
        <div class="side-menu left-content-block">
         <div class="parent-list-wrap">
           <ul>
           <?php foreach($cruises as $k=>$cruise){?>
             <li class="parent-list"> <a href="<?php echo $this->webroot;?>cruisesinternational/<?php echo $cruise['Cruiseline']['slug'];?>"> <?php echo ucfirst($cruise['Cruiseline']['title']);?> </a>
                <?php $childs = $cruiseline->find('all',array('conditions'=>array('parent_id'=>$cruise['Cruiseline']['id'])));
                if(count($childs)>0)
                {?>
                    <ul class="sub-menu-sidebar" <?php if((!isset($this->params['pass'][0])&& $k==0) || $this->params['pass'][0]== $cruise['Cruiseline']['slug'] || $model['Cruiseline']['parent_id']==$cruise['Cruiseline']['id']){echo "style='display:block'";}?> >
                 <?php
                    foreach($childs as $child)
                    {?>
                       <li class="child-list"> <a href="<?php echo $this->webroot;?>cruisesinternational/<?php echo $child['Cruiseline']['slug'];?>" class="<?php if(isset($this->params['pass'][0]) && $child['Cruiseline']['slug']==$this->params['pass'][0]){echo "active";}?>"><?php echo ucfirst($child['Cruiseline']['title']);?> </a></li>
                    <?php 
                    }?>
                    </ul>
                 <?php
                 }?>
                 </li>
                 <?php
                 }?>
                 </ul>
                    
                 
         </div>
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
     <div class="right-content cruise-international-content clearfix">
      <h2 class="page_title"><?php echo ucwords($model['Cruiseline']['title']);?></h2>
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
       <?php echo $model['Cruiseline']['desc'];?>
  
</div><!-- right content -->