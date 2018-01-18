<?php include('inc/header.php'); ?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
<div class="row">

<?php

$dom = new DomDocument();
$dom->load("xml/schema-exercise.xml");

if (!$dom->schemaValidate("schema/schema-exercise.xsd")) {
  echo "Not validated";
  return false;
} else {
  echo "Validated";
}

?>
