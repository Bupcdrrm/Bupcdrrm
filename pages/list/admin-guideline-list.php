<?php
    builtinsuccess();
?>
<div class="row search-result-list">
    <?php
        $guidelines = read_guidelines();
        foreach($guidelines as $guideline) {
            ?>
            <div class="col-md-4">
                <div class="activity-card">
                    <img src="<?php echo $guideline['image_location'] ?>">
                    <div class="activity-card-tools">
                        <a href="admin-edit-guideline.php?id=<?php echo $guideline['id'] ?>" class="activity-card-tool">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="admin-delete-guideline.php?id=<?php echo $guideline['id'] ?>" class="activity-card-tool">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    <div class="activity-card-body">
                        <h1 class="activity-card-body-title"><?php echo $guideline['title'] ?></h1>
                        <p class="activity-card-meta"><?php echo $guideline['date_created'] ?></p>
                        <hr>
                        <p><?php echo $guideline['text'] ?></p>
                        <a href="<?php echo $guideline['guidelines_reference'] ?>"><?php echo $guideline['guidelines_reference'] ?> </a>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
</div>