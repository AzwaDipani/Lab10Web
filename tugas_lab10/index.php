<?php
include("databases.php");
include("home.php");

$config = include("config.php");

$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);
$sql = 'SELECT * FROM data_barang';
$result = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>

<body>
    <style>
body {
    font-family: Tahoma, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
  }
  
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
    display: grid;
    justify-content: center;
    border-radius: 20px;
  }

  h2 {
    text-align: center;
  }
  
  nav {
    padding: 10px;
    text-align: center;
}
  
  a{
      text-decoration: none;
      padding: 5px;
      color:whitesmoke;
      background-color: #333;
      border-radius: 10px;
  }
  
  table {
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  th,
  td {
    border: 1px black solid;
    padding: 7px;
  }
  
  img {
    width: 100px;
  }
  
  .about-img img {
    width: 200px;
    border-radius: 50%;
  }
  
  .tambah, .hapus, .ubah{
    text-decoration: none;
    margin: 2px;
    border-radius: 5px;
    padding: 5px;
    font-size: 15px;
  }
  
  a:hover {
    background-color: whitesmoke;
    transform: scale(0.98);
    color: black;
  }
  
  nav a:hover {
    border-radius: 5px;
    padding: 10px;
  }
  
  .modular-list, .modular{
    text-align: left;
  }
  
  .about-image img {
    width: 100px;
    height: 150px;
    border-radius: 200%;
}
.contact-content {
    display: flex;
    justify-content: space-around;
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.contact-form h2, p{
    text-align: center;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #cccccc;
    border-radius: 5px;
}

</style>
    <div class="container">
        <?php require('header.php'); ?>
        <h2>Data Barang</h2>
        <div class="main">
            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <?php echo home::generateTable($result); ?>
        </div>
        <?php require('footer.php'); ?>
    </div>
</body>

</html>

<?php
// Jangan lupa untuk menutup koneksi setelah selesai menggunakannya
$db->closeConnection();
?>