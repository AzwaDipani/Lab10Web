<?php
error_reporting(E_ALL);
include_once 'databases.php';
include_once 'home.php';

$db = new Database("localhost", "root", "", "latihan1");

if (isset($_POST['submit'])) {
    $id = $db->escapeString($_POST['id']);
    $nama = $db->escapeString($_POST['nama']);
    $kategori = $db->escapeString($_POST['kategori']);
    // ... (other form data)

    // Build your SQL statement based on the form data
    $sql = "UPDATE data_barang SET nama='{$nama}', kategori='{$kategori}' WHERE id_barang='{$id}'";

    $result = $db->query($sql);

    if (!$result) {
        die('Error: ' . $db->getError());
    } else {
        header('location: index.php');
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = $db->query($sql);
if (!$result) {
    die('Error: Data tidak tersedia');
}
$data = mysqli_fetch_array($result);

$db->closeConnection();
?>
<?php require('header.php'); ?>
<style>
    .main {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

.input {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
select,
input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.actions {
    display: flex;
    justify-content: space-between;
}

</style>
<div class="container">
        <h1>Ubah Barang</h1>
        <div class="main">
            <form method="post" action="ubah.php" enctype="multipart/form-data">
                <div class="input">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'];?>" />
                </div>
                <div class="input">
                    <label>Kategori</label>
                    <select name="kategori">
                        <?php
                            $options = [
                                'Komputer' => 'Komputer',
                                'Elektronik' => 'Elektronik',
                                'Hand Phone' => 'Hand Phone'
                            ];
                            echo home::generateUbah($data['kategori'], $options);
                        ?>
                    </select>
                </div>
                <!-- Sisanya tetap di sini -->
                <div class="submit">
                    <input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" />
                    <input type="submit" name="submit" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php require('footer.php'); ?>