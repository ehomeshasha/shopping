<? if(!defined('IN_JZ100')) exit('Access Denied'); include template('header', '0', ''); ?><section>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<ul class="breadcrumb">
  	<li><a href="index.php">首页</a> <span class="divider">/</span></li>
  	<li><a href="<?=$_G['cur_link']?>">工作日志(<?=$count?>)</a></li>
</ul>
<?=$_G['message']?>
<div>
<form class="form-inline" action="index.php?home=businesslog" method="post" id="search_form">
<input type="hidden" name="view" value="<?=$view?>" class="para_for_pagejump" />
<input type="hidden" name="mention" value="<?=$mention?>" class="para_for_pagejump" />
<span class="help-inline">开始时间：</span>
<input class="datepicker datetext" type="text" value="<?=$date['startdate']?>" name="startdate" id="startdate">
<span class="help-inline">结束时间：</span>
  	<input class="datepicker datetext" type="text" value="<?=$date['enddate']?>" name="enddate" id="enddate">
  	<span class="help-inline">用户级别：</span>
  	<select name="userlevel" class="input-small author-input">
  		<option value="">全部</option>
  <? if(is_array($_G['ArrayData']['userlevel'])) { foreach($_G['ArrayData']['userlevel'] as $u_k => $u_v) { ?>  		<option value="<?=$u_k?>" <? if($u_k == $userlevel && $userlevel != "") { ?>selected="selected"<? } ?>><?=$u_v?></option>
  <? } } ?>  	</select>
  	<span class="help-inline">作者：</span>
  	<select name="authorid" class="input-small author-input">
  		<option value="0">全部</option>
  <? if(is_array($userlist)) { foreach($userlist as $v) { ?>  		<option value="<?=$v['uid']?>" <? if($v['uid'] == $authorid) { ?>selected="selected"<? } ?>><?=$v['username']?></option>
  		<? } } ?>  	</select>
  	<span class="help-inline">工作内容：</span>
  	<input type="text" name="todayplan" value="<?=$todayplan?>" maxlength="255" />
  	&nbsp;&nbsp;
  	<button type="submit" class="btn btn-primary search_btn">查找</button>
</form>

<!-- 
<input type="text" class="" name="startdate" value="<?=$startdate?>" />
<input type="text" class="" name="enddate" value="<?=$enddate?>" />
-->

</div>
<table class="table table-hover table-bordered">
<tr>

    	<td width="5%">ID</td>
    	<td width="10%">作者</td>
    	<td width="">工作内容</td>
    	<td width="7%">补充文档</td>
    	<td width="13%">@的用户</td>
    	<!--zht-<td width="5%">回复</td>
    	<td width="5%">查看</td>-zht-->
    	<td width="15%">最新回复</td>
    	<td width="12%">发布日期</td>
    	<td width="7%">操作</td>
  	</tr><? if(is_array($businessloglist)) { foreach($businessloglist as $k => $v) { ?><tr>

    	<td><?=$v['bid']?></td>
    	<td><a href="javascript:;" class="username text-error" id="uid_<?=$v['uid']?>"><?=$v['username']?></a></td>
    	<td><a href="index.php?home=businesslog&amp;act=view&amp;bid=<?=$v['bid']?>" title="<?=$v['todayplan']?>" target="_blank"><? echo cutstr($v['todayplan'], 100) ?></a></td>
    	<td style="font-size:12px;"><? echo get_uploadfile($v['filepath']); ?></td>
    	<td><?=$v['sendlist']?></td>
    	<!--zht-<td id='replynum_<?=$v["bid"]?>'><?=$v['replies']?></td>
    	<td><?=$v['views']?></td>-zht-->
    	<td id='replybox_<?=$v["bid"]?>'><?=$v['newreply']?><br /><span class="mrm" style="font-size:12px;"><? echo get_date("Y-m-d H:i" ,$v['newreply_dateline']); ?></span><span><?=$v['newreply_user']?></span></td>
    	<td><? echo get_abbr_date($v['dateline'], true, 'Y-m-d'); ?></td>
    	<td>
    		<a data-toggle="modal" data-href="index.php?home=businesslog&amp;act=reply&amp;bid=<?=$v['bid']?>&amp;ajax=1" class="text-success" title="回复数 <?=$v['replies']?>" href="">回复</a>
    		<a href="index.php?home=businesslog&amp;act=view&amp;bid=<?=$v['bid']?>" title="查看数 <?=$v['views']?>" class="">查看</a>
    		<? if($_G['userlevel'] == 9 || $_G['uid'] == $v['uid']) { ?>
    		<br />
    		<a href="index.php?home=businesslog&amp;act=edit&amp;bid=<?=$v['bid']?>" class="muted">修改</a>
    		<a data-toggle="modal" data-href="index.php?home=businesslog&amp;act=delete&amp;bid=<?=$v['bid']?>&amp;authorid=<?=$v['uid']?>" href="" class="muted">删除</a>
    		<? } ?>
    	</td>
  	</tr><? } } ?></table>
<div class="pagination pagination-right"><? include template('perpage', '0', ''); ?><?=$multi?>
</div>
</div>
</div>
</div>
<section><? include template('footer', '0', ''); ?>