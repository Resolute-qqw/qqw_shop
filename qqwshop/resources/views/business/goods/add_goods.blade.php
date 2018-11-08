
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
  
    <link rel="stylesheet" href="/business_style/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/business_style/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/business_style/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/business_style/css/style.css">
	<script src="/business_style/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/business_style/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- 富文本编辑器 -->
	<link rel="stylesheet" href="/business_style/plugins/kindeditor/themes/default/default.css" />
	<script charset="utf-8" src="/business_style/plugins/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/business_style/plugins/kindeditor/lang/zh_CN.js"></script>
    
    
      
    
    
</head>

<body class="hold-transition skin-red sidebar-mini" >
	<form action="{{route('business.goods.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="container">
				@if($errors->any())
				<ul class="error">
					@foreach($errors->all() as $e)
					<li>{{$e}}</li>
					@endforeach
				</ul>
				@endif
			</div>
            <!-- 正文区域 -->
            <section class="content">

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">                       		
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品基本信息</a>                                                        
                            </li>   
                            <li >
                                <a href="#pic_upload" data-toggle="tab">商品图片</a>                                                        
                            </li>
							<li >
                                <a href="#customAttribute" data-toggle="tab">商品属性</a>                                                        
                            </li>   
							<li >
                                <a href="#spec" data-toggle="tab" >规格</a>                                                        
                            </li>  
                              
                        </ul>
                        <!--tab头/-->
						
                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">                                  
								   <div class="col-md-2 title">商品分类</div>
		                          
		                           	 <div class="col-md-10 data">
		                           	  	<table>
		                           	  		<tr>
		                           	  			<td>
													<select class="form-control" name="goods_type_id" id="type1">
														@foreach($categorie as $v)
															<option value="{{$v->id}}">{{$v->cate_name}}</option>
														@endforeach
													</select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm" name="goods_type_id2">
													</select>
		                              			</td>
		                              			<td>
		                           	  				<select class="form-control select-sm" name="goods_type_id3">
													</select>
		                              			</td>
		                           	  		</tr>
		                           	  	</table>
		                              	
		                              </div>	                              
		                          	   
									
		                           <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="goods_name" placeholder="商品名称" value="">
		                           </div>
		                           
		                           <div class="col-md-2 title">品牌</div>
		                           <div class="col-md-10 data">
		                              <select class="form-control" name="brand_id">
										  @foreach($brand as $v)
									  		<option value="{{$v->id}}">{{$v->brand_name}}</option>
										  @endforeach
									  </select>
		                           </div>

								    <div class="col-md-2 title">商品logo</div>
									<div class="col-md-10 data">
										<input type="file" name="goods_logo">
									</div>
		
								   <!-- <div class="col-md-2 title">副标题</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="brand_id" placeholder="副标题" value="">
		                           </div> -->
		                           
		                           <!-- <div class="col-md-2 title">价格</div>
		                           <div class="col-md-10 data">
		                           	   <div class="input-group">
			                          	   <span class="input-group-addon">¥</span>
			                               <input type="text" class="form-control"  placeholder="价格" value="">
		                           	   </div>
		                           </div> -->
		                           
		                           <div class="col-md-2 title editer">商品介绍</div>
                                   <div class="col-md-10 data editer">
                                       <textarea name="description" style="width:800px;height:400px;visibility:hidden;" ></textarea>
                                   </div>
		                           
		                           <!-- <div class="col-md-2 title rowHeight2x">包装列表</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               
		                           	<textarea rows="4"  class="form-control"   placeholder="包装列表"></textarea>
		                           </div>
		                           
		                           <div class="col-md-2 title rowHeight2x">售后服务</div>
		                           <div class="col-md-10 data rowHeight2x">
		                               <textarea rows="4"  class="form-control"    placeholder="售后服务"></textarea>
		                           </div>                         -->
                                  
                                    
                                </div>
                            </div>
                            
                            <!--图片上传-->
                            <div class="tab-pane" id="pic_upload">
                                <div class="row data-type">                                  
								 <!-- 颜色图片 -->
								 <div class="btn-group">
					                 <button type="button" class="btn btn-default" id="add_image"><i class="fa fa-file-o"></i> 新建图片</button>
					             </div>
								 
								 <table class="table table-bordered table-striped table-hover dataTable">
					                    <thead>
					                        <tr>
											    <th class="sorting">图片</th>
											    <th class="sorting">预览</th>
												<th class="sorting">操作</th>
							            </thead>
					                    <tbody id="image_box">
											<tr>					                           
												<td width="30%">
													<input type="file" class="preview" name="goods_image[]">
												</td>
												<td width="55%">
														            	 
												</td>
												<td width="15%">
													<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
												</td> 
											</tr>
					                    </tbody>
								 </table> 
								  
                                </div>
                            </div>
                           
                           
                            <!--扩展属性-->
                            <div class="tab-pane" id="customAttribute">
							<div class="row data-type">                                  
								 <!-- 颜色图片 -->
								 <div class="btn-group">
					                 <button type="button" class="btn btn-default" id="add_attr"><i class="fa fa-file-o"></i> 新建属性</button>
					             </div>
								 
								 <table class="table table-bordered table-striped table-hover dataTable">
					                    <thead>
					                        <tr>
					                            
											    <th class="sorting">属性名</th>
											    <th class="sorting">属性值</th>
												<th class="sorting">操作</th>
							            </thead>
					                    <tbody id="attr_box">
											<tr>					                           
												<td width="40%">
													<input type="text" name="attr_name[]">
												</td>
												<td width="40%">
													<input type="text" name="attr_value[]">            	 
												</td>
												<td width="20%">
													<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
												</td> 
											</tr>
					                    </tbody>
								 </table> 
								  
                                </div>
                            </div>
                      
                            <!--规格-->
                            <div class="tab-pane" id="spec">
							<div class="row data-type">                                  
								 <!-- 颜色图片 -->
								 <div class="btn-group">
					                 <button type="button" class="btn btn-default" id="add_sku"><i class="fa fa-file-o"></i> 新建SKU</button>
					             </div>
								 
								 <table class="table table-bordered table-striped table-hover dataTable">
					                    <thead>
					                        <tr>
											    <th class="sorting">SKU</th>
												<th class="sorting">SKU值</th>
												<th class="sorting">库存</th>
											    <th class="sorting">价格</th>
												<th class="sorting">操作</th>
							            </thead>
					                    <tbody id="sku_box">
										<tr>					                           
											
					                    </tr>
					                    </tbody>
								 </table> 
								  
                                </div>
                            </div>
                            
                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->
							 
                    </div>
                 	
                 	
                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ><i class="fa fa-save"></i>保存</button>
				      <button class="btn btn-default" >返回列表</button>
				  </div>
			
            </section>
	</form>
        
            <!-- 正文区域 /-->
