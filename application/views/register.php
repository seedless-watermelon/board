<br>
<script>
    function duplchkid() 
    {
        if (!form1.id.value) {
            alert("ID를 입력해주세요.");
            form1.id.focus();
            return;
        }
        window.open("/register/idcheck/" + form1.id.value,"","scrollbars=no, width=300,height=200");
    
    }
</script>
<form name="form1" method="post" action="/register/reg">

    <table class="table table-striped table-hover">
        <tr>
            
            <td width="20%" class="" style="vertical-align:middle">아이디</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="id"
                        id="id"
                        value="<?=set_value("id"); ?>"
                        style="width:400px;"
                        class="form-control form-control-sm"
                        placeholder="영문과 숫자를 사용한 아이디를 입력해주세요.">
                    &nbsp;<button type="button" class="btn btn-outline-secondary btn-sm" onclick=duplchkid()>중복확인</button>
                    <input type="hidden" name="check_id" value="">
                    <p class="text-danger">
                        *
                    </p>
                </div>
                <? if(form_error("id")==true) echo form_error("id"); ?>
                <? if(form_error("check_id")==true) echo form_error("check_id"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">비밀번호</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="pwd"
                        value="<?=set_value("pwd"); ?>"
                        style="width:400px;"
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
                        value="<?=set_value("nickname"); ?>"
                        style="width:400px;"
                        class="form-control form-control-sm">
                    <p class="text-danger">
                        *</p>
                </div>
                <? if(form_error("nickname")==true) echo form_error("nickname"); ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="" style="vertical-align:middle">이메일</td>
            <td width="80%">
                <div class="form-inline">
                    <input
                        type="text"
                        name="email"
                        value=""
                        style="width:400px;"
                        class="form-control form-control-sm"></div>
            </td>
        </tr>
    </table>

    <div class="text-center">
        <input type="submit" value="가입" class="btn btn-sm btn-outline-primary">
        &nbsp;
        <input
            type="button"
            value="이전화면"
            class="btn btn-sm btn-outline-secondary"
            onclick="history.back();"></div>

</form>