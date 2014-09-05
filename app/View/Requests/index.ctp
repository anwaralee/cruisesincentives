<div class="left-sidebar why-cruise-sidebar clearfix">
    <div class="call-us-wrap left-content-block"> <img src="<?php echo $this->webroot;?>images/call-us.png">
      <div class="call-info">
        <div class="call-info-block"> <span class="call-place">North-America</span> <span class="call-no"> 800-529-6916 </span> <span class="call-place">Outside of North-America</span> <span class="call-no"> +1 305-539-6918 </span> </div>
      </div>
    </div>
  </div>
  <!-- left sidebar -->
  <div class="right-content why-cruise-content request-porposal clearfix">
    <h2 class="page_title"> Request Proposal or information for your Meeting, <br/> Incentive or Event </h2>
    <strong> Thank you for visiting our website </strong>
    
    <div class="register-user">
    	<h3 class="register-user-title"> Register user </h3>
         <li id="autofill"> click here to <?php if(!$this->Session->read('user')){ ?><a href="#" class="login"> log in  </a> or<?php }?> autofill your contact info below </li>
    </div>
    <div class="request-form">
    	<div class="request-form-title">  Contact information </div>
        <div class="indicate"> <span class="req">*</span> <em> indicate a Required Field </em> </div>
        <form class="request-proposal-form" action="" enctype="multipart/form-data" method="post">
        	<div class="name-block clearfix">
            <div>
            <label> <span class="req">*</span> First Name: </label>
            	<input type="text" name="name" id="name" value="" required />
            </div> 
             <div>
            <label> <span class="req">*</span> Last Name: </label>
            	<input type="text" name="surname" id="surname" value="" required>
            </div> 
            </div> <!-- name-block -->
            <div class="company clearfix">
              <div>
            <label> <span class="req">*</span> Company: </label>
            	<input type="text" name="company" id="company" value="" required>
            </div> 
           </div> <!-- company -->
             <div class="Title company clearfix">
              <div>
            <label class="title-form"> Title: </label>
            	<input type="text" name="title" id="title" value=""  />
            </div> 
           </div> <!-- company -->
           <div class="name-block email clearfix">
            <div>
            <label> <span class="req">*</span> Bussiness Phone: </label>
            	<input type="text" name="telephone" id="telephone" value="" required />
            </div> 
             <div>
            <label> <span class="req" >*</span> Email: </label>
            	<input type="email" name="email" id="email" value="" required />
            </div> 
            </div><!-- name-block -->
            <div class="name-block zipcode clearfix">
            <div>
            <label class="title-form"> City: </label>
            	<input type="text" name="city" value="" id="city" />
            </div> 
             <div>
            <label> Zipcode: </label>
            	<input type="text" name="zip" id="zip" value="" />
            </div> 
            </div> <!-- name-block -->
            
            <div class="select clearfix">
            <div>
            	<label class="title-form"> state: </label>
                <input type="text" value="" name="state"/>
           		<!--<select name="state" id="state" >
             			<option value="Select a State">Select a State </option>
                </select>-->              
             </div>
             
             <div>
            	<label> country: </label>
           		<select name="country" id="country" >
                    <option value="">Select Country</option>
                <?php $con = $this->requestAction('login/get_country');
                        foreach($con as $c)
                        {?>
                            <option value="<?php echo $c['Country']['country_name'];?>"><?php echo $c['Country']['country_name'];?></option>
                        <?php    
                        }
                ?>
             			
                </select>              
             </div>
            </div> <!-- select -->
            
             <div class="select how-did clearfix">
            <div>
            	<label><span class="req">*</span> <span class="hear-question">How did you hear <br/> about us ?:</span> </label>
           		<select name="stat" id="stat" required>
             			<option value="">Select One </option>
                        <option value="Friends">Friends</option>
                        <option value="Advertisement">Advertisement</option>
                        <option value="Other">Other</option>
                </select>              
             </div>
            </div> <!-- select -->
            
            <div class="request-form-title events-inform">  Event information </div>
               <div class="select how-did clearfix">
            <div>
            	<label> Event Type:</label>
           		<select name="type" id="type" >
             			<option value="Meeting">Meeting </option>
                </select>              
             </div>
            </div> <!-- select -->
            
              <div class="name-block dateof clearfix">
            <div>
            <label> Date of Event: </label>
            	<input type="text" name="date" id="date" class="date" >
            </div> 
            </div>
            
                 <div class="selects how-did clearfix">
            <div>
            	<label> Number of Nights:</label>
           		<select name="night" id="night" >
             			<option value="Any">Any </option>
                        <?php for($i=1;$i<=10;$i++)
                        {?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>  
                        <?php
                        }?>
                </select>              
             </div>
            </div> <!-- select -->
            
              <div class="name-block dateof clearfix">
            <div>
            <label> Number of guest <br/> Rooms: </label>
            	<input type="text" name="rooms" id="rooms" >
            </div> 
            </div>
            
            <div class="choose-deastnation">
            	<div class="title-choose"> choose your destinations : </div>
                <select name="dest1" id="dest1"> 
                <option value="Please choose a Destination">Please choose a Destination </option>
                <?php 
                    $dest = $this->requestAction('login/get_destination');
                    foreach($dest as $d){?>
                        <option value="<?php echo $d['Destination']['title'];?>"><?php echo $d['Destination']['title'];?></option>
                <?php }?>
                </select>
                  <select name="dest2" id="dest2" > 
                <option value="Please choose a Destination">Please choose a Destination </option>
                <?php
                foreach($dest as $d){?>
                        <option value="<?php echo $d['Destination']['title'];?>"><?php echo $d['Destination']['title'];?></option>
                <?php }?>
                </select>
                <div class="additonal">
                <div class="title-choose"> Additional Information: </div>
                <textarea name="info" id="info"> </textarea>
                     </div> <!-- additional -->
             </div>
             
             <div class="attach">
             	<div class="attch-text"> Attach your RFP <br/> (Optional) </div>
                <span> If you already have rfp for this program </span>
                <div class="clear"> </div>
                <div>
                	<label class="upload-label"> upload </label>
                    <input type="text" class="field">
                    <input type="file" value="" name="file">
             </div>
             
             
             <div class="submit-quote">
             	<input type="submit" name="submit" value="Request your quote" class="request-quote">
                <div class="numb-info">
                have a techincal question ? <br/> (800)443-5789
                </div>
             </div>
        </form>
    	
    </div> <!-- request-form -->
  </div>
  <!-- right content --> 
  </div>
  <script type="text/javascript">
    $(function(){
        //$('.date').datepicker();
        $('#autofill').click(function(){
            s = new Array();
            $.ajax({
                url:"<?php echo $this->webroot;?>login/getuser",
                dataType:'json',
                success:function(msg)
                {
                     $.each(msg, function(index, element) {
                            $('#'+index).val(element);
                            //alert(index+'='+element);
                        });
                    
                    
                }
            })
            
        });
    })
  </script>