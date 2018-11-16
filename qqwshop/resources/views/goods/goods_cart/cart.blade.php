<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/goods_style/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/goods_style/css/pages-cart.css" />
</head>

<body>
	<!--head-->
	<div class="top">
		<div class="py-container">
			<div class="shortcut">
				<ul class="fl">
					<li class="f-item">品优购欢迎您！</li>
					@if(session('user'))
						<li class="f-item">{{session('login_name')}}</li>
						<li class="f-item"><span><a href="{{route('user.logout')}}">退出登录</a></span></li>
					@endif
				</ul>
				<ul class="fr">
					<li class="f-item">我的订单</li>
					<li class="f-item space"></li>
					<li class="f-item">我的品优购</li>
					<li class="f-item space"></li>
					<li class="f-item">品优购会员</li>
					<li class="f-item space"></li>
					<li class="f-item">企业采购</li>
					<li class="f-item space"></li>
					<li class="f-item">关注品优购</li>
					<li class="f-item space"></li>
					<li class="f-item">客户服务</li>
					<li class="f-item space"></li>
					<li class="f-item">网站导航</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">购物车</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span>11</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" name="" id="" value="" /> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<div class="cart-shop">
						<input type="checkbox" name="" checked="checked" id="ckeck_all" value="" />
						<span class="shopname self">圈圈丸的商店</span>
					</div>
					<div class="cart-body">
						@foreach($goods as $v)
						<div class="cart-list">
							<ul class="goods-list yui3-g">
								<li style="display:none" name="li_hidden"><input type="hidden" name="cart_id" value="{{$v->id}}"></li>
								<li class="yui3-u-1-24" name="goods_ckeck">
									<input type="checkbox" name="ip_ckeck" id="" @if($v->goods_status==1) checked="checked" @endif value="{{$v->goods_status}}" />
								</li>
								<li class="yui3-u-11-24">
									<div class="good-item">
										<div class="item-img"><img src="/uploads/{{$v->img}}" /></div>
										<div class="item-msg">{{$v->goods_name}}  {{$v->goods_sku}}</div>
									</div>
								</li>
								
								<li class="yui3-u-1-8" name="li_pri"><span name="price" class="price">{{$v->goods_price}}</span></li>
								<li class="yui3-u-1-8" name="li_count">
									<a href="javascript:void(0)" name="mins" class="increment mins">-</a>
									<input type="text" name="count" value="{{$v->goods_count}}" class="itxt" />
									<a href="javascript:void(0)" name="push" class="increment plus">+</a>
								</li>
								<li class="yui3-u-1-8" name="li_sum"><span name="sum" class="sum">{{$v->goods_price*$v->goods_count}}</span></li>
								<li class="yui3-u-1-8" name="li_del">
									<a href="#none" name="del">删除</a><br />
									<a href="#none">移到我的关注</a>
								</li>
							</ul>
						</div>
						@endforeach
					
					</div>
				</div>
				
			</div>
			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox" name="" id="" value="" />
					<span>全选</span>
				</div>
				<div class="option">
					<a href="#none">删除选中的商品</a>
					<a href="#none">移到我的关注</a>
					<a href="#none">清除下柜商品</a>
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span id="goods_count">0</span>件商品</div>
					<div class="sumprice">
						<span><em>总价（不含运费） ：</em><i class="summoney"></i></span>
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="getOrderInfo.html" target="_blank">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="deled">
				<span>已删除商品，您可以重新购买或加关注：</span>
				<div class="cart-list del">
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存</div>
							</div>
						</li>
						<li class="yui3-u-1-6"><span class="price">8848.00</span></li>
						<li class="yui3-u-1-6">
							<span class="number">1</span>
						</li>
						<li class="yui3-u-1-8">
							<a href="#none">重新购买</a>
							<a href="#none">移到我的关注</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
					<li>
						<a href="#profile" data-toggle="tab">特惠换购</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										<li>
											<img src="/goods_style/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul>
										<li>
											<img src="/goods_style/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/goods_style/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
<div class="clearfix footer">
	<div class="py-container">
		<div class="footlink">
			<div class="Mod-service">
				<ul class="Mod-Service-list">
					<li class="grid-service-item intro  intro1">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro2">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro  intro3">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item  intro intro4">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
					<li class="grid-service-item intro intro5">

						<i class="serivce-item fl"></i>
						<div class="service-text">
							<h4>正品保障</h4>
							<p>正品保障，提供发票</p>
						</div>

					</li>
				</ul>
			</div>
			<div class="clearfix Mod-list">
				<div class="yui3-g">
					<div class="yui3-u-1-6">
						<h4>购物指南</h4>
						<ul class="unstyled">
							<li>购物流程</li>
							<li>会员介绍</li>
							<li>生活旅行/团购</li>
							<li>常见问题</li>
							<li>购物指南</li>
						</ul>

					</div>
					<div class="yui3-u-1-6">
						<h4>配送方式</h4>
						<ul class="unstyled">
							<li>上门自提</li>
							<li>211限时达</li>
							<li>配送服务查询</li>
							<li>配送费收取标准</li>
							<li>海外配送</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>支付方式</h4>
						<ul class="unstyled">
							<li>货到付款</li>
							<li>在线支付</li>
							<li>分期付款</li>
							<li>邮局汇款</li>
							<li>公司转账</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>售后服务</h4>
						<ul class="unstyled">
							<li>售后政策</li>
							<li>价格保护</li>
							<li>退款说明</li>
							<li>返修/退换货</li>
							<li>取消订单</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>特色服务</h4>
						<ul class="unstyled">
							<li>夺宝岛</li>
							<li>DIY装机</li>
							<li>延保服务</li>
							<li>品优购E卡</li>
							<li>品优购通信</li>
						</ul>
					</div>
					<div class="yui3-u-1-6">
						<h4>帮助中心</h4>
						<img src="/goods_style/img/wx_cz.jpg">
					</div>
				</div>
			</div>
			<div class="Mod-copyright">
				<ul class="helpLink">
					<li>关于我们<span class="space"></span></li>
					<li>联系我们<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>商家入驻<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们<span class="space"></span></li>
					<li>营销中心<span class="space"></span></li>
					<li>友情链接<span class="space"></span></li>
					<li>关于我们</li>
				</ul>
				<p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
				<p>京ICP备08001421号京公网安备110108007702</p>
			</div>
		</div>
	</div>
