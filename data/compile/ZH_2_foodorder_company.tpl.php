<? if(!defined('IN_SYSTEM')) exit('Access Denied'); include template('admin#header', '0', ''); ?><section>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12"><? include template('breadcrumb', '0', ''); ?><?=$_G['message']?>
<form action="" method="post" id="form" class="post_form"  enctype="multipart/form-data">
<?=$csrf?>
<input type="hidden" name="submit" value="true" />
<fieldset>
<legend class="mbn"><?=$head_text?></legend>
<div class="control-group">
<label class="control-label" for="inputName">Name</label>
<div class="controls">
<input type="text" name="name" id="inputName" placeholder="Restaurant name">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputBrand">Brand</label>
<div class="controls">
<input type="text" name="brand" id="inputBrand" placeholder="Brand">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPhone">TelePhone</label>
<div class="controls">
<input type="text" name="phone" id="inputPhone" placeholder="TelePhone">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputAddress">Address</label>
<div class="controls">
<input type="text" name="address" id="inputAddress" placeholder="Restaurant address">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputBrand">Brand</label>
<div class="controls">
<input type="text" name="brand" id="inputBrand" placeholder="Brand">
</div>
</div>
<div class="control-group">
<label class="control-label" for="file_upload">Thumb</label>
<div class="controls">
<? if(!empty($filepatharr['0'])) { ?>
<ul class="well" style="margin:15px 0;list-style:none;">
       <? if(is_array($filepatharr)) { foreach($filepatharr as $v) { ?>       <? $filearr = explode("^", $v); ?>       	<li>
       		<a href="<?=$filearr['1']?>" target="_blank"><?=$filearr['0']?></a>
       		<a href='javascript:;' class='cancel_upload'>
       			<img src='uploadify/uploadify-cancel.png' width='16' height='16'>
       		</a>
       		<input class='filepath' type='hidden' name='filepath[]' value='<?=$v?>'/>
       	</li>
       	<? } } ?>       	</ul>
       	<? } ?>
<input id="file_upload" name="file_upload" type="file">
</div>
</div>
<div class="control-group">
<div class="controls">
<button type="submit" class="btn btn-primary" id="login_btn">Submit</button>
</div>
</div>
</fieldset>
</form>	
</div>
</div>
</div>
</section>
<script type="text/javascript">
$(function(){
$('#file_upload').uploadify({
'multi'    : false,
'buttonText' : 'Upload',
'width' : '60',
'height'   : '20',
'removeTimeout' : 999,
'fileSizeLimit' : '2MB',
'formData'     : {
'timestamp' : "<?=$_G['timestamp']?>",
'token'     : "<? echo md5('unique_salt'.$_G['timestamp']); ?>"
},
'checkExisting' : 'uploadify/check-exists.php',
'swf'      : '<?=$_G['siteurl']?>uploadify/uploadify.swf',
'uploader' : '<?=$_G['siteurl']?>uploadify/uploadify.php?username=uid_<?=$_G['uid']?>',

'onUploadStart' : function(file) {

var status = 0;
var ext = new Array('jpg','jpeg','gif','png','bmp');

for (i=0;i<ext.length;i++) {
if(ext[i] == file.type.substr(1).toLowerCase()) {
status = 1; 
}
}
if(status == 0) {
alert("Invalid filetype, Pictures only for uploading");
javascript:$('#file_upload').uploadify('cancel',file.id);	
}
        },
'onUploadSuccess' : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
if(data == "invalid filetype") {
alert("Invalid filetype, Pictures only for uploading");
$("#" + file.id).css("display","none");
} else {
$("#file_upload").append('<input class="filepath" id="input_'+ file.id +'" type="hidden" name="filepath[]" value="'+ file.name + '^' + data +'"/>')
}
},
/*
'onCancel' : function(file) {
            alert('The file ' + file.name + ' was cancelled.');
        },
        */
        'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            alert('uploading '+file.name + ' failed: ' + errorString);
        }
});
<? if(!empty($filepatharr['0'])) { ?>
$(".cancel_upload").click(function(){
if(confirm("cancel this upload?")) {
$(this).parent().remove();
var path = $(this).next().val();
$.post('<?=$_G['siteurl']?>index.php?home=misc&act=cancel_upload',{bid:'<?=$businesslog['bid']?>',path:path});
}
})
<? } ?>
});
</script><? include template('footer', '0', ''); ?>