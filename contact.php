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
    <div>
        <form method="post">
            <div class="w-full max-w-xs mx-auto">
                <h2 class="mb-6 text-center text-3xl font-extrabold text-gray-900">
                    Contact Us
                </h2>
                <div class="space-y-6">
                    <div>
                        <label for="name" class="sr-only">Full Name</label>
                        <input id="name" name="name" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Full Name">
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <textarea id="message" name="message" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Your message"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="send" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"></input>
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