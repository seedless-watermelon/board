<?
if ($this->session->userdata("admin")!=1)
    redirect("/b/board");
?>
<br>

<form name="form1" method="post" action="">

    <table class="table table-striped table-hover">
        <tr>
            <td width="20%" class="" style="vertical-align:middle">uid</td>
            <td width="80%"> <?=$row->uid;?> </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">아이디</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="id"
                        value="<?=$row->id;?>"
                        class="form-control form-control-sm">
                    <p class="text-danger">
                        *</p>
                </div>
                <? if(form_error("id")==true) echo form_error("id"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">비밀번호</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="pwd"
                        value="<?=$row->pwd;?>"
                        class="form-control form-control-sm">
                    <p class="text-danger">
                        *</p>
                </div>
                <? if(form_error("pwd")==true) echo form_error("pwd"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">닉네임</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="nickname"
                        value="<?=$row->nickname;?>"
                        class="form-control form-control-sm">
                    <p class="text-danger">*</p>
                </div>
                <? if(form_error("nickname")==true) echo form_error("nickname"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">이메일</td>
            <td width="80%">
                <div class="form-inline">
                    <input type="text" name="email" value="<?=$row->email;?>" class="form-control form-control-sm"></div>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle"> </td>
            <td width="80%">
            <? if ($row->admin == 0) { ?>
                    <input type="radio" name="admin" value="0" checked> 회원 &nbsp; &nbsp;
                    <input type="radio" name="admin" value="1"> 관리자

            <? }else { ?>
                    <input type="radio" name="admin" value="0"> 회원 &nbsp; &nbsp;
                    <input type="radio" name="admin" value="1" checked> 관리자
            <? } ?>
            </td>
        </tr>
    </table>

    <div class="text-center">
        <input type="submit" value="확인" class="btn btn-sm btn-outline-primary">
        &nbsp;
        <input
            type="button"
            value="이전화면"
            class="btn btn-sm btn-outline-secondary"
            onclick="history.back();"></div>

</form>