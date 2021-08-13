<?php
// DATABASE CONNECTION
require "../Models/model.php";
$DB = new DATABASE();

$f_name = "";
$l_name = "";
$p_word = "";

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$p_word = $_POST['p_word'];

$data = ['f_name'=> $f_name,'l_name'=> $l_name, 'p_word'=> $p_word];

$sql_Query = "INSERT INTO user_details (id,fname,lname,password) VALUES (NULL ,:f_name, :l_name, :p_word)";

$result = $DB->insert($sql_Query, $data);

echo json_encode($result);




