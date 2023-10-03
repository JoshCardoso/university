<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/dist/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
  <script src="/js/main.js" defer></script>
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
                  manage_accounts </span>permission</a>

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
      <nav class="h-16 shadow-2xl flex items-center justify-between">
        <div class="flex items-center">
          <span class="material-symbols-outlined"> menu </span>
          <a class="px-2" href="/src/index.php">Home</a>
        </div>
        <div class="flex items-center cursor-pointer">
          <h1 id="modal2" class="px-5">Perfil</h1>
          <span class="material-symbols-outlined">
            expand_more
          </span>
        </div>
      </nav>
      <section>
        <div>
          <div>
            <h1 class="flex text-3xl m-4">Dashboard</h1>
          </div>
          <div class="w-[95%] mx-4 p-5 rounded-xl shadow-xl">
            <h1 class="text-xl my-4">Welcome</h1>
            <p>
              Select the action you want to perform in the tabs on the left
            </p>
          </div>
        </div>
      </section>
    </div>
  </div>
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
  <div id="dropMenu" class="bg-white shadow-xl w-[130px] h-[100px] absolute top-[70px] right-1 rounded-md hidden flex-col items-center justify-evenly">
    <a class="w-full flex justify-center items-center cursor-pointer" href="/src/index.php?rota=perfil">
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
</body>

</html>