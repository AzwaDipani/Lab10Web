<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data barang</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        
        nav {
            background-color: #333;
            text-align: center;
            padding: 10px 0;
        }
        
        nav a {
            text-decoration: none;
            margin: 0 10px;
            color: white;
        }
        
        nav a:hover {
            text-decoration: underline;
        }

        nav a[href="index.php"],
        nav a[href="tambah.php"],
        nav a[href="about.php"] {
            
        }

        footer {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
            color: #333;

}

</style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Home</a>
            <a href="kontak.php">Kontak</a>
            <a href="about.php">About</a>
</nav>