<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Show Contact</title>
    <style>
      /* Basic CSS for styling the form */
      body {
        font-family: Arial, sans-serif;
      }
      .container {
        max-width: 400px;
        margin: 0 auto;
      }
      .form-group {
        margin-bottom: 20px;
      }
      label {
        display: block;
        font-weight: bold;
      }
      input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      #delete {
        background-color: red;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .avatar {
      vertical-align: middle;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    </style>
  </head>
  <body>   
    <div class="container">
      <h1>Show Contact</h1>
      <h3>Profile : <img class="avatar" src="/img/<?php echo $contact['profile'] ?>"> </h3>
      <form method="post" action="http://localhost/user/edit" enctype="multipart/form-data"   >
        <input type="hidden" name="img-name" value="<?php echo $contact['profile'] ?>" />
        <div class="form-group">
          <label for="name">Name:</label>
          <input
            type="text"
            id="name"
            name="name"
            value="<?php echo $contact['name'] ?>"
          />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input
            type="text"
            id="email"
            name="email"
            value="<?php echo $contact['email'] ?>"
          />
          <div class="form-group">
          <label for="img">Edit profile img:</label>
          <input
            type="file"
            id="img"
            name="img"
          />
        </div>
        <button class = "button " type="submit" name = 'id' value="<?php echo $contact['id'] ?>" >Edit</button> 
        <a href='http://localhost/user/delete/<?php echo $contact['id'] ?>'><button type="button" id='delete'>Delete</button></a>
      </form>
    </div>
  </body>
</html>
