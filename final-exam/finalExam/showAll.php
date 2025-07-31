<?php include 'header.php'; ?>
<h3>All Records:</h3>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=final", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM string_info");
while ($row = $stmt->fetch()) {
  echo "ID: {$row['string_id']} - Message: {$row['message']}<br>";
}

if (isset($_POST['delete'])) {
  $id = $_POST['string_id'];
  $stmt = $pdo->prepare("DELETE FROM string_info WHERE string_id = :id");
  $stmt->execute([':id' => $id]);
  echo "Record with ID $id deleted.";
}
?>

<h4>Delete a Record</h4>
<form method="POST" action="">
  <input type="number" name="string_id" required>
  <button type="submit" name="delete">Delete</button>
</form>
</body>
</html>
