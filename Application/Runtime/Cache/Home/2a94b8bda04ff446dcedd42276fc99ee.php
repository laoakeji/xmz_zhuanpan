<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>西门子家电-全城寻找老用户</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=yes">
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<link rel="stylesheet" href="/Public/Home/css/style.css" />
<link rel="stylesheet" href="/Public/Home/css/data.css">
<link rel="stylesheet" href="/Public/Home/css/animate.min.css">

<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/swiper.js"></script>
<script src="/Public/Home/js/uploadPreview.js"></script>
<script type="text/javascript" src="/Public/Home/js/date.js" ></script>
<script type="text/javascript" src="/Public/Home/js/iscroll.js" ></script>
<script type="text/javascript" src="/Public/Home/layer/layer.js"></script>
<script type="text/javascript" src="/Public/Home/js/swiper.animate1.0.2.min.js"></script>

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
            if(result.code == 1){
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
            if(result.code == 1){
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


<script type="text/javascript">
  $(function(){
  	$('#beginTime').date();
  	
  });

  function check_form(form) {
    
    if(form.name.value=='') {
      alert("请输入姓名!");
      form.name.focus();
      return false;
    }
    if(form.tel.value==''){
      alert("请输入电话!");
      form.tel.focus();
      return false;
    }

    
    
    if(form.btime.value==''){
      alert("请输入购买时间!");
      form.btime.focus();
      return false;
    }
    if(form.city.value==0){
      alert("请选择地区!");
      return false;
    }
    if(!$(".file1").val()){
      alert("请上传购机凭证!");
      return false;
    }
    if(!$(".file2").val()){
      alert("请上传实物照片!");
      return false;
    }
    return true;
  }
</script>

</head>

<body>
   <!-- Swiper -->
   <img src="/Public/Home/icon/logo.png" class="logo ">
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide bg-index1">
                <img src="/Public/Home/icon/bg1-icon1.png" class="bg1-text1 ani"  swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
                
                <div class="btn">
                  <a href="<?php echo U('Home/Index/order_list');?>" ><img src="/Public/Home/icon/bg1btn3.png"></a>
                  <a id="btn" ><img src="/Public/Home/icon/bg1btn4.png"></a>
                  <a id="choujiang"><img src="/Public/Home/icon/bg1btn1.png"></a>
                  <a  class="sure_btn"><img  src="/Public/Home/icon/bg1btn2.png"></a>
                 
                </div>
                <img class="up1" src="/Public/Home/icon/icon_down.png" alt="">
            </div>

            <div class="swiper-slide bg-index3">
              <img src="/Public/Home/icon/bg-index3-text1.png" class="bg-index3-text1 ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
              <ul class="bg-index3-text2">
                <li class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>用户上传有效购机凭证照片及家中西门子家电实物照片，并填写相关信息参与活动，报名截止时间2016年9月8日24时。</span></li>
                <li class="ani" swiper-animate-effect="bounceInRight" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>所有参与用户均可获得一次抽奖机会，凭中奖页面前往任一西门子家电专柜领取礼品（"我的奖品"页面中的"立即领取"按钮请交由我司工作人员点击操作，否则礼品将视为已领取。）</span></li>
                <li class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>根据购机凭证日期最早的用户获赠西门子冰箱一台，每地市一台，共计14台。</span></li>
                 <li class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>我司将与最老用户联系并上门实际查看产品，任何作弊行为均判定为中奖无效。</span></li>
              </ul>
              <img class="up1" src="/Public/Home/icon/icon_down.png" alt="">
            </div>

            <div class="swiper-slide bg-index2">
              <img  src="/Public/Home/icon/bg2-index-text1.png" class="bg-index2-text2 ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
              <img src="/Public/Home/icon/yu.png" class="bg-index2-text3 ani" swiper-animate-effect="rubberBand" swiper-animate-duration="0.5s" swiper-animate-delay="1s">
              <img class="up1" src="/Public/Home/icon/icon_down.png" alt="">
            </div>
            
            <div class="swiper-slide bg-index4">
              <img src="/Public/Home/icon/bg-index4-text1.png" class="bg-index4-text1 ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
                
              <img src="/Public/Home/icon/bg-index4-text2.png" class="bg-index4-text2 ani" swiper-animate-effect="bounceIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
              <img src="/Public/Home/icon/bg-index4-text3.png" class="bg-index4-text3 ani" swiper-animate-effect="rubberBand" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
              <img class="up1" src="/Public/Home/icon/icon_down.png" alt="">
            </div>

            <!-- <div class="swiper-slide bg-index3">
              <img src="/Public/Home/icon/bg-index3-text1.png" class="bg-index3-text1 ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s">
              <ul class="bg-index3-text2">
                <li class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>凭借购机发票或者收据至门店登记 即可参加此次活动，</span></li>
                <li class="ani" swiper-animate-effect="bounceInRight" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>由工作人员拍照后按照要求上传微信平台 报名截止时间：9月11日当天下午6点</span></li>
                <li class="ani" swiper-animate-effect="bounceInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0.3s"><em></em><span>系统按照上传凭证选取最终获奖用户并由售后 与用户联系后上门为用户进行换新升级活动</span></li>
              </ul>
              <img class="up1" src="/Public/Home/icon/icon_down.png" alt="">
            </div> -->
            <div class="swiper-slide bg2" id="bg2">

              <form id="form" enctype="multipart/form-data" method="post" action="/index.php/Home/Index/submit" onsubmit="return check_form(this)">
                <img src="/Public/Home/icon/form-icon1.png" class="form-icon1">
               <ul class="form-ul">
                   <li><span><img src="/Public/Home/icon/form-use1.png"></span><input type="text" placeholder="姓名" name="name" id="name" ></li>
                   <li><span><img src="/Public/Home/icon/form-use2.png"></span><input type="text" placeholder="电话" name="tel" id="phone"></li>
                   <li><span><img src="/Public/Home/icon/form-use3.png"></span><input type="text" placeholder="购机凭证日期" name="btime" id="beginTime"></li>
                   <li><span><img src="/Public/Home/icon/form-use4.png"></span>
                     <select id='make' name='city' class="dropdown-select">
                       <option  value='0' selected>请选择您所在的城市</option>
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
                   </li>
              </ul>
              <div id="datePlugin"></div>
              <ul id="warp">

                   <li class="chuan">
                     <div class="preview">
                        <img id="imgShow_WU_FILE_0" class="img1" name="img1" width="100%" height="120" src="" />
                     </div>
                     <div class="shangchuan1">
                        <input class="file1" type="file" name="file1" id="up_img_WU_FILE_0" />
                     </div>
                   </li>

                   <li class="chuan">
                     <div class="preview">
                        <img id="imgShow_WU_FILE_1" name="img2" width="100%" height="120" src="" />
                     </div>
                     <div class="shangchuan2">
                        <input class="file2" type="file" name="file2" id="up_img_WU_FILE_1" />   
                     </div>
                   </li>

              </ul>

             <!-- <div class="tijiao" id="w_s"></div> -->
             <div style="width:100%;  height:auto; width:200px; margin:20px auto;">
             <input  class="tijiao" id="w_s" type="submit" name="submit" value="提交" />
             </div>
            </form>
            </div>
            
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
       
    </div>
   
    <div class="layer_notice">
     <h1>活动说明</h1>
    <div class="shuoming">
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
      <h2>活动说明</h2>
      <p>活动说明活动说明活动说明活动说明活动说明活动说明活动说明</p>
    
    </div>
  </div>
     <script>
    var swiper = new Swiper('.swiper-container', {
       pagination: null,
        paginationClickable: true,
        direction: 'vertical',
        nextButton:".silde_next",
        preventClicks : false,
        followFinger : false,
		onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
    swiperAnimateCache(swiper); //隐藏动画元素 
    swiperAnimate(swiper); //初始化完成开始动画
  }, 
  onSlideChangeEnd: function(swiper){ 
    swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
  }  
    });
    </script>

    <script type="text/javascript">
    	$(".sure_btn").click(function(){
  				/*layer.open({
            type: 1,
            shade: false,
            title: false, //不显示标题
            content: $('.layer_notice'), //捕获的元素
          });*/
          swiper.slideTo(1, 300, true);
  		})

      $(".tijiao1").click(function(){
          var _name = $("#name").val();
          var _phone = $("#phone").val();
          var _time = $("#beginTime").val();
          var _city = $("#make  option:selected").text();
          var _img_buy = $(".filed1").text();
          var _img_model = $(".filed2").text();

          $.post("<?php echo U('Home/Index/submit');?>",{name:_name,tel:_phone,ttime:_time,city:_city,img_buy:_img_buy,img_model:_img_model},function(result){ 
              alert(result.msg);return;
              window.location.href="<?php echo U('Home/Index/sub_hou');?>"; 
          })

      })

    </script>
    <script>
   
    $("#btn").on("click",function(){
		
        swiper.slideTo(5, 1000, true);
    })
</script>
 <script>
   
    $("#choujiang").on("click",function(){
      var is_prize = Number("<?php echo ($list["ttime"]); ?>");
      if(is_prize == 0){
        alert("您需要填写信息才能抽奖哦！");
        swiper.slideTo(5, 1000, true);
      }else{
        window.location.href = "<?php echo U('Home/Index/choujiang');?>";
      }
    })
   
</script>

</body>
</html>