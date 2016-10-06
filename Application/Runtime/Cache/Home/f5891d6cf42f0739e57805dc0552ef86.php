<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>抽奖</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=yes">
<link rel="stylesheet" href="/Public/Home/css/style.css" />
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/swiper.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.rotate.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script> 
  wx.config({
    appId: '<?php echo ($signPackage["appId"]); ?>',
    timestamp: '<?php echo ($signPackage["timestamp"]); ?>',
    nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>',
    signature: '<?php echo ($signPackage["signature"]); ?>',
    jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','showOptionMenu'
      // 所有要调用的 API 都要加到这个列表中
    ]
  });
  wx.ready(function () {
    wx.showOptionMenu();
    wx.onMenuShareTimeline({
    title: '西门子家电-全城寻找老用户', // 分享标题
    link: "http://sn717.ktwlkj.com/index.php/Home/Index/index", // 分享链接
    imgUrl: 'http://sn717.ktwlkj.com/Public/20160829160334.jpg', // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数
        $.post("<?php echo U('Home/Index/addnum');?>",null,function(result){ 
            if(result.msg == 1){
              alert("分享成功，可以参与抽奖了");
            }
        })
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
  });

  wx.onMenuShareAppMessage({
    title: '西门子家电-全城寻找老用户', // 分享标题
    desc: '西门子家电-全城寻找老用户', // 分享描述
    link: "http://sn717.ktwlkj.com/index.php/Home/Index/index", // 分享链接
    imgUrl: 'http://sn717.ktwlkj.com/Public/20160829160334.jpg', // 分享图标
    type: '', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        // 用户确认分享后执行的回调函数
        $.post("<?php echo U('Home/Index/addnum');?>",null,function(result){ 
            if(result.msg == 1){
              alert("分享成功，可以参与抽奖了");
            }
        })
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
  });
});

</script>
</head>

<body>
   <div class="bg4 award">
      <div class="zp_out">
        <img src="/Public/Home/icon/zp_out_bj.png">
        <div class="dial">
            <div class="big_zp"><img src="/Public/Home/icon/big_zp.png"></div>
            <div class="small_zp" id="small_zp"><img src="/Public/Home/icon/small_zp.png"></div>
        </div>
    </div>
    <div class="chance" style="display: none"><b>剩余机会</b><span>1</span></div>
    <div class="jiang"><a href="award.html">我的奖品</a></div>
    
   </div>
   <script>
    $(function(){    //概率由后台计算
        $("#small_zp").rotate({
            bind:{
                click:function(){
                    var prize = '';
                    var _num = 0;
                    var _id = 0;
                    $.post("<?php echo U('Home/Index/get_rank');?>",null,function(result){ 
                        if(result.code>0){
                            a = Number(result.angle);
                            prize = result.prize;
                            _num = result.num;
                            _id = result.code;
                                
                            $(".big_zp").rotate({
                                duration: 3000,//转动时间间隔（转动速度）
                                angle: 0,  //开始角度
                                animateTo: -3600 - a, //转动角度，10圈+
                                easing: $.easing.easeOutSine, //动画扩展
                                callback: function () { //回调函数
                                    $.post("<?php echo U('Home/Index/save_prize');?>?",{id:_id,num:_num},function(result){
                                        if(result.code>0){
                                            alert("恭喜你抽中："+prize);
                                        }
                                    })
                                }
                            });
                        }else if(result.code == 0){
                            var n=confirm("你的抽奖次数已用完！是否跳转到奖品页面。")
                            if(n){
                                window.location.href="<?php echo U('Home/Index/award');?>";
                            }else{
                                return false;
                            }
                        }else{
                            alert(result.prize);
                            return false;
                        }
                    })
                }
            }
        });
    });
</script>

</body>
</html>