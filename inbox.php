<section class="py-4">
    <div class="container">
        <h3 class="fw-bolder text-center">Inbox</h3>
        <center>
            <hr class="bg-primary w-25"/>
        </center>
        <div class="list-group rounded-0" id="conversation-list">
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 align-items-center align-items-center">
                    <div class="col-1"></div>
                    <div class="col-2">Username</div>
                    <div class="col-7 text-truncate">Message</div>
                    <div class="col-2">Action</div>
                </div>
            </div>

            <?php 
            $qry = $conn->query("SELECT * FROM `conversation_list` where id in (SELECT conversation_id FROM `message_list` where to_user = '{$_settings->userdata('id')}')  order by unix_timestamp(date_updated) desc");
            while($row = $qry->fetch_assoc()):
                if($row['user_1'] == $_settings->userdata('id')){
                    $username = $conn->query("SELECT * FROM users where id = '{$row['user_2']}' ")->fetch_array()['username'];
                }else{
                    $username = $conn->query("SELECT * FROM users where id = '{$row['user_1']}' ")->fetch_array()['username'];
                }
                $msg = $conn->query("SELECT * FROM `message_list` where to_user = '{$_settings->userdata('id')}' and conversation_id = '{$row['id']}' order by unix_timestamp(date_updated) desc limit 1 ")->fetch_array();
                $msg_root_id = $conn->query("SELECT id FROM `message_list` where to_user = '{$_settings->userdata('id')}' and conversation_id = '{$row['id']}' order by unix_timestamp(date_updated) asc limit 1 ")->fetch_array()['id'];
                $is_read = $msg['status'] == 1 ? true : false;
                $is_reply = $msg_root_id != $msg['id'] ? true : false;
            ?>
            <div class="list-group-item list-group-item-action <?= (!$is_read) ? "bg-gray-200 bg-gradient text-primary" : "" ?>  bg-opacity-25 message-item">
                <div class="d-flex w-100 align-items-center align-items-center">
                    <div class="col-1 text-center"><span class="material-icons"><?= $is_read ? 'mark_email_read' : 'mark_email_unread' ?></span></div>
                    <div class="col-2"><?= $username ?></div>
                    <div class="col-7 text-truncate pe-3"><?= ($is_reply) ? "<b>Re: </b>" : "" ?><?= strip_tags(html_entity_decode($msg['message'])) ?></div>
                    <div class="col-2">
                        <a href="./?page=view_message&id=<?= $row['id'] ?>" class="btn btn-outline-default border p-1 rounded-0 me-1 btn-sm bg-gradient mb-0" title="View Message"><span class="material-icons">visibility</span></a>
                        <?php if(!$is_read): ?>
                        <a href="javascript:void(0)" class="btn btn-outline-default border p-1 rounded-0 me-1 btn-sm bg-gradient mb-0 mark-read-msg" data-id='<?= $msg['id'] ?>' title="Mark as Read"><span class="material-icons">mark_email_read</span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('.mark-read-msg').click(function(){
            if(confirm("Are you sure to mark this message as read? This action cannot be undone.") == true){
                start_loader()
                $.ajax({
                    url:"classes/Master.php?f=mark_read",
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
    })
</script>