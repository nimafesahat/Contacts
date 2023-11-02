<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Form</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="img">Img Profile</label>
        <input type="file" name="img" id="img" required>
        <br>
        <button type="submit">Add Contact</button>
    </form>
    <a href="http://localhost/MyApp/contacts">View Contact List</a>
</body>

</html>