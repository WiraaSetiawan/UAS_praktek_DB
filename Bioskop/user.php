<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

?>

<?php
include "db_conn.php";

$result = mysqli_query($conn, "SELECT * FROM film");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="user.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.20/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<header>
  <div class="navbar bg-base-100">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a>Homepage</a></li>
          <li><a>Portfolio</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-end">
      <a class="btn btn-ghost normal-case text-xl">NEKOPOI</a>
    </div>
  </div>
</header>
<body>
<div class="carousel-container">
  <div class="carousel w-full" style="max-width: 1000px;">
    <div id="slide1" class="carousel-item relative w-full" style="height: 480px;">
      <img src="image/AK 1.jpg" class="w-full h-full object-cover" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide4" class="btn btn-circle" onclick="changeSlide(-1)">❮</a> 
        <a href="#slide2" class="btn btn-circle" onclick="changeSlide(1)">❯</a>
      </div>
    </div> 
    <div id="slide2" class="carousel-item relative w-full" style="height: 480px;">
      <img src="image/AK 2.jpg" class="w-full h-full object-cover" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide1" class="btn btn-circle" onclick="changeSlide(-1)">❮</a> 
        <a href="#slide3" class="btn btn-circle" onclick="changeSlide(1)">❯</a>
      </div>
    </div> 
    <div id="slide3" class="carousel-item relative w-full" style="height: 480px;">
      <img src="image/AK 3.jpg" class="w-full h-full object-cover" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide2" class="btn btn-circle" onclick="changeSlide(-1)">❮</a> 
        <a href="#slide4" class="btn btn-circle" onclick="changeSlide(1)">❯</a>
      </div>
    </div> 
    <div id="slide4" class="carousel-item relative w-full" style="height: 480px;">
      <img src="image/AK 4.jpg" class="w-full h-full object-cover" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide3" class="btn btn-circle" onclick="changeSlide(-1)">❮</a> 
        <a href="#slide1" class="btn btn-circle" onclick="changeSlide(1)">❯</a>
      </div>
    </div>
  </div>
</div>

<script>
  let currentSlide = 1;
  const slides = document.querySelectorAll('.carousel-item');

  setInterval(() => {
    changeSlide(1);
  }, 5000);

  function changeSlide(n) {
    showSlide(currentSlide += n);
  }

  function showSlide(slideIndex) {
    if (slideIndex < 1) {
      slideIndex = slides.length;
    } else if (slideIndex > slides.length) {
      slideIndex = 1;
    }

    currentSlide = slideIndex;

    slides.forEach((slide) => {
      slide.style.display = 'none';
    });

    slides[currentSlide - 1].style.display = 'block';
  }
</script>

<div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php while( $row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td>
          <div class="flex items-center space-x-3">
            <div class="avatar">
              <div class="mask mask-squircle w-16 h-16">
                <img src="<?= $row["poster"]; ?>" alt="Avatar Tailwind CSS Component" />
              </div>
            </div>
            <div>
              <div class="font-bold"><?= $row["nama_film"]; ?></div>
            </div>
          </div>
        </td>
        <td><?= $row["sinopsis"]; ?></td>
        <td><?= $row["id_genre"]; ?></td>
        <th>
          <button class="btn btn-ghost btn-xs">details</button>
        </th>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
<footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">About us</a> 
    <a class="link link-hover">Contact</a> 
    <a class="link link-hover">Jobs</a> 
    <a href="logout.php" class="link link-hover">Logout</a>
  </div> 
  <div>
    <div class="grid grid-flow-col gap-4">
      <a href="https://www.youtube.com/@phantamia"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </div>
  </div> 
  <div>
    <p>Copyright © 2023 - All right reserved by Naruka Chisaki</p>
  </div>
</footer>
</html>

<?php
}else{
    header("Location: index.php");
    exit();
}
?>