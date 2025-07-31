<?php include 'header.php'; ?>
<form method="POST" action="">
  <input type="text" name="message" required>
  <button type="submit" name="submit">Submit</button>
</form>
<a href="showAll.php">Show all records</a>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=final", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['submit'])) {
  $msg = $_POST['message'];
  $stmt = $pdo->prepare("INSERT INTO string_info (message) VALUES (:message)");
  $stmt->execute([':message' => $msg]);
  echo "Message saved!";
}
?>
</body>
</html>
