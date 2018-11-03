<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/business_style/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/business_style/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/business_style/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/business_style/css/style.css">
	<script src="/business_style/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/business_style/plugins/bootstrap/js/bootstrap.min.js"></script>
	<style>
		td{
			text-align: center;
			line-height: 97px !important;
		}
		th{
			text-align: center;
		}
	</style>
</head>
@if(session('tips'))
	<script>alert('{{session('tips')}}');</script>
@endif
<body class="hold-transition skin-red sidebar-mini" >
  <!-- .box-body -->
                
                    <div class="box-header with-border">
                        <h3 class="box-title">商品管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <!--工具栏-->
                            <div class="pull-left">
                                <div class="form-group form-inline">
                                    <div class="btn-group">
									<button type="button" class="btn btn-default" title="新建" ><i class="fa fa-file-o"></i> <a href="#">新建</a>	</button>
                                        <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                                        <button type="button" class="btn btn-default" title="提交审核" ><i class="fa fa-check"></i> 提交审核</button>
                                        <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                                        <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                  状态：<select>
                                         	<option value="">全部</option>      
                                         	<option value="0">未申请</option>    
                                         	<option value="1">申请中</option>    
                                         	<option value="2">审核通过</option>    
                                         	<option value="3">已驳回</option>                                     
                                        </select>
							                  商品名称：<input >									
									<button class="btn btn-default" >查询</button>                                    
                                </div>
                            </div>
                            <!--工具栏/-->

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th> 
										  <th class="sorting_asc">商品ID</th>
									      <th class="sorting">商品名称</th>
									      <th class="sorting">一级分类</th>
									      <th class="sorting">二级分类</th>
										  <th class="sorting">三级分类</th>
										  <th class="sorting">logo</th>
									      {{-- <th class="sorting">状态</th>									     						 --}}
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
									  @foreach($goods as $v)
			                          <tr>
			                              <td><input  type="checkbox"></td>			                              
				                          <td>{{$v->id}}</td>
										  <td>{{$v->goods_name}}</td>
										  @foreach($v->category as $c)
											<td>{{$c->cate_name}}</td>
										  @endforeach
		                                  {{-- <td>
		                                  	<span>
		                                  		未申请
		                                  	</span>
		                                  	<span >
		                                  		申请中
		                                  	</span>
		                                  	<span>
		                                  		审核通过
		                                  	</span>
		                                  	<span>
		                                  		已驳回
		                                  	</span>
										  </td>		                                   --}}
										  <td>
										  <img src="/uploads/{{$v->goods_sm_logo}}" alt="">
										  </td>
		                                  <td class="text-center">                                          
											   <button type="button" class="btn bg-olive btn-xs">修改</button>         
											   <button type="button" class="btn bg-olive btn-xs" style="color:pink !important">删除</button>                        
		                                  </td>
									  </tr>
									  @endforeach
			                      </tbody>
			                  </table>
			                  <!--数据列表/-->                        
							  
							 
                        </div>
                        <!-- 数据表格 /-->
                        
                        
                     </div>
                    <!-- /.box-body -->
		
</body>

</html>