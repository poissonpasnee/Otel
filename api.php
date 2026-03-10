<?php

$db = new SQLite3('pipo.db');

$db->exec('CREATE TABLE IF NOT EXISTS messages (
id INTEGER PRIMARY KEY,
text TEXT
)');

if($_SERVER["REQUEST_METHOD"]=="POST"){

$text=file_get_contents("php://input");

$stmt=$db->prepare("INSERT INTO messages(text) VALUES(:text)");
$stmt->bindValue(":text",$text);

$stmt->execute();

exit;

}

$res=$db->query("SELECT * FROM messages ORDER BY id DESC LIMIT 50");

$data=[];

while($row=$res->fetchArray()){

$data[]=$row;

}

echo json_encode($data);

?>