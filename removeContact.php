<?php

$notebook = new DomDocument();
$notebook->load("xml/notebook.xml");

$id = $_POST['id'];

$contactList = $notebook->getElementsByTagName("contact");
foreach ($contactList as $contact) {
  if($contact->getAttribute('id') == $id) {
    // Removing the contact from the repertoire
    $repertoire = $notebook->getElementsByTagName("repertoire")->item(0);
    $repertoire->removeChild($contact);
    $notebook->save("xml/notebook.xml");
    break;
  }
}

header("Location: index.php");

?>
