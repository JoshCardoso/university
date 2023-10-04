<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
    <script src="/js/main.js" defer></script>
    <link rel="stylesheet" href="/DataTables/datatables.min.css">
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
                        <h1 id="modal2" class="px-5">Perfil</h1>
                        <span class="material-symbols-outlined">
                            expand_more
                        </span>
                    </div>
                    <div id="modal" class="absolute bg-black bg-opacity-50 top-0 left-0 right-0 bottom-0 hidden justify-center">
                        <div class="bg-white w-[450px] h-[550px] flex flex-col m-5 rounded-xl">
                            <div class="flex m-4 justify-between">
                                <h1 class="text-3xl">Agregar Maestro</h1>
                                <span class="material-symbols-outlined close cursor-pointer"> close </span>
                            </div>
                            <form action="">
                                <div class="border-y border-gray-200 px-4 py-5">
                                    <div class="flex flex-col">
                                        <label class="font-semibold py-2" for="email">Email</label>
                                        <input class="h-7 border border-gray-300 rounded-lg px-3" type="email" name="email" id="email" placeholder="Email" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-semibold py-2" for="name">Name</label>
                                        <input class="h-7 border border-gray-300 rounded-lg px-3" type="text" name="name" id="name" placeholder="Name" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-semibold py-2" for="apelido">Apelido</label>
                                        <input class="h-7 border border-gray-300 rounded-lg px-3" type="text" name="apelido" id="apelido" placeholder="Apelido" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-semibold py-2" for="endereco">Endereço</label>
                                        <input class="h-7 border border-gray-300 rounded-lg px-3" type="text" name="endereco" id="endereco" placeholder="Endereço" />
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="font-semibold py-2" for="data">Data de nascimento</label>
                                        <input class="h-7 border border-gray-300 rounded-lg px-3" type="date" name="data" id="data" placeholder="Data de nascimento" />
                                    </div>
                                    <div class="flex items-center">
                                        <label class="font-semibold py-2" for="classe">Classes</label>
                                        <select name="classe" id="classe" class="border border-gray-300 mx-2 text-sm h-6">
                                            <option value="">Psicologia</option>
                                            <option value="">Advocacia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-[60px] flex justify-end items-center px-4">
                                    <div class="flex justify-end px-4 py-1 border border-gray-600 active:text-gray-600 active:bg-white text-white bg-gray-600 rounded-lg cursor-pointer mx-2 close">
                                        <p>Close</p>
                                    </div>
                                    <button type="submit" class="px-4 py-1 border border-blue-600 bg-blue-600 text-white rounded-lg active:bg-white active:text-blue-600">Criar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <section>
                <div>
                    <div>
                        <h1 class="flex text-3xl m-4">Lista de Professores</h1>
                    </div>
                    <div class="w-[95%] m-4 shadow-xl rounded-xl">
                        <div class="w-full flex items-center justify-between h-14 border-b border-gray-200">
                            <h2 class="mx-5">Informações dos Professores</h2>
                            <button class="mx-5 px-2 py-1 border border-blue-600 active:text-blue-600 active:bg-white bg-blue-600 text-white rounded-xl close">
                                Agregar Professor
                            </button>
                        </div>
                        <div class="border-t p-5">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email/Usuario</th>
                                        <th>Permição</th>
                                        <th>Estado</th>
                                        <th>ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $users = $_SESSION['user2'];
                                    foreach ($users as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id_usuario'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['tipo'] ?></td>
                                            <td class="bg-green-600 text-center text-white"><?= $row['status_user'] ?></td>
                                            <td class="text-center">
                                                <span class="material-symbols-outlined cursor-pointer close">
                                                    edit_note
                                                </span>

                                            </td>
                                        </tr>
                                        <div id="modal" class="absolute bg-black bg-opacity-50 top-0 left-0 right-0 bottom-0 hidden justify-center">
                                            <div class="bg-white w-[450px] h-[550px] flex flex-col m-5 rounded-xl ">
                                                <div class="flex m-4 justify-between">
                                                    <h1 class="text-3xl">Edit Permission</h1>
                                                    <span class="material-symbols-outlined close cursor-pointer"> close </span>
                                                </div>
                                                <form action="" method="post">
                                                    <div class="border-y border-gray-200 px-4 py-5">
                                                        <div class="flex flex-col">
                                                            <label class="font-semibold py-2" for="email">Email</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3" type="email" name="email" id="email" placeholder="Email" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <label class="font-semibold py-2" for="classe">Classes</label>
                                                            <select name="classe" id="classe" class="border border-gray-300 mx-2 text-sm h-6">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Teacher</option>
                                                                <option value="3">Student</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="h-[60px] flex justify-end items-center px-4">
                                                        <div class="flex justify-end px-4 py-1 border border-gray-600 active:text-gray-600 active:bg-white text-white bg-gray-600 rounded-lg cursor-pointer mx-2 close">
                                                            <p>Close</p>
                                                        </div>
                                                        <button type="submit" class="px-4 py-1 border border-blue-600 bg-blue-600 text-white rounded-lg active:bg-white active:text-blue-600">Guardar Mudanças</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
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