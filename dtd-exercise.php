<?php include('inc/header.php'); ?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
<div class="row">

<?php

$dom = new DomDocument();
$dom->load("xml/dtd-exercise.xml");

if (!$dom->validate()) {
  echo "Not validated";
  return false;
} else {
  echo "Validated ! Well done.";
}

?>

</div>
</div>

<?php include('inc/footer.php'); ?>
