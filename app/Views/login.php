<!-- app/Views/login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>

<h2>User Login</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= site_url('login/authenticate') ?>" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

</body>
</html>
