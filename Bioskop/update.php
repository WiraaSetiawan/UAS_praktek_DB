<?php
    include "db_conn.php";

    $sql=mysqli_query($conn, "select * from film where id_film='$_GET[kode]'");
    $data=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen" style="background-image: url(Arknights.jpg); background-size: cover; position: absolute; width: 100%; height: 100%">
        <div class="rounded-lg px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <form action="" method="post">
                <div class="mt-4">
                    <div>
                        <label class="block">Poster<label>
                                <input type="text" name="gambar" placeholder="Masukan link gambar" value="<?php echo $data['poster']; ?>" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <label class="block">Nama Film<label>
                                <input type="text" name="nama" placeholder="Masukan nama film" value="<?php echo $data['nama_film']; ?>"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                    <div>
                        <label class="block">Sinopsis<label>
                                <input type="text" name="sinopsis" placeholder="Masukan Sinopsis" value="<?php echo $data['sinopsis']; ?>" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                    <div>
                        <label class="block">Genre<label>
                                <input type="text" name="genre" placeholder="Masukan Genre" value="<?php echo $data['id_genre']; ?>" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="button1">
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit" value="Update" name="proses">Input</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['proses'])){
        mysqli_query($conn,"update film set
        poster = '$_POST[gambar]',
        nama_film = '$_POST[nama]',
        sinopsis = '$_POST[sinopsis]',
        id_genre = '$_POST[genre]'
        where id_film = '$_GET[kode]'");

        echo " Film has updated";
        echo "<meta http-equiv=refresh content=1;URL='erase.php'>";
    }
?>
</body>
</html>