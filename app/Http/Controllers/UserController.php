<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    /*
	    获取一个添加页面
	    @param null
	    @return 返回添加页面
    */
    public function add(){
    	return view('user.add');
    }

    /*
		执行添加操作
		@param 提交表单数据
		@return 返回添加是否成功
    */
	public function store(Request $request){
		//1.获取用户提交的表单数据
		$input = $request->except('_token');
		//简单加密
		$input['user_pass'] = md5($input['user_pass']);
		
		//2.表单验证
		//3.添加操作
		//用DB添加数据
		/*$db = DB::table('user');
		$res = $db->insert([
			'user_name' => $input['user_name'],
			'user_pass' => $input['user_pass'],
		]);
		dump($res);*/

		//用user model添加数据
		$res = User::create([
			'user_name' => $input['user_name'],
			'user_pass' => $input['user_pass'],
		]);
		/*名字与数据库字段名一样可以直接用获取到的变量
		$res = User::create($input);*/
		//dump($res);
		//4.判断是否成功，有值代表成功
		if($res){
			return redirect('user/index');
		}else{
			return back();
		}
		
	}
	//展示列表
	public function index(){
		//查询全部数据
		$date = User::get();
		//三种方式传数据
		return view('user.index',compact('date'));
		/*return view('user.index',['date'=>$date]);
		return view('user.index')->with('date',$date);*/
	}
	//修改
	public function edit($id){
		$user = User::find($id);
		return view('user.edit',compact('user'));
	}
	//执行修改
	public function update(Request $request){
		//$update = $request->except('_token');
		$update = $request->all();
		$update['user_pass'] = md5($update['user_pass']);
		$res = User::find($update['id'])->update([
			'user_name' => $update['user_name'],
			'user_pass' => $update['user_pass'],
		]);
		/*$res = User::where('id',$update['id'])->update([
			'user_name' => $update['user_name'],
			'user_pass' => $update['user_pass'],
		]);*/
		//成功跳转列表页，失败返回原页
		if($res){
			return redirect('user/index');
		}else{
			return back();
		}
	}
	//删除
	public function del($id){
		$del = User::find($id)->delete();
		if ($del) {
			$date = [
				'status' => 0,
				'messages' => '删除成功',
			];
		}else{
			$date = [
				'status' => 1,
				'messages' => '删除失败',
			];
		}
		return $date;
	}
}
