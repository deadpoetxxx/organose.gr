<?php
// admin panel - φόρμα δημιουργίας συλλόγου
?>

<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Διαχείριση Συλλόγων - Organose.gr</title>
  <style>
    body { font-family: sans-serif; background: #f9f9f9; padding: 30px; }
    .form-container { max-width: 500px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; }
    label { display: block; margin-top: 15px; }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%; padding: 8px; margin-top: 5px;
    }
    button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
    button:hover { background: #0056b3; }
  </style>
</head>
<body>

<div class="form-container">
  <h2>➕ Δημιουργία Νέου Συλλόγου</h2>
  <form method="post" action="create-club.php">
    <label>Όνομα Συλλόγου:</label>
    <input type="text" name="club_name" required>

    <label>Email Διαχειριστή:</label>
    <input type="email" name="admin_email" required>

    <label>Τηλέφωνο:</label>
    <input type="text" name="phone" required>

    <label>Κωδικός Πρόσβασης:</label>
    <input type="password" name="admin_password" required>

    <button type="submit">Δημιουργία Συλλόγου</button>
  </form>
</div>

</body>
</html>
