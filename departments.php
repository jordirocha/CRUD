<?php
require 'conf.php';
$departments = $collection->distinct("department");
?>

<?php foreach ($departments as $department) { ?>
    <option value="<?php echo $department ?>">
    <?php } ?>