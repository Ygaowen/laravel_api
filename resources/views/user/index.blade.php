<!DOCTYPE html>
<html>
<head>
	<title>列表页</title>
	<script type="text/javascript" src="{{URL::asset('js/layer/jquery-1.11.3.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/layer/layer.js')}}"></script>
</head>
<body>
	<table border="1">
		<tr>
			<td>id</td>
			<td>用户名</td>
			<td>密码</td>
			<td>编辑</td>
		</tr>
		@foreach($date as $vo)
			<tr>
				<td>{{$vo->id}}</td>
				<td>{{$vo->user_name}}</td>
				<td>{{$vo->user_pass}}</td>
				<td><a href="/user/edit/{{$vo->id}}">修改</a>|<a href="javascript:;" onclick="del_memder(this,{{$vo->id}})">删除</a></td>
			</tr>
		@endforeach
	</table>
	<script type="text/javascript">

		function del_memder(obj,id){
			//询问框
			layer.confirm('您确定要删除吗？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				$.get('/user/del/'+id,function(date){
					if (date.status == 0) {
						$(obj).parents('tr').remove();//查找parents（）父元素，删除
						layer.msg(date.messages, {icon:6});						
					}else{
						layer.msg(date.messages,{icon:5});
					}					
				},'json');
			}, function(){
			  
			});
		}
		
	</script>
</body>
</html>