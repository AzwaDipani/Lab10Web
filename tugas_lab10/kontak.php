<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
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
        
nav {
    background-color: #1f5faa;
    padding: 10px;
    text-align: center;
}
        
nav a {
    color: #fff;
    text-decoration: none;
    margin: 10px;
}

        
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    width: 50%;
    margin: 0 auto;
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
        
input[type="text"],
        
input[type="email"],
        
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
        
input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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

.contact-form button {
    background-color: #98b3a0;;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #4a4949;
}

</style>
<div class="container">
        <?php require('header.php'); ?>
        <div class="contact-content">
            <div class="contact-form">
                <h2>Contact Form Me</h2>
                <p>Send us a message using the form below:</p>
                <br>
                <form>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <?php require('footer.php'); ?>
    </div>
</body>
</html>