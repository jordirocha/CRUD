<?php
require '../../conf.php';
$result = $collection->deleteOne(['id' => (int)$_POST['id']]);

