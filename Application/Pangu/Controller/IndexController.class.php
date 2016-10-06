<?php
namespace Pangu\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function __construct() {
		parent::__construct();
		check_admin_login();
	}
	public function index() {
		$this->display();
	}
	/**
	 * 系统信息
	 * @wxy
	 * @DateTime 2016-05-20T16:11:00+0800
	 * @return   [type]                   [description]
	 */
	public function welcome() {
		//p(build_order_no());
		$arr['php_uname1'] = php_uname('s');
		$arr['php_uname2'] = php_uname('r');
		$arr['php_sapi_name'] = php_sapi_name();
		$arr['PHP_VERSION'] = PHP_VERSION;
		$arr['DEFAULT_INCLUDE_PATH'] = DEFAULT_INCLUDE_PATH;
		$arr['host'] = $_SERVER["HTTP_HOST"];
		$arr['ip'] = GetHostByName($_SERVER['SERVER_NAME']);
		$arr['root'] = $_SERVER['SystemRoot'];
		$arr['port'] = $_SERVER['SERVER_PORT'];
		$arr['day'] = date("Y-m-d");

		$this->assign('sys', $arr);
		$this->display();
	}

	public function ratesys(){
		$list = D("prize")->select();
		$this->assign("list",$list);
		$this->display();
	}

	public function data_submit(){

		$sql = "select a.*,b.name as cityname from pg_user a,pg_city b where a.city=b.id and ttime>0";
		$count = count(M()->query($sql));//总计条数
        $Page = new \Think\Page($count, 50);// 实例化分页类 传入总记录数和每页显示的记录数
        $list = M()->query($sql." limit $Page->firstRow,$Page->listRows");
        $page = $Page->show();
        $this->assign('list', $list); // 赋值数据集
        $this->assign('count', $count); // 赋值分页输出
        $this->assign('page',$page);
        $this->display();
	}


	/**
	 * 通用提交编辑
	 * @wxy
	 * @DateTime 2016-05-20T16:39:51+0800
	 * @return   [type]                   [description]
	 */
	public function do_edit() {
		$id = I("get.id", 0);
		$table = I("get.table", 0);
		$data = I("post.");

		if ($table == "match") {
			$data['c_time'] = strtotime($data['c_time']);
		}

		if ($id == 0) {
			$s = D($table)->add($data);
		} else {
			$data['k_time'] = time();
			$data['status'] = 1;//1表示已经开奖了
			$s = D($table)->where("id=$id")->save($data);
		}
		if ($table == "sys_set") {
			S("sys_set", null);
		}
		echo $s;
	}

	/**
	 * 删除公用方法
	 * @wxy
	 * @DateTime 2016-05-21T09:56:38+0800
	 * @return   [type]                   [description]
	 */
	public function do_del() {
		$id = I("post.id");
		$table = I("post.table");
		if ($table == "wx_user") {
			$s = D($table)->where("uid=$id")->delete();
		} else {
			$s = D($table)->where("id=$id")->delete();
		}
		switch ($table) {
		case 'goods':
			S("goods_" . $id, null);
			S("goods_base_" . $id, null);
			break;

		default:
			# code...
			break;
		}

		echo $s;
	}

	/**
	 * 删除全部
	 * @wxy
	 * @DateTime 2016-05-21T09:59:24+0800
	 * @return   [type]                   [description]
	 */
	public function do_del_all() {
		$ids = I("get.ids");
		$ids = rtrim($ids, ",");
		$table = I("get.table");
		if ($table == "wx_user") {
			$s = D($table)->where("uid in ($ids)")->delete();
		} else {
			$s = D($table)->where("id in ($ids)")->delete();
		}
		$ids = explode(',', $ids);
		switch ($table) {
		case 'goods':
			foreach ($ids as $key => $e) {
				S("goods_" . $e, null);
				S("goods_base_" . $e, null);
			}
			break;
		default:
			# code...
			break;
		}
		echo $s;
	}

	/**
	 * 通用编辑页面
	 * @wxy
	 * @DateTime 2016-05-20T16:39:25+0800
	 * @return   [type]                   [description]
	 */
	public function edit() {
		$id = I("get.id", 0);
		$table = I("get.table", 0);
		$arr = D($table)->where("id=$id")->find();

		$this->assign("list", $arr);
		$this->assign("id", $id);
		$this->display("edit_" . $table);
	}

	public function gettotal(){
		$rand_a = 0.01;
		$rand_b = 68;

		$price = 13990;
		$low_price = 700;

		$data = array();
		$money = 0;
		$getCount = 0;

		for($i=0;$i<10000;$i++){
			$money = 0;
			for($j=0;$j<88;$j++){
				$rand = rand($rand_a*100,$rand_b*100)*0.01;
				$money += $rand;
			}
			if($money>=4200){
				$getCount++;
			}
		}

		echo $getCount/100;exit;


	}


}