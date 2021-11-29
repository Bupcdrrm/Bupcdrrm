<?php
    GLOBAL $event;
    GLOBAL $select_gender;
    GLOBAL $select_sexual_orientation;
    GLOBAL $select_user_type;
    GLOBAL $select_course;
    GLOBAL $select_year_block;
    GLOBAL $select_bupc_faculty;
    $feedbacks = sql_result_to_array('SELECT * FROM feedbacks WHERE event_id = "'.$event['id'].'"');
?>
<div class="row">
    <div class="col-md-6">
        <div class="image-upload-wrapper">
            <img src="<?php echo $event['image_location'] ?>" class="uploaded-image" style="width: 100%; height: 420px">
        </div>
        <br>
        <h1 class="mb-4">Respondents - (<?php echo count($feedbacks) ?> / <?php echo sql_count_rows('SELECT * FROM users') ?>)</h1>
        <?php
            GLOBAL $select_user;
            GLOBAL $select_rate;
            $feedbackView = array('name' => '', 'rate' => '', 'problems' => '', 'suggestions' => '');
            $gender = array('male' => 0, 'female' => 0, 'transgendered' => 0, 'genderqueer' => 0,  'non_confirming' => 0, 'different_identity' => 0, 'not_to_say' => 0);
            $rate = array('good' => 0, 'average' => 0, 'bad' => 0);
            foreach($feedbacks as  $feedback) {
                $user = read_user($feedback['user_id']);
                $feedbackView['name'] = $user['full_name'];
                $feedbackView['rate'] = $select_rate[$feedback['rate']];
                $feedbackView['problems'] = $feedback['encounter_problems'];
                $feedbackView['suggestions'] = $feedback['suggestions'];
                populateGenderArray($gender, $user);
                populateRateArray($rate, $feedback);
                ?>
                <div class="respondent-card">
                    <a type="button" href="#feedbackViewModal" data-toggle="modal" data="<?php echo htmlentities(json_encode($feedbackView)) ?>" class="respondent-card-view feedback-view-btn"><i class="far fa-eye"></i></a>
                    <img src="<?php echo $user['image_location'] ?>">
                    <div class="respondent-card-info">
                        <p class="respondent-card-name"><?php echo $user['full_name'] ?><span class="respondent-card-gender"><?php echo $select_gender[$user['gender']] ?></span><span class="respondent-card-orientation"><?php echo $select_sexual_orientation[$user['sexual_orientation']] ?></span></p>
                        <p><?php echo $user['email_address'] ?></p>
                        <p><?php echo $user['phone_number'] ?></p>
                        <p><?php echo $select_user_type[$user['user_type']] ?></p>
                        <p><?php echo $select_course[$user['course']] ?></p>
                        <p><?php echo $select_year_block[$user['year_block']] ?></p>
                        <p><?php echo $select_bupc_faculty[$user['bupc_faculty']] ?></p>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" data-max="<?php echo count($feedbacks) ?>" data="<?php echo htmlentities(json_encode($gender)) ?>"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <canvas id="myChart2" data-max="<?php echo count($feedbacks) ?>" data="<?php echo htmlentities(json_encode($rate)) ?>"></canvas>
            </div>
        </div>
    </div>
</div>