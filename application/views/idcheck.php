<html>
<head>
<title>중복ID 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?$id=$this->uri->segment(3);?>
<script language = "javascript">
	function Close_me(v)
	{
		opener.form1.check_id.value = v;
		opener.form1.pwd.value = v;
		window.open('','_self').close();
	}
</script>

<table  width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" ><b>&nbsp;중복 ID 조사</b></td>
	</tr>
	<tr><td  height="40"></td></tr>
<!-- 중복 아이디가 없는 경우 -->
<? 
if ($this->register_m->checkid($id) == false) {
	echo("
	<tr>
		<td height='50' valign='middle'>
			<b>$id</b>는 사용 가능한 아이디입니다.  
		</td>
	</tr>
	
	<tr>
		<td height='50'>
			<a href='javascript:Close_me(\"yes\");'><button type='button' class='btn btn-outline-secondary btn-sm'>확인</button></a>
		</td>
	</tr>
");
}
else echo(" 
	<tr>
		<td height='50' valign='middle'>
			<b>$id</b>는 사용할 수 없습니다.  
		</td>
	</tr>
	<tr>
		<td height='50'>
			<a href='javascript:Close_me(\"\");'><button type='button' class='btn btn-outline-secondary btn-sm'>확인</button></a>
		</td>
	</tr>
");
?>
</table>
	 
</body>
</html>