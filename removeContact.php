<?php

$notebook = new DomDocument();
$notebook->load("xml/notebook.xml");

$id = $_POST['id'];

// TODO : Ecrivez un code qui supprime un contact dans la liste à l'aide de l'id du contact.
// Si vous voulez rétablir la version propre de xml/notebook.xml, le code est disponible dans le répertoire backup !

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
