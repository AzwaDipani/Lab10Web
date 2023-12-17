# Lab10web

Nama : Muhammad Azwa Dipani

NIM  : 312210417

Kelas : TI.22.A1

## DAFTAR ISI <br>
| No | Description | Link |
|-----|------|-----|
|1|Instruksi Praktikum|[Click Here](#instruksi-praktikum)|
|2|Langkah-langkah Praktikum|[Click Here](#langkah-langkah-praktikum)|
|3|Pertanyaan dan Tugas|[Click Here](#pertanyaan-dan-tugas)|

## Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama `lab10_php_oop` pada docroot webserver (htdocs).
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

## Langkah-langkah Praktikum
1. Buat file php baru dengan nama `mobil.php`
```
<?php
/**
 * Program sederhana pendefinisian class dan pemanggilan class.
 */

 class Mobil
 {
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "10000000";
    }

    public function gantiWarna ($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna ()
    {
        echo "Warna mobilnya : ". $this->warna;
    }
 }

 // membuat objek mobil
 $a = new Mobil();
 $b = new Mobil();

 // memanggil objek
 echo "<b>Mobil pertama</b><br>";
 $a->tampilWarna();
 echo "<br>Mobil pertama ganti warna<br>";
 $a->gantiWarna("Merah");
 $a->tampilWarna();


 // memanggil objek
 echo "<br><b>Mobil kedua</b><br>";
 $b->gantiWarna("Hijau");
 $b->tampilWarna();
 ?>
```
> Output :
![img](pictures/Screenshot%20(227).png)

- **Class Library**
Class Library merupakan pustaka kode program yang dapat digunakan bersama pada beberapa file yang berbeda (konsep modularisasi). Class library menyimpan fungsi-fungsi atau class object komponen untuk memudahkan dalam proses development aplikasi.

2. Buat file php baru dengan nama `form.php`
```
<?php
/**
 * Nama Class: Form
 * Deskripsi: Class untuk membuat form inputan text sederhana
 */

class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;
    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }
    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';
        for ($j = 0; $j < count($this->fields); $j++) {
            echo "<tr><td
    align='right'>" . $this->fields[$j]['label'] . "</td>";
            echo "<td><input type='text'
    name='" . $this->fields[$j]['name'] . "'></td></tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
    }

    public function addField($name, $label)
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->jumField++;
    }

}
?>
```

3. Buat file php baru dengan nama `form_input.php`
```
<?php
/**
* Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
**/
include "form.php";
echo "<html><head><title>Mahasiswa</title></head><body>";
$form = new Form("","Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();
echo "</body></html>";
?>
```
> Output :
![img](pictures/Screenshot%20(228).png)

4. Buat file dengan nama `database.php`
```
<?php

class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include_once("config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }
    
    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $sql = $this->conn->query($sql);
        $sql = $sql->fetch_assoc();
        return $sql;
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = "";
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($table, $filter)
    {
        $sql = "DELETE FROM " . $table . " " . $filter;
        $sql = $this->conn->query($sql);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>
```

## Pertanyaan dan tugas
1. Membuat file `config.php`
   [config.php](lab10_tugas/config.php)

3. Membuat file `database.php`
   [database.php](lab10_tugas/databases.php)

5. Membuat file `home.php`
   [formlibrary.php](lab10_tugas/home.php)

7. Konfigurasikan dengan praktikum sebelumnya
   [index.php](lab10_tugas/index.php)
   [tambah.php](lab10_tugas/tambah.php)
   [ubah.php](lab10_tugas/ubah.php)
   [hapus.php](lab10_tugas/hapus.php)

-> **Output Tugas :**

> - `Home.php`
![img](pictures/Screenshot%20(229).png)

> - `About.php`
![img](pictures/Screenshot%20(230).png)

> - `Kontak.php`
![img](pictures/Screenshot%20(231).png)

> - `tambah.php`
![img](pictures/Screenshot%20(236).png)

![img](pictures/Screenshot%20(232).png)

> - `ubah.php`
![img](pictures/Screenshot%20(233).png)

![img](pictures/Screenshot%20(234).png)

> - `hapus.php`
![img](pictures/Screenshot%20(235).png)


## Selesai, Terima Kasih