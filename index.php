<?php

  include('inc/header.php');

  $notebook = new DomDocument();
  $notebook->load("xml/notebook.xml");

?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
  <div class="row">

  <?php

  $contactList = $notebook->getElementsByTagName("contact");
  foreach($contactList as $contact) {

  ?>

    <div class="col s12 m4">
      <div class="card">
       <div class="card-content white-text <?= $contact->getAttribute("color"); ?> darken-1">
         <span class="card-title">
           <form action="removeContact.php" method="POST">
             <input type="hidden" name="id" value="<?= $contact->getAttribute("id"); ?>" />
             <button type="submit" onclick="return confirm('Are you sure to remove this contact?')" class="btn right red round-button" name="removeContact"><i class="material-icons">close</i></button>
           </form>
           <?= $contact->getElementsByTagName("firstname")->item(0)->nodeValue; ?>
           <b><?= $contact->getElementsByTagName("lastname")->item(0)->nodeValue; ?></b>
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

  <?php } ?>

  </div>

  <div class="row">
    <form class="col s12" action="addContact.php" method="post">
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="Placeholder" id="firstname" name="firstname" type="text" class="validate">
          <label for="firstname">Firstname</label>
        </div>
        <div class="input-field col s4">
          <input placeholder="Placeholder" id="lastname" name="lastname" type="text" class="validate">
          <label for="lastname">Lastname</label>
        </div>
      </div>
      <div class="input-field col s4">
        <select name="color">
          <option value="" disabled selected>Choose your option</option>
          <option value="blue">Blue</option>
          <option value="green">Green</option>
          <option value="brown">Brown</option>
        </select>
        <label>Couleur</label>
      </div>
      <div class="row">
        <button type="submit" name="addContact" class="btn center">Ajouter</button>
      </div>
    </form>
  </div>

</div>

<?php include('inc/footer.php'); ?>