</div>
<!--页面底部END-->

<script type="text/javascript" src="/goods_style/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/goods_style/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/goods_style/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/goods_style/js/widget/nav.js"></script>
</body>

</html>
<script>
	function check(){
		var length=$("input[name=ip_ckeck]:checked").length;
		var len=$("input[name=ip_ckeck]").length;

		if(length==len){
			$("#ckeck_all").get(0).checked=true;
		}else{
			$("#ckeck_all").get(0).checked=false;
		}
	}
	check()
	
	var ckeck_str = $("li[name=goods_ckeck]").children("input[name=ip_ckeck]");
	var trs = $("span[name=sum]");
	var sum=0;
	var goods_count = 0

	for(var i=0;i<ckeck_str.length;i++){
		goods_count++
		if(ckeck_str.eq(i).is(':checked')) {
			var price = trs.eq(i).html();
			sum = sum + Number(price);
		}
	}  
	$(".summoney").html("￥"+sum);

	$("a[name=mins]").click(function(){
		var count = $(this).next().val();
		if(count==1){
			alert("数量最低为1")
		}else{
			Number(count--)
			$(this).next().val(Number(count));
			var price = $(this).parent().siblings('li[name=li_pri]').children('span[name=price]').html()
			$(this).parent().siblings('li[name=li_sum]').children('span[name=sum]').html(count*price);

			if($(this).parent().siblings("li[name=goods_ckeck]").children("input[name=ip_ckeck]").is(':checked')){
				sum = sum - Number(price);
				$(".summoney").html("￥"+sum);
			}
			cart_id = $(this).parent().siblings('li[name=li_hidden]').children('input[name=cart_id]').val()
			
			cart_ajax('count',cart_id,-1);
		}
	})

	$("a[name=push]").click(function(){
		var count = $(this).prev().val();
		Number(count++)
		$(this).prev().val(count);
		var price = $(this).parent().siblings('li[name=li_pri]').children('span[name=price]').html()
		$(this).parent().siblings('li[name=li_sum]').children('span[name=sum]').html(count*price);
		
		if($(this).parent().siblings("li[name=goods_ckeck]").children("input[name=ip_ckeck]").is(':checked')){
			sum = sum + Number(price);
			$(".summoney").html("￥"+sum);
		}
		
		cart_id = $(this).parent().siblings('li[name=li_hidden]').children('input[name=cart_id]').val()
		cart_ajax('count',cart_id,1)

	})

	$("input[name=ip_ckeck]").click(function(){

		if($(this).is(':checked')){

			price = $(this).parent().siblings('li[name=li_sum]').children('span[name=sum]').html()
			sum = sum + Number(price);
			$(".summoney").html("￥"+sum);
			
		}else{
			price = $(this).parent().siblings('li[name=li_sum]').children('span[name=sum]').html()
			sum = sum - Number(price);
			$(".summoney").html("￥"+sum);
			
		}
	})
	
	//点击复选框 价格变化
	$("#ckeck_all").click(function(){
		var userids = this.checked;
		$("input[name=ip_ckeck]").each(function(){
			this.checked = userids;
		});
		ckeck_str = $("li[name=goods_ckeck]").children("input[name=ip_ckeck]");
		trs = $("span[name=sum]");
		sum=0;
		goods_count = 0

		for(var i=0;i<ckeck_str.length;i++){
			goods_count++
			if(ckeck_str.eq(i).is(':checked')) {
				var price = trs.eq(i).html();
				sum = sum + Number(price);
			}
		}  
		$(".summoney").html("￥"+sum);
	
	});
	
	$("input[name=ip_ckeck]").click(function(){
		check()

		cart_id = $(this).parent().siblings('li[name=li_hidden]').children('input[name=cart_id]').val()
		cart_ajax('ckeck',cart_id,$(this).val())
	});

	$("input[name=count]").change(function(){
		cart_id = $(this).parent().siblings('li[name=li_hidden]').children('input[name=cart_id]').val()
		cart_ajax('change',cart_id,$(this).val())
	})

	$("a[name=del]").click(function(){
		cart_id = $(this).parent().siblings('li[name=li_hidden]').children('input[name=cart_id]').val()
		cart_ajax('delete',cart_id)
		$(this).parent().parent().remove()

		price = $(this).parent().siblings('li[name=li_sum]').children('span[name=sum]').html()
		sum = sum - Number(price);
		
		$(".summoney").html("￥"+sum);
	})

	function cart_ajax(status,cart_id,value=""){
		data = {'_token':"{{csrf_token()}}",status:status,cart_id:cart_id,value:value}

		$.ajax({
			url:"{{route('goods.cart_ajax')}}",
			type:'post',
			dataType:'json',
			data:data,
			success:function(data){
				console.log(data)
			}
		})
	}
</script>
