<!DOCTYPE html>
<html>
<head>
	<title>添加用户</title>
</head>
<body>
	<form action="{{url('user/store')}}" method="post">
		{{csrf_field()}}
		<!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		<table>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="user_name" value=""></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="user_pass" value=""></td>
			</tr>
			<tr>
				<td><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</body>
</html>