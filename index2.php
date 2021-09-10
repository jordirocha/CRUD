<?php
require_once 'config.php';
$total =  $collection->count(array());
$items = 7;
$paginas = $total / $items;
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="2559486.png" type="image/x-icon">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    <title>Crud PHP & MongoDB</title>
    <style>
        body {
            font-family: 'Fira Sans', sans-serif;
        }
    </style>
</head>
<?php

!$_GET ? header('Location:index.php?pagina=1') : '';
$_GET['pagina'] > round($paginas) ? header('Location:index.php?pagina=1') : "";
$_GET['pagina'] <= 0 ? header('Location:index.php?pagina=' . round($paginas)) : "";

$iniciar = ($_GET['pagina'] - 1) * $items;
$query_employees = $collection->find(array(), array('limit' => $items, 'skip' => $iniciar));
?>

<body id="body">

    <div class="container mx-auto">
        <div class="flex flex-col">
            <h1 class="mx-auto uppercase text-4xl">crud php & mongodb</h1>

            <div class="flex justify-start">
                <button class="bg-blue-500  hover:bg-blue-400 text-white border border-blue-700 rounded flex items-center py-2 px-4">
                    <svg class="group-hover:text-light-blue-600 text-light-blue-500 mr-2" width="12" height="20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z" />
                    </svg>
                    New
                </button>
            </div>

            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Job
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Department
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                foreach ($query_employees as $emp) {
                                    echo  '<tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-bold text-sm text-gray-500">
                                       ', $emp['id'], '
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="', $emp['avatar_img'], '"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                ',
                                    $emp['first_name'], '&nbsp;', $emp['last_name'],
                                    '
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    ', $emp['email'], '
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">', $emp['job_title'], '</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">', $emp['department'], '</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex">
                                    <div
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer	">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="edit w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" id="', $emp['id'], '" onclick="infoemp(this.id);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div
                                        class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                                </tr>';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="flex items-center space-x-1 my-2">
                    <a href="index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>

                    </a>

                    <?php for ($i = 0; $i < $paginas; $i++) : ?>
                        <a href="index.php?pagina=<?php echo $i + 1 ?>" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
                            <?php echo $i + 1 ?>
                        </a>
                    <?php endfor ?>
                    <a href="index.php?pagina=<?php echo $_GET['pagina'] + 1  ?>" class="px-4 py-2 text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="mod"></div> -->


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function infoemp(id) {
            var mydata = 55;
            var myname = "syed ali";
            var userdata = {
                'id': id,
                'name': myname
            };
            $.ajax({
                type: "POST",
                url: "employee.php",
                data: userdata,
                success: function(data) {
                   // document.getElementById('body').innerHTML += data;
                    console.log(data)
                }
            });
            const modal = document.getElementById('modal');
            const closebutton = document.getElementById('closebutton');
            modal.classList.add('scale-100');
            closebutton.addEventListener('click', () => alert(22));
        }
    </script>
    <script src="text/javascript">
        function cerrarModal() {
            const modal = document.getElementById('modal');
            closebutton.addEventListener('click', () => modal.classList.remove('scale-100'));
        }
        // const modal = document.getElementById('modal');

        // modal.addEventListener('onclick', () => {
        //     alert("clicado");
        // })
    </script>
</body>

</html>