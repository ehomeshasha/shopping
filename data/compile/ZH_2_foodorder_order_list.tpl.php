<? if(!defined('IN_SYSTEM')) exit('Access Denied'); include template('admin#header', '0', ''); ?><div class="tab-content"><? include template('breadcrumb', '0', ''); ?><?=$_G['message']?>
<table class="table table-condensed">
<tr>
<td width="">ID</td>
<td width="">OrderID</td>
    	<td width="">Amount</td>
    	<? if(!$_G['mobile']) { ?>
    	<td width="">Phone</td>
    	<td width="">Address</td>
    	<? } ?>
    	<td width="">Createtime</td>
    	<td width="">Opration</td>
  	</tr><? if(is_array($orders)) { foreach($orders as $k => $v) { ?><tr>

    	<td><?=$v['id']?></td>
    	<td><?=$v['order_id']?></td>
    	<td><?=$v['totalprice']?></td>
    	<? if(!$_G['mobile']) { ?>
    	<td><?=$v['phone']?></td>
    	<td><? echo get_br($v['address']); ?></td>
    	<? } ?>
    	<td><? echo get_abbr_date($v['dateline'], true); ?></td>
    	<td>
    		<a href="index.php?home=foodorder_order&amp;act=view&amp;id=<?=$v['id']?>">View</a>
    	</td>
    </tr><? } } ?></table>
<? if(!$_G['mobile']) { ?>
<div class="pagination pagination-right"><? include template('perpage', '0', ''); ?><?=$multi?>
</div>
<? } ?>
</div>
</div></div></div></div><? include template('footer', '0', ''); ?>