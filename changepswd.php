<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>password update</title>
</head>
<body>
	<h1 style="color: Tomato; text-align: center">Change Password</h1>


	<form action="changepassword.php" method="post">
		<table align="center">
			<tr>
				<td>old password:</td>
				<td><input type="password" name="oldpassword" required></td>
			</tr>

			<tr>
				<td>new password:</td>
				<td><input type="password" name="newpassword" required></td>
			</tr>

			<tr>
				<td>confirm new password:</td>

				<td><input type="password" name="confirmnewpassword" required></td>
			</tr>

			<tr>
				<td align="right" colspan="2"><input type="submit"
					value="update" name="update"> <input type="submit" value="clear"></td>
			</tr>

		</table>
	</form>
</body>
</html>