<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function __construct() {
		parent::__construct();
		//check_wx_login();
        wx_login();

        $this->get_signPackage();

        $sys_set['share_title'] = "";
        $sys_set['share_img'] = "";
        $sys_set['share_desc'] = "";

        $this->assign("sys_set",$sys_set);
       	//$_SESSION['uid'] = 1;

        
	}

    /*分享配置参数*/
    public function get_signPackage() {
        require_once THINK_PATH . "Weixin/WxApi.class.php";
        $wx = new \WxApi;
        $signPackage = $wx->wxJsapiPackage();
        $this->assign('signPackage', $signPackage);
    }

    public function index(){
        $uid = uid();
        $list = D("user")->where("uid=$uid")->find();
        $this->assign("list",$list);
        $this->display();
    }

    public function submit(){
    	$path = './Uploads/images/';
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->autoSub   =     false ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $path; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            //$this->ajaxReturn(array("code"=>0,'msg'=>"上传失败！"));exit;
            $file1 = "";
            $file2 = "";
        }else{// 上传成功
            $file1 = $info['file1']['savename'];
            $file2 = $info['file2']['savename'];
        }

        $uid = uid();
        $data = I("post.");
        $data['btime'] = strtotime($data['btime']);
        $data['ttime'] = time();
        $data['img_buy'] = '/Uploads/images/'.$file1;
        $data['img_model'] = '/Uploads/images/'.$file2;
        D("user")->where("uid=$uid")->save($data);
        $this->display("sub_hou");
    }

    public function sub_hou(){
    	$this->display();
    }

    public function addnum(){
    	$uid = uid();
    	$num = D("user")->where("uid = $uid")->getfield("num");
    	if($num == -1){
    		$map['num'] = 1;
    	}
    	D("user")->where("uid = $uid")->save($map);

    	$this->ajaxReturn(array("code"=>1,'msg'=>'分享成功'));
    }

    public function choujiang(){
    	$uid = uid();
    	$arr = D("user")->where("uid = $uid")->find();
    	$this->assign("list",$arr);
    	$this->display();
    }

    public function get_rank(){
    	$uid = uid();
    	$arr_user = D("user")->where("uid = $uid")->find();
    	if($arr_user['num'] == -1){
    		$this->ajaxReturn(array("code"=>-1,'prize'=>'分享后获取抽奖名额','angle'=>0));exit;
    	}
    	if($arr_user['num'] == 0){
    		$this->ajaxReturn(array("code"=>0,'prize'=>'你的抽奖次数已用完！是否跳转到奖品页面。','angle'=>0));exit;
    	}
 
    	$data_prize = D("prize")->select();
    	$prize_arr = get_prize($data_prize);
    	foreach ($prize_arr as $key => $val) { 
		    $arr[$val['id']] = $val['v']; 
		} 
		
		$rid = getRand($arr); //根据概率获取奖项id 

		$res = $prize_arr[$rid-1]; //中奖项 

		$prize_data = D("prize")->where("id=".$res['id'])->find();
		if($prize_data['last']<=0){
			$res = $prize_arr[2]; //中奖项 
		}else{
			$res = $prize_arr[$rid-1]; //中奖项 
		}

		$min = $res['min']; 
		$max = $res['max']; 
		/*if($res['id']==7){ //七等奖 
		    $i = mt_rand(0,5); 
		    $result['angle'] = mt_rand($min[$i],$max[$i]); 
		}else{ 
		    $result['angle'] = mt_rand($min,$max); //随机生成一个角度 
		} */
        $result['angle'] = mt_rand($min,$max); //随机生成一个角度
		$result['prize'] = $res['prize'];
		$result['code'] = 1;  

		$num = $arr_user['num'] - 1;
		$this->ajaxReturn(array("code"=>$res['id'],'prize'=>$result['prize'],'angle'=>$result['angle'],'num'=>$num));exit;
    }

    public function save_prize(){
    	$uid = uid();
    	$map["pid"] = I("post.id",0);
    	$map["num"] = I("post.num",0);
    	$map["ptime"] = time();

    	$id = D("user")->where("uid = $uid")->save($map);

    	$num = D("prize")->where("id = ".$map["pid"])->getfield("last");
    	$map2["last"] = $num -1;
    	$ids = D("prize")->where("id = ".$map["pid"])->save($map2);

    	if($id>0){
    		$this->ajaxReturn(array("code"=>1,'msg'=>'success'));exit;
    	}else{
    		$this->ajaxReturn(array("code"=>0,'msg'=>'error'));exit;
    	}
    }

    public function take_prize(){
    	$uid = uid();
    	$map["is_pid"] = -1;
    	$id = D("user")->where("uid = $uid")->save($map);
    	if($id>0){
    		$this->ajaxReturn(array("code"=>1,'msg'=>'领取成功'));exit;
    	}else{
    		$this->ajaxReturn(array("code"=>0,'msg'=>'领取失败'));exit;
    	}
    }

    public function order_list(){
    	$type=I("get.type",1);
    	$page=I("get.page",0);
    	$page = $page - 1;

        $city = I("get.city",0);
        $where = "";
        if($city != 0){
            $where = " and city = ".$city;
        }

    	$num = 10;
    	$limit = "";
    	$uid = uid();

    	$count = D("user")->where("ttime>0".$where)->count();
    	$rate = ceil($count/$num);

    	if($type==1){
    		$limit = " limit 0,$num ";
    		$page = 1;
    	}else if($type==3){
    		$remain = fmod(floatval($count),$num);
    		if($rate>0){
    			$p = ($rate-1)*$num;
	    		$limit = " limit $p,$num";
		    	$page = $rate;
    		}
    	}else if($type == 2){
    		$p = $page*$num;
    		$limit = " limit $p,$num";
    		$page = $page+1;
    	}

    	$sql = "select * from pg_user where ttime>0 ".$where." order by ttime asc ".$limit;
    	$list = M()->query($sql);

        $this->assign("city",$city);
    	$this->assign("list",$list);
    	$this->assign("num",$num);
    	$this->assign("rate",$rate);
    	$this->assign("page",$page);
    	$this->assign("count",$count);
    	$this->display();
    }

    public function list_detail(){
        $id = I("get.id",1);
        $rank = I("get.rank",1);
        $sql = "select a.*,b.name as cityname from pg_user a,pg_city b where a.city = b.id and a.id=".$id;
        $arr = M()->query($sql);
        $this->assign("list",$arr[0]);
        $this->assign("rank",$rank);
        $this->display();
    }

    public function award(){
    	$uid = uid();
    	$sql = "SELECT a.*,b.name AS prizename,b.num AS prizenum FROM pg_user a,pg_prize b WHERE a.pid = b.id AND a.uid = $uid";
    	$arr = M()->query($sql);
    	$this->assign("list",$arr[0]);
    	$this->display();
    }
    
}

function get_prize($data){
    $array = array();

    foreach ($data as $key => $val) { 
		$arr = array();
    	$arr["id"] = $val["id"];
    	$arr["prize"] = $val["name"];
    	$arr["min"] = $val["min"];
    	$arr["max"] = $val["max"];
    	$arr["v"] = $val["rate"];
    	$array[] = $arr;
	}

    return $array;
}

function getRand($proArr) { 
    $result = ''; 
    //概率数组的总概率精度 
    $proSum = array_sum($proArr); 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 
    return $result; 
} 