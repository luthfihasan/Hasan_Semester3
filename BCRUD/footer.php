<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
    .footer {
        background-color: transparent;
        color: black;
        text-align: center;
        padding: 30px 0;
        bottom: 0;
        width: 100%;
        box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
    }

    .footer p {
        margin-bottom: 0;
    }

    .footer a {
        color: black; /* Warna untuk tautan */
        text-decoration: none; /* Menghilangkan garis bawah default pada tautan */
    }

    .footer a:hover {
        text-decoration: underline;
    }
</style>

<footer class="footer mt-5">
    <div class="container">
        <p>&copy; 2024 <a href="https://github.com/Fadlyzz" target="_blank">Fadlyzz</a></p>
        <p><a href="https://polibang.ac.id" target="_blank"> Politeknik Balekambang Jepara</a></p>
    </div>
</footer>
</body>
</html>
