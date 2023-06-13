<?php
include "db_conn.php";

$result = mysqli_query($conn, "SELECT * FROM film");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.20/dist/full.css" rel="stylesheet" type="text/css" >
</head>
<body>
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
              <?php 
                $id=$row["id_film"];
              ?>
              <th>
                <a href="erase.php?kode=<?php echo $id ?>" ><button> Delete </button></a>
              </th>
              <th>
              <a href="update.php?kode=<?php echo$id?>"><button> Update </button></a>
              </th>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
        <?php
        if(isset($_GET['kode'])){
            $oid=$_GET['kode'];
            $del = mysqli_query($conn, "DELETE FROM film WHERE id_film='$oid' ");

            if ($del){
                echo "Data $oid has Deleted";
                echo "<meta http-equiv=refresh content=2;URL='erase.php'>";
            }
        }
        ?>
      </div>
      
</body>
<footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
  <div>
    <p>Copyright © 2023 - All right reserved by Naruka Chisaki</p>
  </div>
</footer>
</html>