<script type="text/javascript">

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="description"]', {
			allowFileManager : true
		});
	});

</script>
       
</body>

</html>
<script src="/js/jquery.min.js"></script>
<script>
	function getObjectUrl(file) {
		var url = null;
		if (window.createObjectURL != undefined) {
			url = window.createObjectURL(file)
		} else if (window.URL != undefined) {
			url = window.URL.createObjectURL(file)
		} else if (window.webkitURL != undefined) {
			url = window.webkitURL.createObjectURL(file)
		}
		return url
	}
	var number = 0
	var img_str =  `<tr>					                           
					<td width="30%">
						<input type="file" class="preview" name="goods_image[]">
					</td>
					<td width="55%">
						<img alt="" src="" width="100px" height="100px">	            	 
					</td>
					<td width="15%">
						<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
					</td> 
				</tr>`;
	
	var attr_str = `<tr>					                           
					<td width="40%">
						<input type="text" name="attr_name[]">
					</td>
					<td width="40%">
						<input type="text" name="attr_value[]">            	 
					</td>
					<td width="20%">
						<button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
					</td> 
				</tr>`;
	
	

	$("#add_image").click(function(){
	
		$("#image_box").append(img_str);

			// 当选择图片时触发
		$(".preview").change(function(){
			// 获取选择的图片
			var file = this.files[0];
			// 转成字符串
			var str = getObjectUrl(file);
			// 先删除上一个
			$(this).parent().next().children().remove();
			// // 在框的前面放一个图片
			$(this).parent().next().append("<div class='img_preview'><img src='"+str+"' width='120' height='120'></div>");
		});
	})
	// 当选择图片时触发
	$(".preview").change(function(){
		// 获取选择的图片
		var file = this.files[0];
		// 转成字符串
		var str = getObjectUrl(file);
		// 先删除上一个
		$(this).parent().next().children().remove();
		// // 在框的前面放一个图片
		$(this).parent().next().append("<div class='img_preview'><img src='"+str+"' width='120' height='120'></div>");
	});

	$("#add_attr").click(function(){
		$("#attr_box").append(attr_str);
	})

	
	$("#add_sku").click(function(){
		number++
		sku_str = '<tr><td width="20%" id="sku_n"><input type="text" name="sku_name'+number+'[]" sku_number="'+number+'"></td><td width="20%" id="sku_v"><input type="text" name="sku_value'+number+'[]" id=""></td><td width="20%" id="sku_i"><input type="text" name="inventory'+number+'[]" id=""></td><td width="20%" id="sku_p"><input type="text" name="price'+number+'[]" id=""></td><td width="20%"><button type="button" name="append_v" class="btn btn-default" title="追加sku值" ><i class="fa fa-trash-o"></i> 追加sku值</button><button type="button" name="sku_del" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button></td> </tr>';
		
		$("#sku_box").append(sku_str);

		$("button[name=sku_del]").on("click",function(){
			$(this).parent().parent().remove();
		})
		$("button[name=append_v]").off("click").on("click",function(){
			var skuNumber = $(this).parent().siblings('#sku_n').children().attr('sku_number')

			var appsku_v = '<input type="text" name="sku_value'+skuNumber+'[]" id="">'
			var appsku_i = '<input type="text" name="inventory'+skuNumber+'[]" id="">'
			var appsku_p = '<input type="text" name="price'+skuNumber+'[]" id="">'
			
			$(this).parent().siblings('#sku_v').append(appsku_v)
			$(this).parent().siblings('#sku_i').append(appsku_i)
			$(this).parent().siblings('#sku_p').append(appsku_p)
		})
		
	})

	$("select[name=goods_type_id]").change(function(){
		var id = $("select[name=goods_type_id]").val();
		$.ajax({
			type:"GET",
			url:"{{route('category.ajax')}}",
			data:{id:id},
			dataType:"json",
			success:function(data){
				var category = "";

				for(var i=0;i<data.length;i++){
					category += '<option value="'+data[i].id+'">'+data[i].cate_name+'</option>'
				}
				$("select[name=goods_type_id2]").html(category)

				$("select[name=goods_type_id2]").trigger('change');
			}
		})
	});

	$("select[name=goods_type_id2]").change(function(){
		var id = $("select[name=goods_type_id2]").val();
		$.ajax({
			type:"GET",
			url:"{{route('category.ajax')}}",
			data:{id:id},
			dataType:"json",
			success:function(data){
				var category = "";

				for(var i=0;i<data.length;i++){
					category += '<option value="'+data[i].id+'">'+data[i].cate_name+'</option>'
				}
				$("select[name=goods_type_id3]").html(category)
			}
		})
	});

	$("select[name=goods_type_id]").trigger('change');

	$("button[name=sku_del]").click(function(){
		$(this).parent().parent().remove();
	})
	$("#add_sku").trigger('click');
</script>