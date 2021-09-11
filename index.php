<?php
require 'conf.php';
$total_emps = $collection->count(array());
$items = 6;
$paginations = $total_emps / $items;
$paginations = ceil($paginations);
?>

<?php
!$_GET ? header('Location:index.php?page=1') : '';
$_GET['page'] > $paginations ? header('Location:index.php?page=1') : "";
$_GET['page'] <= 0 ? header('Location:index.php?page=' . $paginations) : "";

$start = ($_GET['page'] - 1) * $items;
$employees = $collection->find(array(), array('limit' => $items, 'skip' => $start));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="src/public/img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/68c55511c1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/public/css/index.css">
    <title>CRUD PHP & MongoDB</title>

</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container mb-5">
        <div class="vh-100 d-flex align-items-center">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-1">
                    <div>
                        <p class="fs-4">Employees</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary new" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i> New</button>
                    </div>
                </div>
                <div class="table-border">
                    <table id="table" class="table table-hover table-borderless align-middle shadow-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">JOB</th>
                                <th scope="col">DEPARTMENT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = 1;
                            foreach ($employees as $employee) { ?>
                                <?php $row++; ?>
                                <tr>
                                    <td scope="row" class="fw-bolder idEmp"><?php echo $employee['id'] ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <img src="<?php echo $employee['avatar_img'] ?>" class="rounded-circle shadow" height="65" width="65">
                                            </div>
                                            <div>
                                                <span class="nr"><?php echo $employee['first_name'], ' ', $employee['last_name'] ?></span>
                                                <br><span class="text-dark text-opacity-75"><?php echo $employee['email'] ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $employee['job_title'] ?></td>
                                    <td><?php echo $employee['department'] ?></td>
                                    <td>
                                        <i class="far fa-edit edit me-2" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                        <i class="far fa-trash-alt trash delete" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                    </td>
                                </tr>
                            <?php   } ?>

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <?php echo 'Showing <span class="fw-bolder">', $start + 1, '</span> to <span class="fw-bolder">', $start + $row - 1, '</span>  of ', $total_emps, ' entries' ?>
                    </div>
                    <div>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="index.php?page=<?php echo $_GET['page'] - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <?php for ($i = 0; $i < $paginations; $i++) { ?>
                                <li class="page-item <?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                            <?php } ?>

                            <li class="page-item">
                                <a class="page-link" href="index.php?page=<?php echo $_GET['page'] + 1 ?>">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="content-modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="content-modal-body" class="modal-body">

                </div>
                <div id="content-modal-btn" class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark mt-auto">
        <div class="container-fluid">
            <div class="m-auto">
                <a class="navbar-brand">© 2021 Devoloped by: Jordi Rocha</a>
                <a href="https://github.com/jordirocha/SimpleCrud" target="_blank"><i class="fab fa-github fs-5"></i></a>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="src/public/js/index.js"></script>

</body>

</html>