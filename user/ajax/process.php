<?php include('../../config/condb.php');

date_default_timezone_set('Asia/Bangkok');

if (isset($_GET['action']) && $_GET['action'] == "insert_comment") {

  $status = false;
  $msg = 'Error';
  $user_id = $_SESSION['id'];
  $p_id = $_POST['p_id'];
  $com = $_POST['com'];
  $com_date = date("Y-m-d H:i:s");

  $sql = "INSERT INTO tbl_comment (p_id, user_id, com, com_date) 
    VALUES('$p_id', '$user_id', '$com', '$com_date')";

  //echo ($sql);
  if(mysqli_query($con, $sql)){
    $status = true;
    $msg = 'Successfull';
  }
  //header("location: index.php");
  $jdata = ['status' => $status, 'msg' => $msg];
  echo json_encode($jdata);
}

if (isset($_GET['action']) && $_GET['action'] == "insert_comment_reply") {

  $status = false;
  $msg = 'Error';
  $reply_user_id = $_SESSION['id'];
  $com_id = $_POST['com_id'];
  $reply = $_POST['reply'];
  $reply_user_type = 'user';
  $reply_date = date("Y-m-d H:i:s");

  $sql = "INSERT INTO tbl_comment_reply (com_id, reply_user_id, reply_user_type, reply, reply_date) 
    VALUES('$com_id', '$reply_user_id', '$reply_user_type', '$reply', '$reply_date')";

  //echo ($sql);
  if(mysqli_query($con, $sql)){
    $status = true;
    $msg = 'Successfull';
  }
  //header("location: index.php");
  $jdata = ['status' => $status, 'msg' => $msg];
  echo json_encode($jdata);
}

if (isset($_GET['action']) && $_GET['action'] == "delete_comment_reply") {

  $status = false;
  $msg = 'Error';
  $com_re_id = $_POST['com_re_id'];

  $sql = "DELETE FROM tbl_comment_reply WHERE com_re_id = $com_re_id ";

  //echo ($sql);
  if(mysqli_query($con, $sql)){
    $status = true;
    $msg = 'Successfull';
  }
  //header("location: index.php");
  $jdata = ['status' => $status, 'msg' => $msg];
  echo json_encode($jdata);
}

if (isset($_GET['action']) && $_GET['action'] == "delete_comment") {

  $status = false;
  $msg = 'Error';
  $com_id = $_POST['com_id'];

  $sql = "DELETE FROM tbl_comment WHERE com_id = $com_id ";
  $sql2 = "DELETE FROM tbl_comment_reply WHERE com_id = $com_id ";

  //echo ($sql);
  if(mysqli_query($con, $sql)){
    mysqli_query($con, $sql2);
    $status = true;
    $msg = 'Successfull';
  }
  //header("location: index.php");
  $jdata = ['status' => $status, 'msg' => $msg];
  echo json_encode($jdata);
}

if (isset($_GET['action']) && $_GET['action'] == "get_comment") {

  ?>

          <?php
          $sql = "SELECT * FROM tbl_comment where p_id='" . $_GET['p_id'] . "' ORDER BY com_id DESC ";
          $query = mysqli_query($con, $sql);
          while($data = mysqli_fetch_array($query)){

          ?>

          <script>
            load_comment_reply(<?=$data['com_id']?>);
          </script>

          <div class="item">
            <div class="topic">
              <i class="glyphicon glyphicon-user"></i>
              <?=$data['com']?>

              <?php if($data['user_id'] == $_SESSION['id']){ ?>
                <div class="p-right">
                  <a href="javascript:" onclick="return delete_comment('<?=$data['com_id']?>')">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                </div>
              <?php } ?>
            </div>
            <div class="sub">

              <div id="result-comment-reply-<?=$data['com_id']?>"></div>

              <?php if($_SESSION['id']){ ?>
              <div class="data" style="border-bottom: none; margin-top: 5px;">
                <div class="input-group">
                    <input name="reply-<?=$data['com_id']?>" type="text" class="form-control" placeholder="ตอบกลับ" aria-describedby="basic-addon2">
                    <span class="input-group-addon btn-reply" data-com-id="<?=$data['com_id']?>" id="basic-addon2">ตอบกลับ</span>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

          <?php } ?>

          <script>
            $('.btn-reply').on('click', function(){
              var com_id = $(this).attr('data-com-id');
              var reply = $('input[name=reply-'+com_id+']');
              if(reply.val() == ''){
                reply.focus();
                return false;
              }
              $.ajax({
                url: "ajax/process.php?action=insert_comment_reply",
                data: {com_id:com_id,reply:reply.val()},
                type: 'POST',
                dataType: 'json',
                success: function(data){
                  if(data.status == true){
                    load_comment_reply(com_id);
                    reply.val('');
                  }
                }
              });
            });

            function delete_comment_reply(com_id, com_re_id){
              $.ajax({
                url: "ajax/process.php?action=delete_comment_reply",
                data: {com_re_id:com_re_id},
                type: 'POST',
                dataType: 'json',
                success: function(data){
                  if(data.status == true){
                    load_comment_reply(com_id);
                  }
                }
              });
            }
          </script>


  <?php

}

if (isset($_GET['action']) && $_GET['action'] == "get_comment_reply") {
  ?>

                <?php
                $com_id = $_POST['com_id'];
                $sql2="SELECT * FROM tbl_comment_reply where com_id='" .$com_id. "'";
                $query2 = mysqli_query($con, $sql2);
                while($data2 = mysqli_fetch_array($query2)){
                ?>

                <div class="data">
                  <i class="glyphicon glyphicon-user"></i>
                  <?=$data2['reply']?>

                  <?php if($data2['reply_user_id'] == $_SESSION['id']){ ?>
                    <div class="p-right">
                      <a href="javascript:" onclick="return delete_comment_reply('<?=$data2['com_id']?>','<?=$data2['com_re_id']?>')">
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
                    </div>
                  <?php } ?>
                </div>

                <?php } ?>

  <?php
}

