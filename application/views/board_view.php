<?
    $num=$row->num;
?>

<br>
	<!-- 글 테이블 -->
    <div class="container">
		<div class="row">
			<table class="table table-striped" style=" border: 1px solid #dddddd">
				<tbody>
					<tr>
						<td style="width: 20%;">글 제목</td>
						<td colspan="2"><?=$row->title;?></td>
					</tr>
					<tr>
						<td>작성자</td>
						<td colspan="2"><?=$row->writer;?></td>
					</tr>
					<tr>
						<td>작성/수정일자</td>
						<td colspan="2"><?=$row->writedaytime;?></td>
					</tr>
					<tr>
						<td>조회수</td>
						<td colspan="2"><?=$row->views;?></td>
					</tr>
					<tr>
						<td>내용</td>
						<td colspan="2" style="height: 200px; text-align: left;"><?=$row->content;?></td>
					</tr>
					<tr>

                            <?
                                if ($row->pic)     // 이미지가 있는 경우
                                    echo("<td>사진</td>
                                    <td colspan='2' style='height: 200px; text-align: left;'>
                                    <img src='/pics/$row->pic'  class='img-fluid'>
                                    </td>");
                                else                   // 이미지가 없는 경우
                                    echo("<img src='' class='img-fluid'>");
                            ?>
                        
					</tr>
				</tbody>
			</table>
	    </div>
    </div>
	<!-- 글 테이블 -->
    <div class="text-center">
        
        <?
            if ($row->writer == $this->session->userdata("nickname"))
                echo("
                <a href='/b/del/num/$num' class='btn btn-sm btn-outline-danger' onClick='return confirm('삭제할까요?');'> 삭제 </a> &nbsp;
                <a href='/b/edit/num/$num' class='btn btn-sm btn-outline-primary'> 수정 </a> &nbsp;
                ");
        ?>

        <a href="/b/board" class="btn btn-sm btn-outline-secondary"> 글목록 </a>
    </div>



    