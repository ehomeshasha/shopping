<? if(!defined('IN_SYSTEM')) exit('Access Denied'); include template('header', '0', ''); ?><div class="main">
<div class="image_layer" style="position:absolute;top:5em;left:0;z-index:998;padding:8px 8px;background-color:rgba(0,0,0,0.1);display:none;">
<span class="image_close_btn glyphicon glyphicon-remove-sign" style="position:absolute;right:0;top:-5px;font-size:1.5em;z-index:999;cursor:pointer;"></span>
<div class="image_container"></div>	
</div>
<div class="row">
<div class="col-xs-5 col-lg-3 clearfix prm">
<div class="list-group"><? if(is_array($category_list)) { foreach($category_list as $v) { ?><a href="index.php?home=menu&amp;cid=<?=$v['cid']?>" class="list-group-item category_list active">
<span class="badge"><?=$v['count']?></span>
<?=$v['name']?>
</a><? } } ?></div>
</div>
<div class="col-xs-7 col-lg-9 clearfix no-padding-left">
<div class="list-group"><? if(is_array($dishes)) { foreach($dishes as $val) { ?><div class="list-group-item clearfix food_block" style="padding-left:5px;padding-right:0px;">
<div class="pull-left food_image_area mrn">
<a href="javascript:;" class="food_image_link">
<img src="<?=$_G['siteurl']?><?=$val['path']?>" alt="<?=$val['name']?>" class="img-responsive food_image" />
</a>
</div>
<div class="pull-left  food_info_area">
<div><?=$val['name']?></div>
<div class="clearfix">
<div class="pull-left">
<?=$val['price']?>								
</div>
<div class="pull-right">
<span class="glyphicon glyphicon-minus-sign minus_btn" data-id="<?=$val['id']?>" style="font-size:1.2em;"></span>
<span class="order_number xw1" style="font-size:1.2em;"><?=$val['current_count']?></span>
<span class="glyphicon glyphicon-plus-sign plus_btn" data-id="<?=$val['id']?>" style="font-size:1.2em;"></span>
</div>
</div>
</div>
</div><? } } ?></div>
</div>
</div>
</div><? include template('footer', '0', ''); ?>