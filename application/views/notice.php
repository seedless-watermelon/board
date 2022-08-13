<br>
<script>
    function find_text()
    {
        if (!form1.text1.value){
            form1.action="/b/notice";
        }
        else {
            form1.action="/b/notice/search/" + form1.text1.value;
        }
        form1.submit();
    }
</script>

<?
    if ($this->session->userdata('admin') == 1) 
        echo("<a href='/b/writenotice'  class='btn btn btn-outline-dark'>공지 작성</a>");        
    else
        echo("");
?>

<br>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">조회수</th>
        </tr>
    </thead>
    <tbody>
        <?php
  foreach ($list as $row)
  {
    $num=$row->num;
?>
        <tr>
            <th scope="row"><?=$num ?></th>
            <td><a href ="/b/view/<?=$num ?>"><?=$row->title ?></a></td>
            <td><?=$row->writer ?></td>
            <td><?=$row->views ?></td>
        </tr>
        <?
}
?>
    </tbody>
</table>
<form name="form1" method="post" action="">
	<div class="row justify-content-center">
		<div class="col-auto">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
                <select class="form-control form-control-sm" name="target">
                <!-- <option value="nickname">닉네임</option> -->
                <option value="title">제목</option>
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
<?=$pagination; ?>
