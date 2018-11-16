<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/business_style/js/liandong.js"></script>

<link type="text/css" rel="stylesheet" href="/business_style/css/liandong.css">
</head>
<body>
    
    <div id="navtab1" style="width: 100%;">
        <form action="{{route('business.goods.add_sku_zuhe')}}" method="POST">
            @csrf
            <div title="" tabid="tabItem3">
                <div id="Div1">
                    <div position="center">
                        <div style="padding: 5px 8px;" class="div_content">
                            <div class="div_title"><h3 style="color:#555">产品规格添加</h3></div>
                            <div class="div_contentlist">
                                <input type="hidden" name="goods_id" value="{{$goods_id}}">
                                <input type="hidden" name="status_id" value="">
                                @foreach($data as $k=>$v)
                                <ul class="Father_Title"><li>{{$v->sku_name}}</li></ul>
                                <ul class="Father_Item{{$k}} li_left">
                                    @foreach($v->sku_vals as $k2=>$v2)
                                    <li class="li_width">
                                        <label>
                                            <input type="hidden" value="{{$v->ids[$k2]}}" name="sku_id">
                                            <input id="" name="sku_check" type="checkbox" class="chcBox_Width" value="{{$v2}}" />{{$v2}}
                                        </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <br/>
                                @endforeach
                            </div>
                            <div style="clear:both;"></div>
                            <div class="div_contentlist2">
                                    <input type="hidden" id="sku_zuhe" name="sku_zuhe" value="">
                                    <ul>
                                        <li><div id="createTable"></div></li>
                                    </ul>
                                    <ul><li><input type="button" id="Button1" class="l-button" value="提交"/></li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $("#Button1").click(function(){
        let sku_status = []
	    var ckeck_str = $("input[name=sku_check]");
		for(var i=0;i<ckeck_str.length;i++){
			if(ckeck_str.eq(i).is(':checked')) {
                var trs = $("input[name=sku_id]")
				var sku_id = trs.eq(i).val();
				sku_status.push(sku_id)
			}
        }  
        $("input[name=status_id]").val(JSON.stringify(sku_status))
       
        $("form").submit()
    })
</script>