<!DOCTYPE html>
<html lang="kr">
    <head>
        <meta charset="UTF-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ěě</title>
        <link href="/my/css/bootstrap.min.css" rel="stylesheet">
        <script src="/my/js/jquery-3.6.0.min.js"></script>
        <script src="/my/js/popper.min.js"></script>
        <script src="/my/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/b">đ</a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/b/board">ę˛ěí</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/b/notice">ęłľě§ěŹí­</a>
                            </li>
                            <?
                                if ($this->session->userdata("admin")==1)
                                echo ("<li class='nav-item'>
                                <a class='nav-link' href='/users/lists'>íěę´ëŚŹ</a>
                                </li>")
                            ?>

                        </ul>
<?
    if (!$this->session->userdata('id')) {
        echo("<a href='#loginModal' data-toggle='modal' class='btn btn-outline-secondary'>ëĄęˇ¸ě¸</a>"); 
?>
                        &nbsp;
<?       
        echo("<a href='/register'  class='btn btn-outline-secondary'>íěę°ě</a>");
    }
    else {
?>
                        <p class="text-white">
                            ë°ę°ěľëë¤
                            <?=$this->session->userdata('nickname')?>
                        </p>
                        &nbsp;
                        <?
        echo("<a href='/login/logout' class='btn btn-outline-secondary'>ëĄęˇ¸ěě</a>");
    }
?>

                    </div>
                </div>
            </nav>

            
            <!-- Modal -->
            <div
                class="modal fade"
                id="loginModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="loginModalLabel"
                style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="loginModalLabel">ëĄęˇ¸ě¸</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Ă</span></button>
                        </div>
                        <form
                            name="form_login"
                            method="post"
                            action="/login/check"
                            onsubmit="form_login.nowuri.value=location.href;">
                            <div class="modal-body bg-light" style="text-align:center">
                                <div class="form-inline">
                                    ěě´ë : &nbsp;&nbsp;
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        name="id"
                                        size="20"
                                        value="">
                                </div>
                                <div style="height:10px"></div>
                                <div class="form-inline">
                                    ě &nbsp;&nbsp; í¸ : &nbsp;&nbsp;
                                    <input
                                        type="password"
                                        name="pwd"
                                        size="20"
                                        value=""
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="modal-footer alert-secondary" style="text-align:center">
                                <button type="submit" class="btn btn-sm btn-secondary">íě¸</button>
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">ëŤę¸°</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>