<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的奖品</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=yes">
<link rel="stylesheet" href="/Public/Home/css/style.css" />
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/swiper.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.rotate.min.js"></script>

</head>

<body>
   <div class="bg6">

    <img src="/Public/Home/icon/award-icon1.png" class="bg6-text1">

    <?php if($list["pid"] != 3): if(($list["is_pid"]) == "0"): ?><div class="youhuijuan sure-btn" ids="1"><?php endif; ?>
      <?php if(($list["is_pid"]) == "-1"): ?><div class="youhuijuan sure-btn" style="background-image: url('/Public/Home/icon/hou.jpg');" ids="2"><?php endif; ?>
        <div  class="youhuijuan-main">
          <div class="youhuijuan-left">
            <!-- <span>KAN92S80TI </span> -->
            <div> </div>
            <div> </div>
            <span><?php echo ($list["prizename"]); ?></span>
            <!-- <span>已优惠0.38</span> -->
            <!-- <span class="yuan">原价<em>13990</em></span> -->
          </div>
          <span class="youhuijuan-right">点击<br>领取</span>
        </div>
      </div><?php endif; ?>

    
</div>
   
<script  src="/Public/Home/layer/layer.js"></script>
<script type="text/javascript">
     
  	$(".sure-btn").click(function(){
        var ids = $(".sure-btn").attr("ids");
        if(ids == "2"){
          return;
        }
				layer.confirm('你确定要领取奖品吗', {
				   btn: ['确定','取消'] //按钮
				}, function(){

          $.post("<?php echo U('Home/Index/take_prize');?>",null,function(result){ 
            if(result.code == 1){
              layer.msg('领取成功',{
                icon: 1,
                time: 1000 //2秒关闭（如果不配置，默认是3秒）
              });
              $("em").css("color","#999");
              $(".sure-btn").css("background-image","url(/Public/Home/icon/hou.jpg)");
              $(".sure-btn").attr("ids",2);
            }else if(result.code == 0){
              layer.msg('领取失败',{
                icon: 1,
                time: 1000 //2秒关闭（如果不配置，默认是3秒）
              });
            }
          })


					
										
				},function(){
					//取消
				})
			})
        </script>

</body>
</html>