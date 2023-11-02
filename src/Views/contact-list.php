<!DOCTYPE html>
<html>

<head>
    <title>Contact List</title>
</head>

<body>
    <h1>Contact List</h1>
    <ul>
        <?php foreach ($contacts as $contact) : ?>
            <li><?= $contact['name'] ?> - <?= $contact['email'] ?> - <img src="<?= $contact['profile'] ?>" height="50" width="50">
                <form method="post" action="/MyApp/editform">
                    <input type="hidden" name="info-name" value=<?= $contact['name'] ?>>
                    <input type="hidden" name="info-email" value=<?= $contact['email'] ?>>
                    <input type="hidden" name="info-profile" value=<?= $contact['profile'] ?>>
                    <button type="submit" name='info-edit' value=<?= $contact['id'] ?>>Edit</button>
                </form>
                <form method="post" action='/MyApp/delete'>    
                <input type="hidden" name="del-profile" value=<?= $contact['profile'] ?>>
                <button type="submit" name='deleteid' value=<?= $contact['id'] ?>>Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="http://localhost/MyApp/create">Add Contact</a>
</body>

</html>

