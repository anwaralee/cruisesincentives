
  <div class="left-sidebar why-cruise-sidebar clearfix">
    <div class="call-us-wrap left-content-block"> <img src="<?php echo $this->webroot;?>images/call-us.png"/>
      <div class="call-info">
        <div class="call-info-block"> <span class="call-place">North-America</span> <span class="call-no"> 800-529-6916 </span> <span class="call-place">Outside of North-America</span> <span class="call-no"> +1 305-539-6918 </span> </div>
      </div>
    </div>
    <div class="csi left-block-content"> <a href="csi.html"> <img src="<?php echo $this->webroot;?>images/csi.png"> </a> </div>
  </div>
  <!-- left sidebar -->
  <div class="right-content cruise-international-content resource-download clearfix">
      <h2 class="page_title"> Resource center</h2>
    <h3 class="title"><?php echo $title;?></h3>
  		<div class="donload-list-wrap">
        	<ol>
            <?php foreach($pdfs as $pdf){?>
                <li> 
                    <?php if($pdf['ResourcePdf']['pdf']!="" && file_exists(APP."webroot/pdf/".$pdf['ResourcePdf']['pdf'])){ ?><a href="<?php echo $this->webroot."resources/download/".$pdf['ResourcePdf']['pdf'];?>"class="pdf-ico" > <?php echo $pdf['ResourcePdf']['title'];?> </a> <?php } else echo $pdf['ResourcePdf']['title'];?>
                <?php $childs = $child->find('all',array('conditions'=>array('parent_id'=>$pdf['ResourcePdf']['id'])));
                if(count($childs)>1)
                {?>
                   <ul>
                   <?php foreach($childs as $p)
                         {?>
                            <li> <?php if($p['ResourcePdf']['pdf']!="" && file_exists(APP."webroot/pdf/".$p['ResourcePdf']['pdf'])){ ?><a href="<?php echo $this->webroot."resources/download/".$p['ResourcePdf']['pdf'];?>"class="pdf-ico" > <?php echo $p['ResourcePdf']['title'];?> </a> <?php } else echo $p['ResourcePdf']['title'];?></li>  
                   <?php }?>
                   </ul> 
                <?php }?>
                </li>
           <?php
                }?>
                </ol>

        </div>
  </div>

  <!-- right content --> 
  <div class="clear"></div>
  
