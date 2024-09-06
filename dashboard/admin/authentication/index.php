<?php
require_once __DIR__ . '/admin-class.php';

$admin = new ADMIN();

if (!$admin->isUserLoggedIn()) {
    $admin->redirect('../../'); 
}

$stmt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmt->execute(array(":id" => $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    
    <link rel="stylesheet" href="http://localhost/ITELEC2-V2/src/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo ($user_data['email']); ?> <br>You successfully login <br>to our pages</h1>
        <button><a href="http://localhost/ITELEC2-V2/dashboard/admin/authentication/index.php?admin_signout">SIGN OUT</a></button>
    </div>
</body>
</html>
