<?php 
$qry = $conn->query("SELECT * FROM `conversation_list` where id = '{$_GET['id']}' and (`user_1` = '{$_settings->userdata('id')}' or `user_2` = '{$_settings->userdata('id')}') ");
if($qry->num_rows > 0){
    foreach($qry->fetch_array() as $k => $v){
        if(!is_numeric($k))
            $$k = $v;
    }
    $msg = $conn->query("SELECT m.*,CONCAT(u.firstname,' ', COALESCE(u.middlename,''), ' ', u.lastname) as `name`, u.username, u.avatar FROM `message_list` m inner join users u on m.from_user = u.id  where m.conversation_id = '{$id}' order by unix_timestamp(m.date_updated) asc limit 1 ")->fetch_array();
    $conn->query("UPDATE `message_list` set `status` = 1 where conversation_id = '{$id}' and to_user = '{$_settings->userdata('id')}'");
}
else{
    echo "<script>alert('ID is unknown or you dont have access to view the Message.'); location.replace('./?page=inbox');</script>";
}
?>
<style>
    .sender-image{
        width: 2.5rem;
        object-fit: scale-down;
        object-position: center center;
    }
</style>
<section class="py-3">
    <div class="container">
        <fieldset class='border mb-3'>
            <div class="d-flex align-items-center">
                <div class="col-1 text-center">
                    <img src="<?= validate_image($msg['avatar']) ?>" alt="" class="sender-image rounded-circle border">
                </div>
                <div class="col-10">
                    <div class="lh-1">
                        <small><span class="text-muted"><span class="material-icons">person</span></span> <b><?= $msg['name'] ?></b></small><br>
                        <small><span class="text-muted"><span class="material-icons">alternate_email</span></span> <b><?= $msg['username'] ?></b></small><br>
                        <small><span class="text-muted"><span class="material-icons">event</span></span> <b><?= date("M d, Y h:i A", strtotime($msg['date_created']))?></b></small>
                    </div>
                </div>
                <div class="col-1 text-center">
                    <?php if($msg['from_user'] == $_settings->userdata('id')): ?>
                    <button class="btn btn-outline-danger border-0 delete-convo btn-sm rounde-0" type="button" data-id="<?= $id ?>"><span class="material-icons">delete</span></button>
                    <?php endif; ?>
                </div>
            </div>
        </fieldset>
        <h3 class="fw-bolder"><?= $subject ?></h3>
        <fieldset class="border px-3 py-4 mb-4">
            <?= html_entity_decode($msg['message']) ?>
        </fieldset>
        <?php 
        $replies = $conn->query("SELECT m.*,CONCAT(u.firstname,' ', COALESCE(u.middlename,''), ' ', u.lastname) as `name`, u.username, u.avatar FROM `message_list` m inner join users u on m.from_user = u.id  where m.conversation_id = '{$id}' and m.id != '{$msg['id']}' order by unix_timestamp(m.date_updated) asc");
        ?>
        <?php if($replies->num_rows > 0): ?>
        <div class="ps-5 mb-3">
            <h3 class="fw-bolder">Replies:</h3>
            <?php
                while($row = $replies->fetch_assoc()):
            ?>
                <fieldset class="border py-3 mb-2">
                    <div class="d-flex align-items-center">
                        <div class="col-1 text-center">
                            <img src="<?= validate_image($row['avatar']) ?>" alt="" class="sender-image rounded-circle border">
                        </div>
                        <div class="col-10">
                            <div class="lh-1">
                                <small><span class="text-muted"><span class="material-icons">person</span></span> <b><?= $row['name'] ?> <?= $row['from_user'] == $_settings->userdata('id') ? "(You)" : "" ?></b></small><br>
                                <small><span class="text-muted"><span class="material-icons">alternate_email</span></span> <b><?= $row['username'] ?></b></small><br>
                                <small><span class="text-muted"><span class="material-icons">event</span></span> <b><?= date("M d, Y h:i A", strtotime($row['date_created']))?></b></small>
                            </div>
                        </div>
                        <div class="col-1 text-center">
                            <?php if($row['from_user'] == $_settings->userdata('id')): ?>
                            <button class="btn btn-outline-danger border-0 delete-msg btn-sm rounde-0" type="button" data-id="<?= $row['id'] ?>"><span class="material-icons">delete</span></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="px-3">
                        <?= html_entity_decode($row['message']) ?>
                    </div>
                </fieldset>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <div>
            <a href="./?page=reply&id=<?= $id ?> ?>" class="btn btn-primary btn-sm rounded-0"><span class="material-icons">reply</span> Reply</a>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('.delete-msg').click(function(){
            if(confirm("Are you sure to delete this reply? This action cannot be undone.") == true){
                start_loader()
                $.ajax({
                    url:"classes/Master.php?f=delete_message",
                    method:"POST",
                    data:{id: $(this).attr('data-id')},
                    dataType:"json",
                    error:err=>{
                        console.log(err)
                        alert("An error occured.",'error');
                        end_loader();
                    },
                    success:function(resp){
                        if(typeof resp== 'object' && resp.status == 'success'){
                            location.reload();
                        }else{
                            alert("An error occured.",'error');
                            end_loader();
                        }
                    }
                })
            }
        })
        $('.delete-convo').click(function(){
            if(confirm("Are you sure to delete this message? This action cannot be undone.") == true){
                start_loader()
                $.ajax({
                    url:"classes/Master.php?f=delete_convo",
                    method:"POST",
                    data:{id: $(this).attr('data-id')},
                    dataType:"json",
                    error:err=>{
                        console.log(err)
                        alert("An error occured.",'error');
                        end_loader();
                    },
                    success:function(resp){
                        if(typeof resp== 'object' && resp.status == 'success'){
                            location.replace('./?page=inbox');
                        }else{
                            alert("An error occured.",'error');
                            end_loader();
                        }
                    }
                })
            }
        })
    })
</script>