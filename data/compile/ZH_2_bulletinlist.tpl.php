<? if(!defined('IN_JZ100')) exit('Access Denied'); include template('header', '0', ''); ?><section>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<ul class="breadcrumb">
  	<li><a href="index.php">首页</a> <span class="divider">/</span></li>
  	<li><a href="<?=$_G['cur_link']?>">OA公告(<?=$count?>)</a></li>
</ul>
<?=$_G['message']?>
<div>
<form class="form-inline" action="index.php?home=bulletin" method="post" id="search_form">
<span class="help-inline">开始时间：</span>
<input class="datepicker datetext" type="text" value="<?=$date['startdate']?>" name="startdate" id="startdate">
<span class="help-inline">结束时间：</span>
  	<input class="datepicker datetext" type="text" value="<?=$date['enddate']?>" name="enddate" id="enddate">
  	<span class="help-inline">公告内容：</span>
  	<input type="text" name="content" value="<?=$content?>" maxlength="255" />
  	&nbsp;&nbsp;
  	<button type="submit" class="btn btn-primary search_btn">查找</button>
</form>
</div>
<table class="table table-hover table-bordered">
<tr>

    	<td width="5%">ID</td>
    	<td width="15%">公告标题</td>
    	<td width="">公告内容</td>
    	<td width="15%">发布日期</td>
    	<? if($_G['userlevel'] == 9) { ?><td width="7%">操作</td><? } ?>
  	</tr><? if(is_array($bulletinlist)) { foreach($bulletinlist as $k => $v) { ?><tr>

    	<td><?=$v['id']?></td>
    	<td><?=$v['title']?></td>
    	<td>
    		<p class='bulletin_content'><?=$v['content']?></p>
    	</td>
    	<td><? echo get_abbr_date($v['dateline'], true); ?></td>
    	<? if($_G['userlevel'] == 9) { ?>
    	<td>
    		<a data-toggle="modal" data-href="index.php?home=bulletin&amp;act=edit&amp;id=<?=$v['id']?>" href="">修改</a>
    		<a data-toggle="modal" data-href="index.php?home=bulletin&amp;act=delete&amp;id=<?=$v['id']?>" href="">删除</a>
    	</td>
    	<? } ?>	
    </tr><? } } ?></table>
<div class="pagination pagination-right"><? include template('perpage', '0', ''); ?><?=$multi?>
</div>
</div>
</div>
</div>
<section><? include template('footer', '0', ''); ?>