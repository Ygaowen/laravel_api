<!DOCTYPE html>
<html>
<head>
	<title>用户修改</title>
</head>
<body>
	<form action="{{url('user/update')}}" method="post">
		{{csrf_field()}}
		<table>
				<tr>
					<input type="hidden" name="id" value="{{$user->id}}">
					<td>用户名</td>
					<td><input type="text" name="user_name" value="{{$user->user_name}}"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="user_pass" value="{{$user->user_pass}}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="修改"></td>
				</tr>
		</table>
	</form>
</body>
</html>