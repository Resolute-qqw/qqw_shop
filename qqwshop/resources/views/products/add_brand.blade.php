<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加品牌</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link href="/admin_style/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/admin_style/css/style.css" />
	<link rel="stylesheet" href="/admin_style/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/admin_style/assets/css/font-awesome.min.css" />
	<link href="/admin_style/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
	<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
	<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	<script src="/admin_style/js/jquery-1.9.1.min.js"></script>
	<script src="/admin_style/assets/js/bootstrap.min.js"></script>
	<script src="/admin_style/assets/js/typeahead-bs2.min.js"></script>
	<script src="/admin_style/assets/layer/layer.js" type="text/javascript"></script>
	<script type="text/javascript" src="/admin_style/Widget/swfupload/swfupload.js"></script>
	<script type="text/javascript" src="/admin_style/Widget/swfupload/swfupload.queue.js"></script>
	<script type="text/javascript" src="/admin_style/Widget/swfupload/swfupload.speed.js"></script>
	<script type="text/javascript" src="/admin_style/Widget/swfupload/handlers.js"></script>
	<style>
		.submit-button {
			width: 150px;
			height: 40px;
			border-width: 0px;
			border-radius: 3px;
			background: #1E90FF; 
			cursor: pointer;
			outline: none;
			font-family: Microsoft YaHei;
			color: white;
			font-size: 17px;
			margin-top:20px;
			margin-left:95px;
		}
		.submit-button:hover {
			background: #5599FF;
		}
	</style>
</head>

<body>
	<div class="container">
		@if($errors->any())
		<ul class="error">
			@foreach($errors->all() as $e)
			<li>{{$e}}</li>
			@endforeach
		</ul>
		@endif
	</div>
	<div class=" clearfix">
		<div id="add_brand" class="clearfix">
			<form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="left_add">
					<div class="title_name">添加品牌</div>
					<ul class="add_conent">
						<li class=" clearfix">
							<label class="label_name"><i>*</i>品牌名称：</label>
							<input type="text" name="brand_name">
						</li>
						<li class=" clearfix"><label class="label_name">品牌logo：</label>
							<input type="file" name="brand_logo">
						</li>

						<li class=" clearfix"><label class="label_name">品牌描述：</label> <textarea name="brand_describe" cols="" rows="" class="textarea"
							onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">100</span>字</span></li>

						<li>
							<input type="submit" class="submit-button" value="添加">
						</li>
					</ul>
				</div>
			</form>
		</div>
</body>

</html>
<script type="text/javascript">
	function checkLength(which) {
		var maxChars = 100;
		if (which.value.length > maxChars) {
			layer.open({
				icon: 2,
				title: '提示框',
				content: '您出入的字数超多限制!',
			});
			// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
			which.value = which.value.substring(0, maxChars);
			return false;
		} else {
			var curr = maxChars - which.value.length; // 减去 当前输入的
			document.getElementById("sy").innerHTML = curr.toString();
			return true;
		}
	}
</script>
<script type="text/javascript">
	function updateProgress(file) {
		$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
		$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
		if (parseInt(file.percentUploaded) == 100) {
			// 如果上传完成了
			$('.progress-box').hide();
		}
	}

	function initProgress() {
		$('.progress-box').show();
		$('.progress-box .progress-bar > div').css('width', '0%');
		$('.progress-box .progress-num > b').html('0%');
	}

	function successAction(fileInfo) {
		var up_path = fileInfo.path;
		var up_width = fileInfo.width;
		var up_height = fileInfo.height;
		var _up_width, _up_height;
		if (up_width > 120) {
			_up_width = 120;
			_up_height = _up_width * up_height / up_width;
		}
		$(".logobox .resizebox").css({ width: _up_width, height: _up_height });
		$(".logobox .resizebox > img").attr('src', up_path);
		$(".logobox .resizebox > img").attr('width', _up_width);
		$(".logobox .resizebox > img").attr('height', _up_height);
	}

</script>