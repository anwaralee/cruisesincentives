<div class="wrapper" style="width: 600px;margin: 0 auto;font-family:sans-serif;">
<div style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;">
<div style="float: left;width:220px;padding-top:5px;"><img src="<?php echo $base_url;?>/img/admin/logo.png" /></div>
<div style="float: right;font-size:13px;color:#555;font-weight:bold;font-style:italic;"><h1 style="color: #002C99;font-size:25px;font-style:italic;margin:0;padding:0;margin-bottom:5px;">NEWSLETTER</h1><?php echo $nl['Newsletter']['pub_date'];?></div>
<div style="clear: both;"></div>
</div>
<div style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;">
<h1 style="color: #002C99;font-size:22px;font-style:italic;margin:0;padding:0;margin-bottom:5px;"><?php echo $nl['Newsletter']['title'];?></h1>
<div style="font-style: italic;color:#777;line-height:25px;font-size:14px;padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;">
    <?php echo $nl['Newsletter']['description'];?>
</div>
<h1 style="color: #002C99;font-size:22px;font-style:italic;margin:0;padding:0;margin-bottom:15px;">News/Deals</h1>
<?php
if($news)
{
    foreach($news as $n)
    {
        $q = $img->find('first',array('conditions'=>array('type'=>'news','type_id'=>$n['News']['id']),'order'=>'id ASC')); 
        ?>
        <div style="background:#f5f5f5;border: 1px solid #6999C1;padding:10px;margin-bottom:15px;">
        <div style="float: left;width:160px;min-height: 90px;background:#e5e5e5;">
        <?php
        if($q)
        {
            ?>
            
            <img src="<?php echo $base_url;?>/doc/thumb1/<?php echo $q['Image']['file'];?>" style="width: 160px;" />
        <?php
        }
        ?>    
        </div>
        <div style="float: right;width:400px">
            <a href="<?php echo $base_url;?>/news/<?php echo $n['News']['slug'];?>" style="font-weight:bold;text-decoration:none;display:block;color:#2B579A;font-size:14px;padding-bottom:5px;"><?php echo $n['News']['title'];?></a>
            <em style="font-size: 12px;color:#777;"><?php echo $n['News']['added_on'];?></em>
            <div style="color: #555;line-height:25px;font-size:14px;"><em><?php echo substr($n['News']['desc'],0,120).'...';?></em></div>
        </div>
        <div style="clear: both;"></div>
        </div>
        <?php
    }
}
?>
</div>
<?php
if($nl['Newsletter']['attachment'])
{
    ?>
    <div style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;">
    <h1 style="color: #002C99;font-size:22px;font-style:italic;margin:0;padding:0;margin-bottom:15px;">Attachments</h1>
    <a href="<?php echo $base_url;?>/doc/<?php echo $nl['Newsletter']['attachment'];?>" style="text-decoration: none;color:#FFF;background:#3F5E7D;padding:7px 15px;"><?php echo $nl['Newsletter']['attachment_title'];?> (Download)</a>
    </div>
    <?php
}
?>

<img src="<?php echo $base_url;?>/images/newsletter_footer.jpg" style="padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;" />
<div style="text-align: center;font-size:11px;padding-bottom: 20px;margin-bottom:20px;border-bottom: 1px dotted #002C99;"><a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Home</a>&nbsp; <a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Why Cruise</a>&nbsp; <a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Cruises Internation Experiences</a>&nbsp; <a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Destination</a>&nbsp; <a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Resource Center</a>&nbsp; <a href="<?php echo $this->webroot?>" style="text-decoration: none;color:#555;">Cruises Search</a>&nbsp; </div>
<div style="text-align: center;font-size:12px;padding-bottom: 20px;"><a href="#" style="color: #555;text-decoration:none;">Unsubscribe from this newsletter</a></div>
</div>