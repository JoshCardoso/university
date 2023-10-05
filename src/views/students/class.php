<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
    <script src="/js/main.js" defer></script>
    <link rel="stylesheet" href="/DataTables/datatables.min.css">
    <link href="/dist/output.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="flex w-full h-screen">
        <div class="bg-blue-950 w-1/6">
            <div class="px-4 flex items-center border-slate-600 border-b h-16">
                <img src="/public/logo.jpg" alt="" class="h-14 p-1 rounded-full" />
                <h2 class="px-5 text-white text-xl">Universidad</h2>
            </div>
            <div class="py-2 flex justify-center border-slate-600 border-b">
                <div class="w-full mx-5">
                    <h2 class="text-white my-3"><?= $_SESSION['user']['apelido'] ?></h2>
                    <h2 class="text-white my-3"><?= $_SESSION['user']['nome'] ?></h2>

                </div>
            </div>
            <div>
                <h1 class="text-gray-400 w-full flex justify-center">
                    Menu Admistration
                </h1>
                <?php
                switch ($_SESSION['user']['id_permissoes']) {
                    case "1": ?>
                        <div class="flex flex-col text-white my-3 mx-4">
                            <a class="flex text-white my-1" href="/src/index.php?rota=adm_P">
                                <span class="mx-2 material-symbols-outlined">
                                    manage_accounts </span>Permission</a>

                            <a class="flex text-white my-1" href="/src/index.php?rota=adm_T">
                                <span class="mx-2 material-symbols-outlined">
                                    <span class="material-symbols-outlined">
                                        interactive_space
                                    </span>
                                </span>
                                Teacher
                            </a>
                            <a class="flex text-white my-1" href="/src/index.php?rota=adm_S">
                                <span class="mx-2 material-symbols-outlined"> school </span>
                                Students
                            </a>
                            <a class="flex text-white my-1" href="/src/index.php?rota=adm_C">
                                <span class="mx-2 material-symbols-outlined"> monitor </span>
                                Class
                            </a>
                        </div>
                    <?php break;
                    case "2": ?>
                        <div class="flex flex-col text-white my-3 mx-4">
                            <a class="flex text-white my-1" href="/src/index.php?rota=tea_S">
                                <span class="mx-2 material-symbols-outlined"> school </span>
                                Students
                            </a>
                        </div>
                    <?php break;
                    case "3": ?>
                        <div class="flex flex-col text-white my-3 mx-4">
                            <a class="flex text-white my-1" href="/src/index.php?rota=stu_Q">
                                <span class="mx-2 material-symbols-outlined">
                                    history_edu
                                </span>
                                Qualification
                            </a>
                            <a class="flex text-white my-1" href="/src/index.php?rota=stu_C">
                                <span class="mx-2 material-symbols-outlined"> school </span>
                                Class
                            </a>
                        </div>
                <?php break;
                } ?>
            </div>
        </div>
        <div class="w-5/6">
            <nav class="h-16 shadow-lg flex items-center justify-between">
                <div class="flex items-center">
                    <span class="material-symbols-outlined"> menu </span>
                    <a class="px-2" href="/src/index.php">Home</a>
                </div>
                <div>
                    <div class="flex items-center cursor-pointer">
                        <h1 id="modal2" class="px-5"><?= $_SESSION['user']['apelido'] ?></h1>
                        <span class="material-symbols-outlined">
                            expand_more
                        </span>
                    </div>
                </div>
            </nav>
            <section>
                <div>
                    <div>
                        <h1 class="flex text-3xl m-4">Lista de Materias</h1>
                    </div>
                    <div class="flex">
                        <div class="border w-[95%] m-4 shadow-xl rounded-xl">
                            <div class="w-full flex items-center justify-between h-14 border-b border-gray-200">
                                <h2 class="mx-5">informações das materias</h2>
                            </div>
                            <div class="border-t p-5">
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Materia</th>
                                            <th>Darse de baja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $students = $_SESSION['aluno_class'];
                                        foreach ($students as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $row['id_class'] ?></td>
                                                <td><?= $row['curso'] ?></td>
                                                <td>
                                                    <span class="material-symbols-outlined text-red-600">
                                                        disabled_by_default
                                                    </span>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class=" border-2 shadow-xl w-[300px] h-[450px] mr-10 mt-4 rounded-xl">
                            <div class="w-full flex items-center justify-between h-14 border-b border-gray-200">
                                <h2 class="mx-5 text-lg font-semibold">Materias disponiveis</h2>
                            </div>
                            <div class="w-full flex items-center justify-between h-14 border-b border-gray-200">
                                <h2 class="mx-5">Escolha suas materias uma a uma</h2>
                            </div>
                            <form action="/src/controllers/Insert_smateriaController.php" method="post">
                                <div  class="max-h-56  overflow-y-auto p-4 bg-gray-100 rounded-md m-5">
                                <div class="space-y-2">
                                    <?php
                                    $class = $_SESSION['aluno_class_d'];
                                    foreach ($class as $row) {
                                    ?>
                                        <div class="flex items-center space-x-2">
                                            <input type="radio" id="<?= $row['curso'] ?>" name="materia" value="<?= $row['id_class'] ?>">
                                            <label for="<?= $row['curso'] ?>"><?= $row['curso'] ?></label><br>
                                        </div>
                                    <?php } ?>
                                </div>
                                </div>
                                <div class="flex justify-end">
                                    <button class="mx-5 my-2 px-2 py-1 border border-blue-600 active:text-blue-600 active:bg-white bg-blue-600 text-white rounded-xl closed ">Inscrever-se</button>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <div id="dropMenu" class="bg-white shadow-xl w-[130px] h-[100px] absolute top-[70px] right-1 rounded-md hidden flex-col items-center justify-evenly">
            <a class="w-full flex justify-center items-center cursor-pointer" href="">
                <span class="material-symbols-outlined mx-2">
                    account_circle
                </span>
                <p>
                    Perfil
                </p>
            </a>
            <a class="border-t w-full flex justify-center items-center py-2 cursor-pointer" href="/src/index.php?rota=logout">
                <span class="material-symbols-outlined mx-2 text-red-600">
                    logout
                </span>
                <p class="text-red-600">
                    Logout
                </p>
            </a>
        </div>
    </div>
    </div>
    <script src="/DataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pageLength": 7,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>