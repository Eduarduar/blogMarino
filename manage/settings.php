<?php

    session_start();

    if (!isset($_SESSION['idUser'])) {
    header('Location: ../');
    }

    include '../db/peticiones/manage.php';

    $contacto = new Contacto();

    $UserName = $contacto->getUserName($_SESSION['idUser']);
    $datos = $contacto->getInfoUser($_SESSION['idUser']);

    if ($datos == false) {
        header('Location: ../logout.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_SideBar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css">
    <link rel="stylesheet" href="../css/style_fonts.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manage - DEEP OCEAN</title>
</head>
<body>

    <?php include '../views/menu_manage.php'; ?>

    <div id="messageContainer" class="absolute top-12 left-1/2 transform -translate-x-1/2 -translate-y-[300%] bg-green-500 bg-opacity-90 box-border shadow-lg rounded-lg transition-all duration-500 z-3 px-5 py-2 messageContainer">
        <p id="message" class="text-white text-center text-xl">‎ </p>
    </div>

    

    <div class="container mx-auto">

        <h1 class="text-3xl font-bold text-center my-5">My Info</h1>

        <form class="max-w-md mx-auto mt-8">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input value="<?php echo $datos['name']; ?>" type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                <input value="<?php echo $datos['lastName']; ?>" type="text" id="lastName" name="lastName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="userName" class="block text-gray-700 text-sm font-bold mb-2">User Name:</label>
                <input value="<?php echo $datos['userName']; ?>" type="text" id="userName" name="userName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input value="<?php echo $datos['email']; ?>" type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-end">
                <button id="showFormPassword" class="bg-transparent hover:bg-blue-500 text-blue-500 font-bold py-2 px-4 border border-blue-500 rounded focus:outline-none focus:shadow-outline hover:text-white transition duration-300 mr-2" type="button">
                    Change Password
                </button>
                <button id="submit" class="bg-transparent hover:bg-green-500 text-green-500 font-bold py-2 px-4 border border-green-500 rounded focus:outline-none focus:shadow-outline hover:text-white transition duration-300" type="button">
                    Submit
                </button>
            </div>
        </form>

    </div>

    <!-- Modal -->
    <div id="changePasswordModal" class="absolute top-12 left-1/2 transform -translate-x-1/2 -translate-y-[300%] shadow-lg rounded-lg transition-all duration-500 z-3 max-w-[448px] w-[100%] modalContainerFormPassword">
        <div class="bg-white rounded-lg p-6 animate-slide-up">
            <h2 class="text-2xl font-bold mb-4">Change Password</h2>
            <form>
                <div class="mb-4">
                    <label for="newPassword" class="block text-gray-700 text-sm font-bold mb-2">New Password:</label>
                    <div class="relative">
                        <input type="password" id="newPassword" name="newPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button data-togglePass="true" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-500 focus:outline-none" type="button">
                            <i class="ri-lock-password-line text-green-500 text-lg transition duration-300 mr-2"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="confirmPassword" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                    <div class="relative">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button data-togglePass="true" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-500 focus:outline-none" type="button">
                            <i class="ri-lock-password-line text-green-500 text-lg transition duration-300 mr-2"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="currentPassword" class="block text-gray-700 text-sm font-bold mb-2">Current Password:</label>
                    <div class="relative">
                        <input type="password" id="currentPassword" name="currentPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button data-togglePass="true" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-500 focus:outline-none" type="button">
                            <i class="ri-lock-password-line text-green-500 text-lg transition duration-300 mr-2"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button id="hideFormPassword" class="bg-transparent hover:bg-red-500 text-red-500 font-bold py-2 px-4 border border-red-500 rounded focus:outline-none focus:shadow-outline hover:text-white transition duration-300 mr-2" type="button">
                        Cancel
                    </button>
                    <button class="bg-transparent hover:bg-green-500 text-green-500 font-bold py-2 px-4 border border-green-500 rounded focus:outline-none focus:shadow-outline hover:text-white transition duration-300" type="button">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include '../views/footer_manage.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/settings.js"></script>
</body>
</html>