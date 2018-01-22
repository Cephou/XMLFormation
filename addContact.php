<?php

$notebook = new DomDocument();
$notebook->load("xml/notebook.xml");

// Getting info
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$color = $_POST['color'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$contactList = $notebook->getElementsByTagName("contact");
$contactNumber = $contactList->length;
$id = ($contactList->item($contactNumber-1) !== null) ? ($contactList->item($contactNumber-1)->getAttribute('id') + 1) : 1;

// Contact
$newContact = $notebook->createElement("contact");
$newContact->setAttribute("id", $id);
$newContact->setAttribute("color", $color);


// Firstname
$contactFirstname = $notebook->createElement("firstname");
$contactFirstnameText = $notebook->createTextNode($firstname);
$contactFirstname->appendChild($contactFirstnameText);

// Lastname
$contactLastname = $notebook->createElement("lastname");
$contactLastnameText = $notebook->createTextNode($lastname);
$contactLastname->appendChild($contactLastnameText);

if($phone != '') {
  // Phone
  $contactPhone = $notebook->createElement("phone");
  $contactPhoneText = $notebook->createTextNode($phone);
  $contactPhone->appendChild($contactPhoneText);
  // Phones
  $contactPhones = $notebook->createElement("phones");
  $contactPhones->appendChild($contactPhone);
}

if($email != '') {
  // Email
  $contactEmail = $notebook->createElement("email");
  $contactEmailText = $notebook->createTextNode($email);
  $contactEmail->appendChild($contactEmailText);
  // Emails
  $contactEmails = $notebook->createElement("emails");
  $contactEmails->appendChild($contactEmail);
}

// Adding the elements to contact
$newContact->appendChild($contactFirstname);
$newContact->appendChild($contactLastname);
if($phone != '') {
  $newContact->appendChild($contactPhones);
}
if($email != '') {
  $newContact->appendChild($contactEmails);
}

// Adding the contact to repertoire
$repertoire = $notebook->getElementsByTagName("repertoire")->item(0);
$repertoire->appendChild($newContact);

$notebook->save("xml/notebook.xml");

header("Location: index.php");

?>
