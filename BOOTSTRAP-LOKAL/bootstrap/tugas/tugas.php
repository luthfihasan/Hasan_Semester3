<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <title>Modul7</title>
  </head>
  <body style="height: 2000px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
          <a class="navbar-brand fw-bold text-uppercase" href="#">hsn</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto fw-bold">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">About Me</a>
              <a class="nav-link" href="#">Contact Me</a>
            </div>
          </div>
        </div>
      </nav>
      
    <div class="container-flui bg-warning pt-4">
      <section id="hero" class="text-center">
        <img src="img/hasan.jpg" alt="profil pic hasan" class="img-thumbnail rounded-circle d-flex m-auto" style="width: 200px;" />
        <h1 class="h1 pt-2">Luthfi Hasan</h1>
        <h2 class="h4 font-monospace">Welcome to My Website</h2>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 310"><path fill="#FEFAE0" fill-opacity="1" d="M0,160L48,160C96,160,192,160,288,176C384,192,480,224,576,202.7C672,181,768,107,864,101.3C960,96,1056,160,1152,176C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>

    <div class="container-fluid" style="background-color: #FEFAE0; padding-bottom: 240px;">
      <section id="about">
        <h3 class="text-center fw-bold">About Me</h3>
        <div class="row justify-content-center text-center fs-5" style="margin-top: 50px;">
          <div class="col-md col-lg col-xl-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam nulla reprehenderit cum a ipsam dignissimos quae dolore sequi soluta nobis.</p>
          </div>
            <div class="col-md col-lg col-xl-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus qui sequi vero voluptates unde hic impedit, esse eos mollitia!</p>
          </div>
        </div>
      </section>
    </div>

    <div class="container-fluid py-5 bg-warning">
      <div class="container">
          <div class="row">
              <div class="col-12 text-center">
                  <h3 class="fw-bold">My Galery</h3>
                  <p>Koleksi Foto Saya</p>
              </div>
          </div>
          <br>

          <div class="row">
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid img">
            </div>
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-2">
                <img src="img/pika.jpg" alt="" class="img-fluid">
            </div>
        </div>

        <div class="row my-3">
            <div class="col-3">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-3">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-2">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-4">
                <img src="img/pika.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

  <div class="container-fluid py-5" style="background-color: #FEFAE0;">
    <div class="container" style="padding-bottom: 130px;">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="fw-bold">My Skill</h3>
            </div>
        </div>
       <p class="fw-bold">Programming</p>
        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-success" style="width: 25%">25%</div>
        </div>
        <br>
        <p class="fw-bold">Writing</p>
        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
        </div>
        <br>
        <p class="fw-bold">Video Editing</p>
        <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-warning text-dark" style="width: 75%">75%</div>
        </div>
        <br>
        <p class="fw-bold">Photoshop</p>
        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-danger" style="width: 100%">100%</div>
        </div>
        </div>
        </div>
      
        <div class="container-fluid py-5 bg-warning">
          <div class="row">
            <div class="col-12 text-center pb-4">
                <h3 class="fw-bold">Contact Us</h3>
            </div>
        </div>
        
          <!-- Action form to "proses.php" -->
    <form action="proses.php" method="POST" class="row g-3">
        <div class="col-md-4">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" value="Luthfi Hasan" required>
        </div>
        <div class="col-md-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="hasan@gmail.com" required>
        </div>
        <div class="col-md-4">
            <label for="subject">Subject</label>
            <select class="form-select" name="subject" required>
                <option selected disabled value="">Pilih Kendala</option>
                <option>Paket Data Belum Masuk, Saldo Terpotong</option>
                <option>Pulsa Belum Masuk, Saldo Terpotong</option>
                <option>Paket Masuk, Tetapi Tidak Dapat Digunakan</option>
                <option>Lainnya</option>
            </select>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="comment" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
        </div>
        <div class="col-12">
            <button class="btn btn-success" type="submit">Kirim</button>
        </div>
    </form>
</div>

      <footer class="bg-primary p-4">
        <p class="text-white text-center"><b>By LuthfiHasan | RPL A 2022 | Politeknik Balekambang Jepara</P></b>
      </footer>
    

   

    <!-- Scroll to Top Button -->
    <a href="#" class="bi bi-arrow-up-square-fill" style="font-size: 2em; position: fixed; bottom: 20px; right: 20px; cursor: pointer;" onclick="scrollToTop()"></a>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Smooth Scroll Script -->
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>
  </body>
</html>
