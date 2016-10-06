<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>西门子大转盘</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=yes">
<link rel="stylesheet" href="/Public/Home/css/style.css" />
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/swiper.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.rotate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var city = $(this).children('option:selected').val();
	  $("#btn1").click(function(){
	  	$now_page = Number("<?php echo ($page); ?>");
	  	$all_page = Number("<?php echo ($num); ?>");
	  	if($now_page == 1){
	  		return;
	  	}

	  	window.location.href = "<?php echo U('Home/Index/order_list');?>?city="+city+"&type=1&page=1";
	  });

	  $("#btn2").click(function(){
	  	$now_page = Number("<?php echo ($page); ?>");
	  	$all_page = Number("<?php echo ($num); ?>");
	  	if($now_page == 1){
	  		return;
	  	}
	  	$now_page = $now_page-1;
	  	window.location.href = "<?php echo U('Home/Index/order_list');?>?city="+city+"&type=2&page="+$now_page;
	  });

	  $("#btn3").click(function(){
	  	$now_page = Number("<?php echo ($page); ?>");
	  	$all_page = Number("<?php echo ($num); ?>");
	  	if($now_page == $all_page){
	  		return;
	  	}
	  	$now_page = $now_page+1;
	  	window.location.href = "<?php echo U('Home/Index/order_list');?>?city="+city+"&type=2&page="+$now_page;
	  });

	  $("#btn4").click(function(){
	  	$now_page = Number("<?php echo ($page); ?>");
	  	$all_page = Number("<?php echo ($num); ?>");
	  	if($now_page == $all_page){
	  		return;
	  	}
	  	$now_page = $all_page;
	  	window.location.href = "<?php echo U('Home/Index/order_list');?>?city="+city+"&type=3&page="+$now_page;
	  });

	  	$("#selector").find("option[value='<?php echo ($city); ?>']").attr("selected",true);

	 	$('#selector').change(function(){ 
			var city = $(this).children('option:selected').val();
			window.location.href="<?php echo U('Home/Index/order_list');?>?city="+city;//页面跳转并传参 */
		});
	});


</script>
</head>

<body>
   <div class="bg5">
    <div class="bg5-title">
     <div class="select">
      <select name='make' id='selector'>
                        <option value=0 selected>请选择您所在的城市</option>
                        <option value=1>郑州市区</option>
                        <option value=14>郑州郊县</option>
                        <option value=2>洛阳</option>
                        <option value=3>新乡</option>
                        <option value=4>安阳</option>
                        <option value=5>濮阳</option>
                        <option value=6>焦作</option>
                        <option value=7>开封</option>
                        <option value=8>许昌</option>
                        <option value=9>驻马店</option>
                        <option value=10>周口</option>
                        <option value=11>信阳</option>
                        <option value=12>南阳</option>
                        <option value=13>平顶山</option>
      </select>
      </div>
     <div class="apply">
        <b>已报名</b><span><?php echo ($count); ?>人</span>
     </div>
    </div>
     <ul class="list">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
			<?php $rank = ($page-1)*$rate+$i; ?>
	          	<a href="<?php echo U('Home/Index/list_detail');?>?id=<?php echo ($vo["id"]); ?>&rank=<?php echo ($rank); ?>">
	          	<span class="icon"><?php echo $rank; ?></span>
	          	<img src="<?php echo ($vo["img_model"]); ?>" class="product">
	          	<div class="title-main">
	           		<div class="title"><b>姓名</b><span><?php echo ($vo["name"]); ?></span></div>
	           		<div class="title"><b>购买时间</b><span><?php echo (date('Y-m-d',$vo["ttime"])); ?></span></div>
	         	</div>
	         </a>
	        </li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
     <div class="green-black">
       
       <!-- <span class="current">1</span>
       <a href="">2</a>
       <a href="">3</a>
       <a href="">4</a>
       ...<a href="">199</a>
       <a href="">200</a>
       <a href="">Next  > </a> -->
       <span><?php echo ($page); ?>/<?php echo ($rate); ?></span>
       <a id="btn1">首页</a>
       <a id="btn2">上一页</a>
       <a id="btn3">下一页</a>
       <a id="btn4">尾页</a>
     </div>
   </div>

</body>
</html>