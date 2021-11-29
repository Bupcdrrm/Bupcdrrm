<?php
    builtinsuccess();
?>
<div class="row search-result-list">
    <?php
        $announcements = read_weather_announcements();
        foreach($announcements as $announcement) {
            ?>
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="<?php echo $announcement['image_location'] ?>">
                    <div class="activity-card-tools">
                        <a href="admin-edit-weather-announcement.php?id=<?php echo $announcement['id'] ?>" class="activity-card-tool">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="admin-delete-weather.php?id=<?php echo $announcement['id'] ?>" class="activity-card-tool">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    <div class="activity-card-body">
                        <h1 class="activity-card-body-title"><?php echo $announcement['title'] ?></h1>
                        <p class="activity-card-meta"><?php echo $announcement['date_created'] ?></p>
                        <hr>
                        <p><?php echo $announcement['text'] ?></p>
                        <a href="<?php echo $announcement['reference'] ?>"><?php echo $announcement['reference'] ?> </a>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>