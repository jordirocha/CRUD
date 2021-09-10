<?php
require 'conf.php';
// $collection->deleteOne(['id' => $_POST['id']]);
// header('Location:index.php?page=1');
$result = $collection->deleteOne(['id' => (int)$_POST['id']]);
// echo $_POST['id'];
