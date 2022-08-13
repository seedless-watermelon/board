<?
    if ($this->session->userdata("admin")!=1)
    redirect("/b/board");
    $uid=$row->uid;
    $admin=$row->admin == 0 ? '회원' : '관리자';
?>

<br>

<form name="form1" method="post" action="">

        <table class="table table-striped table-hover">
            <tr>
                <td width="20%" class="" style="vertical-align:middle">UID</td>
                <td width="80%"><?=$row->uid;?></td>
            </tr>
            <tr>
                <td width="20%" class="" style="vertical-align:middle">ID</td>
                <td width="80%"><?=$row->id;?></td>
            </tr>
            <tr>
                <td width="20%" class="" style="vertical-align:middle">비밀번호</td>
                <td width="80%"><?=$row->pwd;?></td>
            </tr>
            <tr>
                <td width="20%" class="" style="vertical-align:middle">닉네임</td>
                <td width="80%"><?=$row->nickname;?></td>
            </tr>
            <tr>
                <td width="20%" class="" style="vertical-align:middle">이메일</td>
                <td width="80%"><?=$row->email;?></td>
            </tr>
            <tr>
                <td width="20%" class="" style="vertical-align:middle"> </td>
                <td width="80%"><?=$admin;?></td>
            </tr>
        </table>
    <div class="text-center">
        <a href="/users/del/uid/<?=$uid;?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('삭제할까요?');"> 삭제 </a> &nbsp;
        <a href="/users/edit/uid/<?=$uid;?>" class="btn btn-sm btn-outline-primary"> 수정 </a> &nbsp;
        <a href="/users" class="btn btn-sm btn-outline-secondary"> 이전화면 </a>
    </div>