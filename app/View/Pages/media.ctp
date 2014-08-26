                        <h1 class="title"><span>Media > <?php echo $slug;?></span></h1>
                        <div class="description">
                                    <?php
                                    foreach($media as $p)
                                    {
                                        ?>
                                        <div class="medialist">
                                            <?php
                                            if($slug!='Audio-Visual'){
                                            ?>
                                            <div style="margin-bottom:12px;padding:5px 10px;background:#e5e5e5;border-radius:10px;"><div class="mtitle left" style="width: 200px;margin-right:15px;"><?php echo $p['Media']['title'];?></div><div class="action right"><a href="javascript:void(0)" class="open-popup-link btn media" onclick="$('.popover').html('<iframe src=\'https://docs.google.com/gview?url=<?php echo urlencode('http://web-nepal.com/isangh/doc/'.$p['Media']['file']);?>&embedded=true\' style=\'width:500px; height:630px;\' frameborder=\'0\'></iframe><p>');$('.popover').dialog({modal:true,width:555});">View</a> &nbsp; <a href="http://web-nepal.com/isangh/doc/<?php echo $p['Media']['file'];?>" class="btn">Download</a></div>
                                            <div class="clear"></div>
                                            </div>
                                            <?php }
                                            else
                                            {
                                                ?>
                                                <div style="margin-bottom:12px;padding:5px 10px;background:#e5e5e5;border-radius:10px;">
                                                <div class="mtitle left" style="width: 200px;margin-right:15px;margin-bottom:12px;padding:5px 10px;background:#e5e5e5;border-radius:10px;"><?php echo $p['Media']['title'];?></div><div class="action right"><a class="btn" href="javascript:void(0)" class="open-popup-link" onclick="$('.popover').load('<?php echo $this->webroot;?>pages/player/<?php echo $p['Media']['id'];?>');$('.popover').dialog({modal:true,width:<?php if($p['Media']['file']){?>355<?php }else{?>555<?php }?>});">View</a> &nbsp; <a class="btn" href="http://web-nepal.com/isangh/doc/<?php echo $p['Media']['file'];?>">Download</a></div>
                                                <div class="clear"></div>
                                                </div>
                                                <?php
                                            }
                                            ?> 
                                        </div>
                                        <?php
                                        
                                    }
                                    ?>
                                </div>
                                <div  class="popover mfp-hide" title="test"> </div>
                                <style>
        .mfp-hide{display:none;}
        
	</style>