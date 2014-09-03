<div class="left-sidebar why-cruise-sidebar clearfix">
    	<div class="request left-content-block">
        	<a href="#"> <img src="<?php echo $this->webroot;?>images/request.png"> </a>
        </div>
        <div class="siderbar-title">
        	CSI
        </div>
    		<div class="side-menu left-content-block">
            	<div class="parent-list-wrap">
                	<ul>
                    <?php $lists = $this->requestAction('news/getcsi');
                    //var_dump($lists);
                        foreach($lists as $list)
                        {?>
                            <li class="parent-list"> <a href="<?php echo $this->webroot."csi/".$list['Csi']['title'];?>"><?php echo ucwords($list['Csi']['title']);?> </a> </li>
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
        
     
    </div><!-- left sidebar -->
    <div class="right-content why-cruise-content rightcontent clearfix">
    <h2 class="page_title"><?php echo ucfirst($model['Csi']['title']);?></h2>
    <?php echo $model['Csi']['desc'];?>
        
    </div>