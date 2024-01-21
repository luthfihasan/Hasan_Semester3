<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HS STORE</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-zicons@1.3.0/font/bootstrap-icons.css">

</head>
<body class="bg-warning">
    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- Body -->
    <div class="container mt-5">
        <h1 class="text-center">SELAMAT DATANG di Mentoring Data Survei HS Store!</h1>
        <p class="text-center">Website Mentoring Survei berbasis CRUD Kecamatan Mlonggo.</p>
        <div class="container">
            <!-- Form untuk mengarahkan ke halaman home.php saat tombol diklik -->
            <form action="view/home.php" method="post">
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success mt-2" value="Let's Do it!">
                </div>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include "footer.php"; ?>

</body>
</html>


