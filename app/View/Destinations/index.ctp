<script>
$(function(){
    $('a.modalButton').on('click', function(e) {
    var src = $(this).attr('data-src');
    var height = $(this).attr('data-height') || 300;
    var width = $(this).attr('data-width') || 400;

    $(".modal-body iframe").attr({'src':src,
                               'height': height,
                               'width': width});
    $('.modal-body, .overlay').show();
    
    });
     $(".close,.close-btn").click(function(){
        $(".modal-body,.overlay").hide();
        });
    var hashTagActive = "";
    $(".scroll").click(function (event) {
        if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                dest = $(document).height() - $(window).height();
            } else {
                dest = $(this.hash).offset().top;
            }
            //go to destination
            $('html,body').animate({
                scrollTop: dest
            }, 1000, 'swing');
            hashTagActive = this.hash;
        }
    });
    
})
</script>
<div class="modal-body" style="display: none;">
<span class="close-btn"> </span> 
    <iframe frameborder="0"></iframe>
    <div class="submit clearfix">
    	<input type="button" class="close" value="Close">
        
    </div>   
    
</div>
<div class="overlay"> </div>

<div id="main" class="clearfix"> 
		<div class="left-sidebar why-cruise-sidebar clearfix">
        <div class="request left-content-block">
        	<a href="<?php echo $this->webroot;?>requests"> <img src="<?php echo $this->webroot;?>images/request.png"> </a>
        </div>
        <div class="siderbar-title">
        	Destinations
        </div>
    		<div class="side-menu left-content-block">
            	<div class="parent-list-wrap">
                	<ul>
                    <?php foreach($destinations as $destination){
                        $title = str_replace("/","_",$destination['Destination']['title']);
                        $title = str_replace(" ","_",$title);
                        
                        ?>
                            
                            <li class="parent-list"> <a href="#<?php echo $destination['Destination']['slug'];?>" class="scroll"> <?php echo ucfirst($destination['Destination']['title']);?> </a> </li> 
                    <?php }?>
                   
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
    <div class="right-content destination clearfix">
 <div class="top-block-destination">
    <h2 class="page_title"> <?php echo ucfirst($page['Pages']['title']);?> </h2>
    <?php echo $page['Pages']['description'];?>
  </div>  
  <div class="bottom-block-destination clearfix">  
 <?php foreach($destinations as $de)
 {
    $emb = str_replace('watch?v=','embed/',$de['Destination']['youtube_link']);
    $title = str_replace("/","_",$de['Destination']['title']);
    $title = str_replace(" ","_",$title);
                        
    ?>
    <div class="destination-detail-wrap clearfix" id="<?php echo $de['Destination']['slug'];?>">
        <div class="destination-img-block">
        	<img src="<?php echo $de['Destination']['thumb_img'];?>" width="190px" height="78px"/>
            <a class="view-video modalButton" data-toggle="modal" data-src="<?php echo $emb;?>" data-height=320 data-width=450 data-target=".modal-body">view video</a>
        </div>
        <div class="destination-content">
        <h2 class="page_title"> <?php echo ucfirst($de['Destination']['title']);?> </h2>
        <?php echo $de['Destination']['desc'];?>
        <?php $highlights = $highlight->find('all',array('conditions'=>array('destination_id'=>$de['Destination']['id'])));
        if(count($highlights)>0){?>
        <div class="highlights-wrap">
        	<div class="highligt-title"> Highlights </div>
                <ul>

                <?php 
                foreach($highlights as $h)
                {?>
                    <li><?php echo $h['Highlight']['desc'];?></li>
                <?php    
                }
                ?>
                </ul>
        </div>
        <?php }?>
        </div>
    </div>
 <?php
 unset($highlights);
 }  ?> 
 </div>   
<!--bottom-block-destination-->
    </div><!-- right content -->

</div>