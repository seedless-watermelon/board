<?
    if (!$this->session->userdata('id'))
    redirect("/b/board");
?>

<br>

    <form name="form1" method="post" enctype = "multipart/form-data">

        <div class="row">
            <div class="form-group col-12">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend"> 
                    <span class="input-group-text">제목</span>
                    </div>
                    <input type="text" name="title" class="form-control form-control-sm" maxlength="50" value="<?=set_value("title"); ?>" >
                </div>
                <? if(form_error("title")==true) echo form_error("title"); ?>
            </div>
        </div>

        <div class="form-group">
		    <textarea class="form-control" rows="20" name="content" placeholder="내용을 입력해주세요." value="<?=set_value("content"); ?>"></textarea>
            <? if(form_error("content")==true) echo form_error("content"); ?>
	    </div>
        <input type="file" name="pic">

        <input type="hidden" name="board" value="board">
        <div class="text-center">
            <input type="submit" value="작성" class="btn btn-sm btn-outline-primary">
                &nbsp;
            <input type="button" value="이전화면" class="btn btn-sm btn-outline-secondary" onclick="history.back();">
        </div>
    </form>