<div class="left-sidebar why-cruise-sidebar clearfix">
        <div class="siderbar-title">
        	Latest News and Deals
        </div>
    		<div class="side-menu left-content-block news-sidebar">
            	<div class="parent-list-wrap">
                	<ul>
                    <?php foreach($news as $n)
                    {?>
                        <li class="parent-list"> <a href="<?php echo $this->webroot."news/".$n['News']['slug'];?>"><?php echo $n['News']['title']?> </a></li>
                    <?php
                    }?>
                    	
                    </ul>
                </div>
            </div>
            
               <div class="siderbar-title">
        	Newsletters
        </div>
    		<div class="side-menu left-content-block">
            	<div class="parent-list-wrap">
                <ul>
                <?php $newsletters = $this->requestAction('news/getnewsletter');
                      foreach($newsletters as $newsletter)
                      {?>
                        <li class="parent-list"> <a href="<?php echo $this->webroot;?>newsletters/preview/<?php echo $newsletter['Newsletter']['id'];?>" target="_blank"> <?php echo $newsletter['Newsletter']['title'];?> </a> </li>
                      <?php
                      }
                ?>
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
        
        	<div class="csi left-block-content">
            	<a href="<?php echo $this->webroot;?>pages/csi"> <img src="<?php echo $this->webroot;?>images/csi.png"> </a>
            </div>
    </div><!-- left sidebar -->
    <div class="right-content why-cruise-content news clearfix">
    <h2 class="page_title"> <?php echo ucfirst($model['News']['title']);?> </h2>
    <?php if($model['News']['banner']!="" && file_exists(APP."webroot/doc/thumb/".$model['News']['banner'])){?>
		<div class="news-banner"> 
        	<img src="<?php echo $this->webroot."doc/thumb/".$model['News']['banner'];?>" />
        </div>
    
    <div class="img-wrap clearfix">
    <?php if(count($images)>0){?> 
   	
    <?php foreach($images as $image){?>
    	<div class="img-block">
        <img src="<?php echo $this->webroot."doc/thumb1/".$image['Image']['file'];?>"/>
        </div>
    <?php }?>
    <br/> 
    <?php }?>
        <?php echo $model['News']['desc'];?>
    
    
    </div>
      <?php }
      else
      {
            echo $model['News']['desc'];
      }
      ?>  
   
    </div><!-- right content -->
