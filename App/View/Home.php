<!DOCTYPE html>
<html>
  <header>
    <title>List Contacts</title>
  </header>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #007bff;
      color: #fff;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
    }
    .avatar {
      vertical-align: middle;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }
    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      #new{
        padding: 5px 10px;
        cursor: pointer;
        border:solid;
      }
  </style>
  <body>
    <div class="container">
      <h1>List Contacts</h1>
      <a href='/user/add'><button id='new'>Add Contact</button></a>
      <table>
        <tr>
          <th>Contact</th>
          <th>Email</th>
        </tr>
        <?php foreach ($contacts as $contact) : ?>
        <tr>
          <td><img class="avatar" src="/img/<?= $contact['profile'] ?>" /> <?= $contact['name']?></td>
          <td><?= $contact['email'] ?></td>
          <td><a  href='/user/show/<?= $contact['id'] ?>'><button>Show information</button></a></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
