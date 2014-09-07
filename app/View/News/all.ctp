<div class="left-sidebar why-cruise-sidebar clearfix">
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
    <div class="right-content why-cruise-content news clearfix">
    <h2 class="page_title"> <?php echo ucfirst("CSI News");?> </h2>
    
     <?php foreach($news as $new){?>
    <div class="items">
        <div class="img">
        <a href="<?php echo $this->webroot;?>news/<?php echo $new['News']['slug'];?>">
        <?php if($images =  $image->find('first',array('conditions'=>array('type'=>'news','type_id'=>$new['News']['id']))))
            {
                if(file_exists(APP."webroot/doc/thumb1/".$images['Image']['file']))
                {
                    echo "<img src='".$this->webroot."doc/thumb1/".$images['Image']['file']."' >";
                }
            }
            else
            {
        ?>
         <img src="<?php echo $this->webroot;?>images/default.png" /> 
         <?php }?></a>  
        </div>
        <div class="news">
            <h3><a href="<?php echo $this->webroot;?>news/<?php echo $new['News']['slug'];?>"><?php echo $new['News']['title'];?></a></h3>
            
            <span class="newsdate"><?php echo date('d F Y',time($new['News']['added_on']));?></span>
            <div><?php echo strip_tags(substr($new['News']['desc'],0,150)).'...';?></div>
            
        </div>
        <div class="clearfix"></div>
    </div>
    <?php }?>
   
   <div class="pagination">
   <ul>
   
   <?php echo $this->Paginator->prev("<<", array('tag' => 'li'));?>
   <?php echo $this->Paginator->numbers(array('tag'=>'li','first' => 2, 'last' => 2,'separator'=>''));?>
   <?php echo $this->Paginator->next(">>", array('tag' => 'li'));?>
   </ul>
   </div>
    </div><!-- right content -->
