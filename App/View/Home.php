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
  </style>
  <body>
    <div class="container">
      <table>
        <tr>
          <th>Contact</th>
          <th>Email</th>
        </tr>
        <?php foreach ($contacts as $contact) : ?>
        <tr>
          <td><img class="avatar" src="/img/profile1.png" /> <?= $contact['name']?></td>
          <td><?= $contact['email'] ?></td>
          <td><button>Edit</button> <button>Delete</button></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </body>
</html>
