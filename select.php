<?php
require 'conf.php';
$employee = $collection->find(['id' => (int)$_POST['id']])->toArray();
$jobs = $collection->distinct("job_title");
$departments = $collection->distinct("department");
?>
<?php foreach ($employee as $info) : ?>
    <form class="row g-3">
        <div class="col-12">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $info['email'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="John" value="<?php echo $info['first_name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="inputLast" placeholder="Doe" value="<?php echo $info['last_name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="exampleDataList" class="form-label">Job</label>
            <input class="form-control" list="datalistJobs" id="inputJob" placeholder="Type to search..." value="<?php echo $info['job_title'] ?>">
            <datalist id="datalistJobs">
                <?php foreach ($jobs as $job) { ?>
                    <option value="<?php echo $job ?>">
                    <?php } ?>
            </datalist>
        </div>
        <div class="col-md-6">
            <label for="exampleDataList" class="form-label">Department</label>
            <input class="form-control" list="datalistDept" id="inputDept" placeholder="Type to search..." value="<?php echo $info['department'] ?>">
            <datalist id="datalistDept">
                <?php foreach ($departments as $department) { ?>
                    <option value="<?php echo $department ?>">
                    <?php } ?>
            </datalist>
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Image</label>
            <input type="text" class="form-control" id="inputImg" placeholder="Image URL" value="<?php echo $info['avatar_img'] ?>">
        </div>
    </form>
    </div>
<?php endforeach ?>