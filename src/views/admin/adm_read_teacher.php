<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
    <script src="/js/main.js" defer></script>
    <link rel="stylesheet" href="/DataTables/datatables.min.css">
    <link href="/dist/output.css" rel="stylesheet" />
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

                </div>
            </nav>
            <section>
                <div>
                    <div>
                        <h1 class="flex text-3xl m-4">Lista de Teacher</h1>
                    </div>
                    <div class="w-[95%] m-4 shadow-xl rounded-xl">
                        <div class="w-full flex items-center justify-between h-14 border-b border-gray-200">
                            <h2 class="mx-5">Informações das classes</h2>
                            <button class="mx-5 px-2 py-1 border border-blue-600 active:text-blue-600 active:bg-white bg-blue-600 text-white rounded-xl closed">
                                Add Teacher
                            </button>
                        </div>
                        <div class="border-t p-5">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                        <th>Data de Nascimento</th>
                                        <th>Classe Asignada</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $teachers = $_SESSION['teachers'];
                                    foreach ($teachers as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id_usuario'] ?></td>
                                            <td><?= $row['nome'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['endereco'] ?></td>
                                            <td><?= $row['nascimento'] ?></td>
                                            <td><?= $row['curso'] ?></td>
                                            <td class="text-center">
                                                <span class="material-symbols-outlined cursor-pointer closep">
                                                    edit_note
                                                </span>
                                            </td>
                                        </tr>
                                        <div class="absolute bg-black bg-opacity-50 top-0 left-0 right-0 bottom-0 hidden justify-center z-50 modals">
                                            <div class="bg-white w-[450px] h-[620px] flex flex-col m-5 rounded-xl ">
                                                <div class="flex m-4 justify-between">
                                                    <h1 class="text-3xl">Edit Teacher</h1>
                                                    <span class="material-symbols-outlined closex cursor-pointer"> close </span>
                                                </div>
                                                <form action="/src/controllers/EditTeacherController.php" method="post">
                                                    <div class="border-y border-gray-200 px-4 py-5">
                                                        <div class="flex flex-col">
                                                            <input type="text" name="id" value="<?= $row['id_usuario'] ?>" hidden />
                                                            <label class="font-semibold py-2" for="nome">Name</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="nome" id="nome" value="<?= $row['nome'] ?>" />

                                                            <label class="font-semibold py-2" for="ape">Apelido</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="ape" id="ape" placeholder="Materia" value="<?= $row['apelido'] ?>" />

                                                            <label class="font-semibold py-2" for="email">Email</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="email" id="email" value="<?= $row['email'] ?>" />

                                                            <label class="font-semibold py-2" for="end">Endereço</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="end" id="end" value="<?= $row['endereco'] ?>" />

                                                            <label class="font-semibold py-2" for="niver">Data de Nascimento</label>
                                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="date" name="niver" id="niver" value="<?= $row['nascimento'] ?>" />

                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label class="font-semibold py-2" for="permissao">Class</label>
                                                            <select name="id_class" id="permissao" class="h-9 border border-gray-300 rounded-lg ">
                                                                <option value="<?= $row['curso'] ?>"><?= $row['curso'] ?></option>
                                                                <option value=""></option>
                                                                <?php
                                                                $class = $_SESSION['class'];
                                                                foreach ($class as $row) {
                                                                ?>
                                                                    <option value="<?= $row['curso_id'] ?>"><?= $row['curso'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="h-[60px] flex justify-end items-center px-4">
                                                        <div class="flex justify-end px-4 py-1 border border-gray-600 active:text-gray-600 active:bg-white text-white bg-gray-600 rounded-lg cursor-pointer mx-2 closeb">
                                                            <p>Close</p>
                                                        </div>
                                                        <button type="submit" class="px-4 py-1 border border-blue-600 bg-blue-600 text-white rounded-lg active:bg-white active:text-blue-600">Edit Teacher</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="absolute bg-black bg-opacity-50 top-0 left-0 right-0 bottom-0 hidden justify-center z-50 modalAdd">
                            <div class="bg-white w-[450px] h-[720px] flex flex-col m-5 rounded-xl ">
                                <div class="flex m-4 justify-between">
                                    <h1 class="text-3xl">Add Teacher</h1>
                                    <span class="material-symbols-outlined closed cursor-pointer"> close </span>
                                </div>
                                <form action="/src/controllers/AddTeacherController.php" method="post">
                                    <div class="border-y border-gray-200 px-4 py-5">
                                        <div class="flex flex-col">

                                            <label class="font-semibold py-2" for="nome">Name</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="nome" id="nome" value="" placeholder="nome" />

                                            <label class="font-semibold py-2" for="ape">Apelido</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="ape" id="ape" placeholder="apelido" value="" />

                                            <label class="font-semibold py-2" for="email">Email</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="email" id="email" value="" placeholder="Email@" />

                                            <label class="font-semibold py-2" for="end">Endereço</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="end" id="end" value="" placeholder="endereço" />

                                            <label class="font-semibold py-2" for="niver">Data de Nascimento</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="date" name="niver" id="niver" value="" />

                                            <label class="font-semibold py-2" for="psswd">Password</label>
                                            <input class="h-7 border border-gray-300 rounded-lg px-3 py-4" type="text" name="psswd" id="psswd" value="" placeholder="Password" />
                                        </div>
                                        <div class="flex flex-col">
                                            <label class="font-semibold py-2" for="permissao">Class</label>
                                            <select name="id_class" id="permissao" class="h-9 border border-gray-300 rounded-lg ">
                                                <option value=""></option>
                                                <?php
                                                $class = $_SESSION['class'];
                                                foreach ($class as $row) {
                                                ?>
                                                    <option value="<?= $row['id_class'] ?>"><?= $row['curso'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="h-[60px] flex justify-end items-center px-4">
                                        <div class="flex justify-end px-4 py-1 border border-gray-600 active:text-gray-600 active:bg-white text-white bg-gray-600 rounded-lg cursor-pointer mx-2 closed">
                                            <p>Close</p>
                                        </div>
                                        <button type="submit" class="px-4 py-1 border border-blue-600 bg-blue-600 text-white rounded-lg active:bg-white active:text-blue-600">Add Teacher</button>
                                    </div>
                                </form>
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