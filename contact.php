<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./source/library/jquery/jquery-3.6.0.min.js"></script> 
    <script src="./source/library/bootstrap/bootstrap5.3.2.min.js"></script> 
    <script src="./source/library/fontawesome/fontawesome.js"></script> 
    <link rel="stylesheet" href="./source/library/jquery/jquery-ui-1.13.2.min.css">
    <link rel="stylesheet" href="./source/library/bootstrap/bootstrap3.2.0.min.css"> 
    <link rel="stylesheet" href="./source/library/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style_navBar.css">
    <link rel="stylesheet" href="./css/style_default.css">
    <link rel="stylesheet" href="./css/style_footer.css">
    <link rel="stylesheet" href="./css/style_developers.css">
    <title>Contact - DEEP OCEAN</title>
</head>
<body>
    <header>
        <!-- Navigation -->
        <?php include 'views/navBar.php'; ?>
    </header>
    <br><br><br><br>
    <!-- Contact -->
    <div class="mt-24">     <!-- mx-auto container flex flex-col items-center justify-center h-screen -->
        <form method="post" class="container mx-auto">
            <div class="w-2/4 mx-auto">
                <h2 class="mb-6 text-center text-5xl font-bold text-gray-900">
                    CONTACT US
                </h2>
                <div class="space-y-6">
                    <div>
                        <label for="name" class="sr-only">Full Name</label>
                        <input id="name" name="name" type="text" required class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Full Name">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" required class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email address">
                    </div>
                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <textarea id="message" name="message" required class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Your message"></textarea>
                    </div>
                    <div class="flex flex-row justify-center">
                        <input type="submit" name="send" class="bg-transparent hover:bg-blue-500 text-blue-500 font-bold py-3 px-6 border border-blue-500 rounded focus:outline-none focus:shadow-outline hover:text-white transition duration-300 mr-4"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        include 'sendmail.php';
    }
?>