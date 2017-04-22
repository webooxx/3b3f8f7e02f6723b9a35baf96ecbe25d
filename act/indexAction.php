<?php


class indexAction extends Action
{


    function __construct()
    {
    }

    function test(){
    }


    function filterAccess(){
        return true;
    }

		//	前台界面
    function index(){

			$this->display('index.html');

    }

		//	管理界面 - 含有2个页面(配置|数据列表)
		function manager()
		{
      $user = $_SESSION['user'];

      if(!$user){
        $this->display('login.html');
      }else{
        $this->display('manager.html');
      }
			# code...
		}
    function login()
    {
      $args = A('tools')->args('password');
      if(!$args['password']){
        return $this->display('login.html');
      }

      sleep(1);
      
      $where = array('k'=>'password','v'=> md5($args['password']) );
      $data = M('info')->where($where)->debug(0)->limit(1)->find();

      if($data && $data['id']){
        $_SESSION['user'] = $data;
        $this->redirect('?a=manager');
      }else{
        unset( $_SESSION['user'] );
        $this->redirect('?a=login&msg=密码错误请3s后重试&ts='.( time()+ 10 ) );
      }

    }

		//	前台提交表单
		function submit_order()
		{
			# code...
		}
		//	登录提交
		function submit_login()
		{
		}
		//	管理-备注修改
		function submit_memo()
		{
			# code...
		}
		//	管理_状态修改
		function submit_status(){

		}


    // -- 其他功能
    private function is_phone(){
        $ua = $_SERVER['HTTP_USER_AGENT'];
        return (isset($_GET['phone']) || stripos($ua, 'android') != false || stripos($ua, 'ios') || stripos($ua, 'wp') != false || stripos($ua, 'mobile') != false);
    }

}
