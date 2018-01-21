<?php

$notebook = new DomDocument();
$notebook->load("xml/notebook.xml");

// Getting info
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$color = $_POST['color'];

$contactList = $notebook->getElementsByTagName("contact");
$contactNumber = $contactList->length;
$id = $contactList->item($contactNumber-1)->getAttribute('id');

// Firstname
$contactFirstname = $notebook->createElement("firstname");
$contactFirstnameText = $notebook->createTextNode($firstname);
$contactFirstname->appendChild($contactFirstnameText);

// Lastname
$contactLastname = $notebook->createElement("lastname");
$contactLastnameText = $notebook->createTextNode($lastname);
$contactLastname->appendChild($contactLastnameText);

// Contact
$newContact = $notebook->createElement("contact");
$newContact->setAttribute("id", $id);
$newContact->setAttribute("color", $color);

// Adding the elements to contact
$newContact->appendChild($contactFirstname);
$newContact->appendChild($contactLastname);

// Adding the contact to repertoire
$repertoire = $notebook->getElementsByTagName("repertoire")->item(0);
$repertoire->appendChild($newContact);

$notebook->save("xml/notebook.xml");

header("Location: index.php");

?>
