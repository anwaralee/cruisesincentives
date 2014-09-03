<div class="left-block-content1">
    	<div class="map">
        <div class="destination-point">
        	<img src="<?php echo $this->webroot;?>images/map.jpg">
            <ul>
            	<li class="asia"> <a href="#" class="clearfix"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="europe"> <a href="#"><span class="name"> Europe </span> <span class="arrow">>></span> </a> </li>
                <li class="south-amerivca"> <a href="#"><span class="name"> south-america </span><span class="arrow">>></span> </a> </li>
                <li class="north-america"> <a href="#"><span class="name"> north-america </span> <span class="arrow">>></span> </a> </li>
                <li class="africa"> <a href="#"><span class="name"> Africa </span> <span class="arrow">>></span> </a> </li>
                <li class="a"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="b"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="c"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="d"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="e"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="f"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="g"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="h"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="i"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                <li class="j"> <a href="#"> <span class="name"> Asia </span> <span class="arrow">>></span> </a> </li>
                
        </div>
            <?php echo $home['Page']['description'];?>
        </div> <!-- map end -->
        
        <div class="post-block-wrap clearfix">
        	<div class="post-block">
            	<div class="title-post"> Corporate Events </div>
                <div class="content-post"> <?php echo substr($events['Page']['description'],0,200);?></div>
                 <a class="view-more" href="<?php echo $this->webroot."pages/corporate-events";?>"> view more </a>
            </div>
            <div class="post-block">
            	<div class="title-post"> Full Ship Charters </div>
                <div class="content-post"><?php echo substr($full['Page']['description'],0,200);?></div>
                <a class="view-more" href="<?php echo $this->webroot."pages/full-ship-charters";?>"> view more </a>
            </div>
            <div class="post-block">
            	<div class="title-post"> CSI Insentive</div>
                <div class="content-post"><?php echo substr($csi['Page']['description'],0,200);?></div>
                <a class="view-more" href="<?php echo $this->webroot."pages/csi-insentive";?>"> view more </a>
            </div>
        </div><!--post-block-->
    </div><!--left-block-conten-->
    
    
    
    
    <div class="sidebar">
    	<div class="book-event-block">
        	<div class="book-title"> BOOK YOUR EVENT </div>
            <div class="book-details">
            <div class="detail">
           	 	North America <br/>
				800-529-6916
			</div>
            <div class="detail">
			Outside of North America<br/>
			+1 305-539-6918 
			</div>
            <div class="detail">
			RoyalMeetingsandIncentives@rccl.com
            </div>
            </div>
            <a href="#" class="req_quote">Request a Quote >></a>
        </div><!--book-event-block-->
        
        		<div class="lates-news-wrap">
                	<div class="news-title">LATEST NEWS & DEALS </div>
                    	<ul class="news-list">
                        <?php $news = $this->requestAction('news/getnews'); 
                            foreach($news as $n)
                            {?>
                            <li><a href="<?php echo $this->webroot."news/".$n['News']['slug'];?>"><?php echo $n['News']['title'];?></a></li>
                            <?php
                            }
                        ?>
                        	
                        </ul>
                        <!--<span style="margin-left: 200px;"><a href="<?php echo $this->webroot;?>news/all">View All</a></span>-->
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
                            	<label> <span class="req"> * </span> numbers of guest rooms </label>
                                <input type="text">
                            </div>
                             <div>
                            	<label> largets meeting rooms (seats) </label>
                                <input type="text">
                            </div>
                       </div> <!-- sec_block -->
                       <div class="submit">
                       	<input type="button" value="search >>"/>
                        <a href="#" class="advance"> Advance search </a>
                       </div>
                    </form>
                </div>
    	
    </div>