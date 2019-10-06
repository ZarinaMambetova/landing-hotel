<?php
// подключение бд
try {
  $dbh = new PDO('mysql:host=localhost;dbname=hotel', 'root', 'root');
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

// передача данных в бд
function addNewApplication($dph, $destination, $race, $checkoff, $rooms, $adults, $child) {

  $sql = "INSERT INTO applications (destination, race, checkoff, rooms, adults, child) VALUES(:destination, :race, :checkoff, :rooms, :adults, :child)";
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(":destination", $destination, PDO::PARAM_STR);
  $stmt->bindValue(":race", $race, PDO::PARAM_STR);
  $stmt->bindValue(":checkoff", $checkoff, PDO::PARAM_STR);
  $stmt->bindValue(":rooms", $rooms, PDO::PARAM_INT);
  $stmt->bindValue(":adults", $adults, PDO::PARAM_INT);
  $stmt->bindValue(":child", $dchild, PDO::PARAM_INT);
  $stmt->execute();
}

//
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $destination = strip_tags(trim($_POST['data'][0]['value']));
  $race = strip_tags(trim($_POST['data'][1]['value']));
  $checkoff = strip_tags(trim($_POST['data'][2]['value']));
  $rooms = strip_tags(trim($_POST['data'][3]['value']));
  $adults = strip_tags(trim($_POST['data'][4]['value']));
  $child = strip_tags(trim($_POST['data'][5]['value']));
  addNewApplication($dph, $destination, $race, $checkoff, $rooms, $adults, $child);

}
 