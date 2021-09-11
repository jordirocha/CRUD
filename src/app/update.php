<?php
require '../../conf.php';
$collection->updateOne(['id' => (int)$_POST['id']], [
    '$set' =>

    [
        'email' => $_POST['email'],
        'first_name' => $_POST['name'],
        'last_name' => $_POST['surname'],
        'job_title' => $_POST['job'],
        'department' => $_POST['department'],
        'avatar_img' => $_POST['image']
    ]

]);
