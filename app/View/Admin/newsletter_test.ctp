
<aside class="sidebar floatLeft">
<ul>
<li class="titles">Newsletters</li>
<?php
if($nl) 
foreach($nl as $n)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $n['Newsletter']['id'];?>"><?php echo $n['Newsletter']['title'];?></a></li>
<?php 
}?>
</ul>
</aside>
<aside class="contentRight floatRight" >
    	<?php
        if(isset($id_newsletter))
        {
         if(!isset($news))
         {
            $news['Newsletter']['title'] = '';
            $news['Newsletter']['description'] = '';
            $news['Newsletter']['news_id'] = '';
            $news['Newsletter']['attachment'] = '';
            $news['Newsletter']['attachment_title'] = '';
            $news['Newsletter']['pub_date'] = '';
            $news['Newsletter']['id'] = 0;
         }
            
            ?>
            <ul class="subnav">
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/info">Newsletter Info</a></li>                
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/preview">Preview</a></li>
                <li class="active"><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/test">Test</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/send">Send</a></li>
            </ul>
            <hr />
            <strong>Send yourself an email</strong>
            <hr />
            <p class="test">
            <form action="" method="post">
            <input type="text" name="email" placeholder="Your Email Address" /> <input type="submit" value="Send" class="btn btn-info" />
            </form>
            </p>
            <?php
        }
        ?>
</aside>

<div class="clear"></div>
