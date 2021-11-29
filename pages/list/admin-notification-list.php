<div class="row">
    <?php
        GLOBAL $select_gender;
        GLOBAL $select_sexual_orientation;
        GLOBAL $select_message_status;
        $messages = sql_result_to_array('SELECT * FROM messages ORDER BY id DESC LIMIT 500000');
        foreach($messages as $message) {    
            $user = read_user($message['user_id']);
            ?>
            <div class="col-md-12">
                <div class="respondent-card">
                    <a type="button" href="admin-delete-notification.php?id=<?php echo $message['id'] ?>" class="respondent-card-view feedback-view-btn"><i class="far fa-trash"></i></a>
                    <img src="<?php echo $user['image_location'] ?>">
                    <div class="respondent-card-info">
                        <p class="respondent-card-name"><?php echo $user['full_name'] ?><span class="respondent-card-gender"><?php echo $select_gender[$user['gender']] ?></span><span class="respondent-card-orientation"><?php echo $select_sexual_orientation[$user['sexual_orientation']] ?></span><span class="message-status"><?php echo $select_message_status[$message['is_new']] ?></span></p>
                        <p><?php echo $user['email_address'] ?></p>
                        <p><?php echo $user['phone_number'] ?></p>
                        <div class="respondent-message">
                            <p class="date-sent"><i class="fad fa-calendar-alt mr-1"></i><?php echo $message['date_sent'] ?></p>
                            <p class="user-message"><?php echo $message['user_message'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>