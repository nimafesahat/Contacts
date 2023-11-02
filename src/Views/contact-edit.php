<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Form</h1>
    <form method="POST" action="edit" enctype="multipart/form-data">
        <label for="img-show">Profile:</label>
        <input type="hidden" name="img-link" value="<?php echo $profile ?>" required>
        <img id="img-show" src="<?php echo $profile ?>" height="50" width="50"><br>
        <label for="img-edit">Edit Profile:</label>
        <input type="file" name="img" id="img-edit" required>
        <br>    
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email ?>" required>
        <br>
        <button type="submit" name="editid" value="<?php echo $id ?>">Edit Contact</button>
    </form>
    <a href="http://localhost/MyApp/contacts">View Contact List</a>
</body>

</html>