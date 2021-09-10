<?php
require 'conf.php';
$jobs = $collection->distinct("job_title");
?>

<?php foreach ($jobs as $job) { ?>
    <option value="<?php echo $job ?>">
    <?php } ?>
