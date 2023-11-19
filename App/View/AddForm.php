<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Contact</title>
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
      button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>New Contact</h1>
      <form method="post" action="http://localhost/user/add" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input
            type="text"
            id="name"
            name="name"
          />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input
            type="text"
            id="email"
            name="email"
          />
          <div class="form-group">
          <label for="img">Profile img:</label>
          <input
            type="file"
            id="img"
            name="img"
          />
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
