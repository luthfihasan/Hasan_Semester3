<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Header -->
    <?php include "header.php" ?>
    
    <!-- Body -->
    <div class="container mt-5">
        <h1 class="text-center">SELAMAT DATANG di Mentoring PHP CRUD Application!</h1>
        <p class="text-center">Ayo kita Membuat CRUD (Create, Read, Update, Delete) Application.</p>
        <div class="container">
            <form action="view/home.php" method="post">
                <div class="from-group text-center">
                    <input type="submit" class="btn btn-primary mt-2" value="Let's Do it!">
                </div>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include "footer.php" ?>
</body>
</html>
