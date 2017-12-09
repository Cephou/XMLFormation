<?php include('inc/header.php'); ?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
<div class="row">

<?php

$dom = new DomDocument();
$dom->load("repertoire.xml");

if (!$dom->schemaValidate("schema.xsd")) {
  echo "Not validated";
  return false;
} else {
  echo "Validated";
}

$contactList = $dom->getElementsByTagName("contact");
foreach($contactList as $contact) {

?>
<div class="col s12 m4">
  <div class="card">
   <div class="card-content white-text <?= $contact->getAttribute("color"); ?> darken-1">
     <span class="card-title">
       <?= $contact->getElementsByTagName("firstname")->item(0)->nodeValue; ?>
       <b><?= $contact->getElementsByTagName("name")->item(0)->nodeValue; ?></b>
     </span>
   </div>
   <div class="card-action">
     <?php
     $emailList = $contact->getElementsByTagName("email");
     foreach ($emailList as $email) {
       echo '<div class="valign-wrapper">
        <i class="material-icons grey-text contact-icon">email</i> &nbsp;'. $email->nodeValue .
        '</div>';
     }
     $phoneList = $contact->getElementsByTagName("phone");
     foreach ($phoneList as $phone) {
       echo '<div class="valign-wrapper">
        <i class="material-icons grey-text contact-icon">phone</i> &nbsp;'. $phone->nodeValue .
        '</div>';
     }
     ?>
   </div>
  </div>
</div>

<?php

}

// $nouveauPays = $dom->createElement("pays");
// $nomPays = $dom->createTextNode("Royaume-Uni");
//
// $nouveauPays->appendChild($nomPays);
// $europe = $dom->getElementsByTagName("europe")->item(0);
// $europe->appendChild($nouveauPays);
//
// $dom->save("file.xml");

?>

</div>
</div>

<?php include('inc/footer.php'); ?>
