
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?= session()->get('username') ?></h2>

<a href="<?= site_url('logout') ?>">Logout</a>

</body>
</html>
