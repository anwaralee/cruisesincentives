<div class="left-block-content1">
    	<div class="map">
        <div class="destination-point">
        	<img src="<?php echo $this->webroot;?>images/map.jpg">
            <ul>
            	<li class="asia"> <a href="<?php echo $this->webroot;?>destinations#Asia" class="clearfix"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="europe"> <a href="<?php echo $this->webroot;?>destinations#Europe"><span class="name"> Europe </span> <span class="arrow">>></span> </a> </li>
                <li class="south-amerivca"> <a href="<?php echo $this->webroot;?>destinations#South_America"><span class="name"> South America </span><span class="arrow">>></span> </a> </li>
                <li class="hawaii"> <a href="<?php echo $this->webroot;?>destinations#Hawaii"><span class="name"> Hawaii </span> <span class="arrow">>></span> </a> </li>
                <li class="africa"> <a href="<?php echo $this->webroot;?>destinations#Africa"><span class="name"> Africa </span> <span class="arrow">>></span> </a> </li>
                <li class="alaska"> <a href="<?php echo $this->webroot;?>destinations#Alaska"> <span class="name"> Alaska </span> <span class="arrow">>></span> </a> </li>
                <li class="estonia"> <a href="<?php echo $this->webroot;?>destinations#Estonia"> <span class="name"> Estonia </span> <span class="arrow">>></span> </a> </li>
                <li class="dubai"> <a href="<?php echo $this->webroot;?>destinations#Dubai_Emirates"> <span class="name"> Dubai </span> <span class="arrow">>></span> </a> </li>
                <li class="canada"> <a href="<?php echo $this->webroot;?>destinations#Canada_New_England"> <span class="name"> Canada </span> <span class="arrow">>></span> </a> </li>
                <li class="bahamas"> <a href="<?php echo $this->webroot;?>destinations#Bahamas"> <span class="name"> Bahamas </span> <span class="arrow">>></span> </a> </li>
                <li class="bermuda"> <a href="<?php echo $this->webroot;?>destinations#Bermuda"> <span class="name"> Bermuda </span> <span class="arrow">>></span> </a> </li>
                <li class="caribbean"> <a href="<?php echo $this->webroot;?>destinations#Carribean"> <span class="name"> Carribean </span> <span class="arrow">>></span> </a> </li>
                <li class="indian"> <a href="<?php echo $this->webroot;?>destinations#Indian_Ocean_Islands"> <span class="name"> Indian Ocean Islands </span> <span class="arrow">>></span> </a> </li>
                <li class="australia"> <a href="<?php echo $this->webroot;?>destinations#Australia_Newzealand"> <span class="name">Australia </span> <span class="arrow">>></span> </a> </li>
                <li class="panama"> <a href="<?php echo $this->webroot;?>destinations#Panama_Canal"> <span class="name"> Panama canal </span> <span class="arrow">>></span> </a> </li>
                
        </div>
            <?php echo $home['Page']['description'];?>
        </div> <!-- map end -->
        
        <div class="post-block-wrap clearfix">
        	<div class="post-block">
            	<div class="title-post"> Corporate Events </div>
                <div class="content-post"> <?php echo substr(preg_replace("/<img[^>]+\>/i", "(image) ", $events['Page']['description']),0,200);?></div>
                 <a class="view-more" href="<?php echo $this->webroot."pages/corporate-events";?>"> view more </a>
            </div>
            <div class="post-block">
            	<div class="title-post"> Full Ship Charters </div>
                <div class="content-post"><?php echo substr(preg_replace("/<img[^>]+\>/i", "(image) ", $full['Page']['description']),0,200);?></div>
                <a class="view-more" href="<?php echo $this->webroot."pages/full-ship-charters";?>"> view more </a>
            </div>
            <div class="post-block">
            	<div class="title-post"> CSI Insentive</div>
                <div class="content-post"><?php echo substr( preg_replace("/<img[^>]+\>/i", "", $csi['Page']['description']),0,200);?></div>
                <a class="view-more" href="<?php echo $this->webroot."pages/csi";?>"> view more </a>
            </div>
        </div><!--post-block-->
    </div><!--left-block-conten-->
    
    
    
    
    <div class="sidebar">
    	<div class="book-event-block">
        	<div class="book-title"> BOOK YOUR EVENT </div>
            <div class="book-details">
            <div class="detail">
           	 	<strong>North America</strong><br/>
				800-529-6916
			</div>
            <div class="detail">
			<strong>Outside of North America</strong><br/>
			+1 305-539-6918 
			</div>
            <div class="detail">
			RoyalMeetingsandIncentives@rccl.com
            </div>
            </div>
            <a href="<?php echo $this->webroot."requests";?>" class="req_quote">Request a Quote >></a>
        </div><!--book-event-block-->
        
        		<div class="lates-news-wrap">
                	<div class="news-title">LATEST NEWS & DEALS </div>
                    <?php $news = $this->requestAction('news/getnews');
                    if(count($news)>0){?>
                    	<ul class="news-list">
                        <?php 
                        
                            foreach($news as $n)
                            {
                                ?>
                            <li><a href="<?php echo $this->webroot."news/".$n['News']['slug'];?>"><?php echo $n['News']['title'];?></a></li>
                            <?php
                            }
                        ?>
                        	
                        </ul>
                        
                        <span style="margin-left: 200px;"><a href="<?php echo $this->webroot;?>news/all">View All</a></span>
                        <?php }?>
                </div>
                
                <div class="cruse-search-wrap clearfix">
                <div class="crush-title">Join Our Newsletter</div>
                <form method="post" class="cruse-from" >
                    <div class="clearfix">
                        <label>Deals and Specials - Be the first to Know!</label>
                        <input type="text" name="emailz" id="emailz" value="" placeholder="Your Email Address" />
                        <div class="newsletter_error"></div>
                        <div class="submit">
                        <input type="button"  value="Join" class="add_news"/>
                        </div>
                        
                    </div>
                </form>
                </div>
                <div class="cruse-search-wrap">
                	<div class="crush-title"> CRUISE SEARCH </div>
                    <form method="post" class="cruse-from">
                    <div class="first-block clearfix">	
                        <div>
                        	<label> <span class="req"> * </span> Earliest Departure </label>
                            <input type="date" > <span class="calendar"> </span>
                        </div>
                        <div>
                        	<label> <span class="req"> * </span> Latest Return </label>
                            <input type="date" ><span class="calendar"> </span>
                        </div>
                       </div>
                       <div class="sec_block clearfix">
                       	<div>
                        	<label> <span class="req"> * </span> Destinations </label>
                            <select> 
                            	<option> Choose a destination </option>
                            </select>
                        </div>
                        	<div>
                        	<label> <span class="req"> * </span> How mnay flights </label>
                            <select class="any"> 
                            	<option> Any </option>
                            </select>
                        	</div>
                            <div>
                            	<label> <span class="req"> * </span> Numbers of guest rooms </label>
                                <input type="text">
                            </div>
                             <div>
                            	<label> Largest meeting rooms (seats) </label>
                                <input type="text">
                            </div>
                       </div> 
                       <div class="submit">
                       	<input type="button" value="search >>"/>
                        <a href="#" class="advance"> Advance search </a>
                       </div>
                    </form>
                    <!--<iframe src="http://smartsitesa.cruisefactory.net/specials/searchupdate?__ajax=true&smartsiteid=179" frameborder="0" border="0" width="290" height="402"></iframe>-->
                </div>
    	
    </div>
    <script>
    function validateEmail1(email){ 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
    } 
    $(function(){
        $('.add_news').click(function(){
            $('.newsletter_error').html("");
            $('.newsletter_error').show();
            var email = $('#emailz').val();
            if(validateEmail1(email)){            
            $.ajax({
                url:"<?php echo $this->webroot;?>newsletters/add/",
                data:'email='+email,
                type:'post',
                success:function(msg)
                {
                    
                    if(msg==1)
                    {
                        $('.newsletter_error').html("Sorry. The email provided has already been subscribed."); 
                         $('#emailz').val("");  
                    }
                    else
                    {
                        $('.newsletter_error').html("Thankyou, Your email has been subscribed."); 
                         $('#emailz').val(""); 
                        
                    }
                }
            });
            }
            else
            {
                $('.newsletter_error').html("Invalid Email");
            }
            $('.newsletter_error').fadeOut(3000,'linear');
        })
    })
    </script>