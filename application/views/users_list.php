<?
if ($this->session->userdata("admin")!=1)
    redirect("/b/board");
?>
<br>
<script>
    function find_text()
    {
        if (!form1.text1.value){
            form1.action="/users/lists";
        }
        else {
            form1.action="/users/lists/search/" + form1.text1.value;
        }
        form1.submit();
    }
</script>
<form name="form1" method="post" action="">
	<div class="row">
		<div class="col-auto">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
                <select class="form-control form-control-sm" name="target">
                <!-- <option value="nickname">닉네임</option> -->
                <option value="ID">ID</option>
            </select> 
				</div>
				<input type="text" name="text1" value="<?=$text1;?>" class="form-control form-control-sm" onkeydown="if (event.keyCode == 13){ find_text(); }">
				<span class="input-group-append">
					<button class="btn btn-sm btn-outline-secondary" onclick="javascript:find_text();">검색</button>
				</span>
			</div>
		</div>
	</div>
</form>
<br>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">uid</th>
            <th scope="col">ID</th>
            <th scope="col">비밀번호</th>
            <th scope="col">닉네임</th>
            <th scope="col">이메일</th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        <?php
  foreach ($list as $row)
  {
    $uid=$row->uid;
?>
        <tr>
            <th scope="row"><?=$uid ?></th>
            <td><?=$row->id ?></td>
            <td><?=$row->pwd ?></td>
            <td><?=$row->nickname ?></td>
            <td><?=$row->email ?></td>
            <td><a href="/users/view/uid/<?=$uid?>" class="btn btn-outline-danger">관리</a><td>
        </tr>
        <?
}
?>
    </tbody>
</table>

<?=$pagination; ?>
