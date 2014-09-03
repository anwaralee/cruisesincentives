  <div class="left-sidebar why-cruise-sidebar clearfix">
        <div class="siderbar-title">
        	Cruise line
        </div>
        <div class="side-menu left-content-block">
         <div class="parent-list-wrap">
           <ul>
           <?php foreach($cruises as $cruise){?>
             <li class="parent-list"> <a href="#"> <?php echo ucfirst($cruise['Cruiseline']['title']);?> </a>
                <?php $childs = $cruiseline->find('all',array('conditions'=>array('parent_id'=>$cruise['Cruiseline']['id'])));
                if(count($childs)>0)
                {?>
                    <ul class="sub-menu-sidebar">
                 <?php
                    foreach($childs as $child)
                    {?>
                       <li class="child-list"> <a href="<?php echo $this->webroot;?>cruisesinternational/<?php echo $child['Cruiseline']['slug'];?>"><?php echo ucfirst($child['Cruiseline']['title']);?> </a></li>
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
         <img src="images/call-us.png">
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
         <a href="csi.html"> <img src="images/csi.png"> </a>
       </div>
     </div><!-- left sidebar -->
     <div class="right-content cruise-international-content clearfix">
      <h2 class="page_title"> Why Cruise </h2>
      <h3 class="title"> What is lorem Ipsum </h3>
      <div class="img-wrap clearfix">
       <div class="img-block">
        <img src="images/cruise-img1.png">
      </div>
      <div class="img-block">
       <img src="images/cruise-img2.png">
     </div>
     <div class="img-block">
       <img src="images/cruise-img3.png">
     </div>
   </div>
   
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
   
   
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

   <h3 class="title"> What is lorem Ipsum </h3>
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
   
   <ul>
    <li>onec tempus nibh et enim pulvinar, at molestie justo faucibus.</li>
    <li> Nullam at quam et risus efficitur cursus vitae ut diam.</li>
    <li>Curabitur imperdiet dui eu elit accumsan, in maximus lectus fringilla.</li>
    <li>Duis ac mauris at ipsum eleifend aliquet.</li>
    <li>Curabitur et nisi in tortor sodales luctus.</li>
  </ul>
  <h3 class="title"> What is lorem Ipsum </h3>
  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div><!-- right content -->