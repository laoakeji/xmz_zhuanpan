<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>西门子家电-全城寻找老用户</title>
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
   <div class="bg5">
     <ul class="list-hou">
       <li><img src="<?php echo ($list["img_buy"]); ?>"></li>
       <li><img src="<?php echo ($list["img_model"]); ?>"></li>
     </ul>
     <div class="text">
       <table>
         <tbody> 
           <tr>
             <td>当前排名</td>
             <td>第<?php echo ($rank); ?>名</td>
           </tr>
           <tr>
             <td>姓名</td>
             <td><?php echo ($list["name"]); ?></td>
           </tr>
           <tr>
             <td>电话</td>
             <td><?php echo ($list["tel"]); ?></td>
           </tr>
           <tr>
             <td>购买时间</td>
             <td><?php echo (date('Y-m-d',$list["btime"])); ?></td>
           </tr>
           <tr>
             <td>所在地区</td>
             <td><?php echo ($list["cityname"]); ?></td>
           </tr>
           
         </tbody>
       </table>
     </div>
     <div class="fanhui"><a href="<?php echo U('Home/Index/index');?>">返回首页</a></div>
    
   </div>

</body>
</html>