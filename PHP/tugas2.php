<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <h2>PHP Form Validation Example</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="name">Name : </label>
        <input type="text" name="name" required>
        <span class="error">* Name is required</span>
        <br><br>

        <label for="email">E-mail : </label>
        <input type="email" name="email" required>
        <span class="error">* Email is required</span>
        <br><br>

        <label for="website">Website :</label>
        <input type="text" name="website">
        <br><br>

        <label for="comment">Comment :</label>
        <textarea name="comment" rows="4" cols="50"></textarea>
        <br><br>

        <label>Gender :</label>
        <input type="radio" name="gender" value="female" required> Female
        <input type="radio" name="gender" value="male" required> Male
        <span class="error">* Gender is required</span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi input
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);

        // Sekarang, Anda dapat melakukan sesuatu dengan data ini, seperti menyimpan ke database atau menampilkan
        // di sini, kita hanya mencetaknya untuk demonstrasi
        echo "<h2>Tampilan Data :</h2>";
        echo "<p>Name : $name <br></p>";
        echo "<p>E-mail : $email <br></p>";
        echo "<p>Website : $website <br></p>";
        echo "<p>Comment : $comment <br></p>";
        echo "<p>Gender : $gender <br></P>";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</body>
</html>
