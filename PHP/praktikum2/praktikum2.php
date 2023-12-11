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
    
    <form action="proses.php" method="post">
        <label for="name">Name: *</label>
        <input type="text" name="name" required>
        <br><br>

        <label for="email">E-mail: *</label>
        <input type="email" name="email" required>
        <br><br>

        <label for="website">Website:</label>
        <input type="text" name="website">
        <br><br>

        <label for="comment">Comment:</label>
        <textarea name="comment" rows="4" cols="50"></textarea>
        <br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="male"> Male
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
