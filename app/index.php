<?php 
require "template/homepart.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to the <?= $hotelname?></title>
    <link href="" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>

  <body data-bs-theme="dark">
    <!-- Navbar -->
    <?php 
      require "./template/navlogic.php";
    ?>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section id="home" class="text-center vh-100" style="background-image: url('<?= $hotelimg?>'); background-size:cover; background-repeat: no-repeat;">
      <div class="px-2 pt-2 w-100 y-100 h-100 d-flex" style="background: rgb(32,32,39); background: linear-gradient(90deg, rgba(32,32,39,0.3) 0%, rgba(53,53,78, 0.3) 28%, rgba(94,94,108, 0.3) 70%, rgba(111,106,106, 0.3) 100%); backdrop-filter: blur(5px);">
        <div class="px-2 pt-2 pt-sm-3 m-auto" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">
          <div>
            <h1 class="display-4" style="font-family: 'Staatliches';">Welcome to the<br><span class="display-1" style="color:#22092C;"><?= $hotelname?></span></h1>
            <p class="fs-5 mt-2 mx-auto w-75" style="font-family: 'Poppins';"><?= $info?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Hotel News -->
    <section id="news" class="h-100" style="min-height: 80vh;">
      <div class="album py-2 pb-3 h-100 bg-dark"">
      
        <div class="mt-2 mb-4 pt-1 px-3 text-center">
          <h1 class="display-2 fw-bold " style="font-family: 'Staatliches'; color:#4CB9E7">News</h1>
        </div>

        <div class="container mt-3 h-100">
            <div class="row row-cols-1 row-cols-md-3 g-3">

              <div class="col">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-sm">
                  <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
    </section>
    

    <!-- Footer -->
    <?php 
      include "./template/footer.php"
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>