<? if(!defined('IN_SYSTEM')) exit('Access Denied'); ?>
<footer>
<div id="response_modal" class="modal hide fade"></div>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div id="progressbar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="progressbartitle">操作进程</h3>
 	</div>
 	<div class="modal-body">
<p id="process_txt"></p>
<div class="progress progress-striped active" id="processbar">
<div class="bar" style="width: 100%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div id="messagebox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<input type="hidden" value="" id="jumpurl" />
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="messagebox_title">操作结果</h3>
 	</div>
 	<div class="modal-body">
<p id="messagebox_body"></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary messagebox_button">确定</button>
</div>	
</div>
</div>
</div>
</div>
</footer>
</body>
</html>