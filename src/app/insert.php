<?php
require '../../conf.php';
$total_emps = $collection->count(array());
$max_id = $collection->find(array(), array('skip' => $total_emps - 1))->toArray();

$insertData = $collection->insertOne([
    'id' => $max_id[0]['id'] + 1,
    'email' => $_POST['email'],
    'first_name' => $_POST['name'],
    'last_name' => $_POST['surname'],
    'job_title' => $_POST['job'],
    'department' => $_POST['department'],
    'avatar_img' => $_POST['image']
]);

