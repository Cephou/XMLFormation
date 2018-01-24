<?php

  include('inc/header.php');

  $notebook = new DomDocument();
  $notebook->load("xml/notebook.xml");

?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
  <div class="row">

  <?php

  // TODO : Ecrivez un code à l'aide de l'API DOM qui permet d'afficher pour chaque contact une carte

  /*
  
    TEMPLATE D'UNE CARTE DE CONTACT

    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-content white-text red darken-1">
          <span class="card-title">
              Prénom <b>Nom</b>
          </span>
        </div>
        <div class="card-action">
          <div class="valign-wrapper">
            <i class="material-icons grey-text contact-icon">email</i> &nbsp;Email
          </div>
          <div class="valign-wrapper">
            <i class="material-icons grey-text contact-icon">phone</i> &nbsp;Téléphone
          </div>
        </div>
      </div>
    </div>

  */

  $contactList = $notebook->getElementsByTagName("contact");
  foreach($contactList as $contact) {

  ?>

    <div class="col s12 m6 l4">
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

  <hr />
  <br />

  <div class="row">
    <div class="card grey lighten-4 col s12 m6 offset-m3">
      <form class="no-margin" action="addContact.php" method="post">
        <div class="card-content">
          <span class="card-title grey-text text-darken-2 col s12">Create a contact</span><br /><br />
          <div class="row no-margin">
            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input required placeholder="Kyle" id="firstname" name="firstname" type="text" class="validate">
              <label for="firstname">Firstname</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">people_outline</i>
              <input required placeholder="Broflovski" id="lastname" name="lastname" type="text" class="validate">
              <label for="lastname">Lastname</label>
            </div>
          </div>
          <div class="row no-margin">
            <div class="input-field col s6">
              <i class="material-icons prefix">invert_colors</i>
              <select name="color">
                <option value="blue" selected>Blue</option>
                <option value="green">Green</option>
                <option value="brown">Brown</option>
              </select>
              <label>Color</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input required type="text" name="phone" placeholder="6564-256">
              <label for="phone">Phone</label>
            </div>
          </div>
          <div class="row no-margin">
            <div class="input-field col s12">
              <i class="material-icons prefix">email</i>
              <input required type="text" name="email" placeholder="kyle.broflovski@gmail.com">
              <label for="email">Email</label>
            </div>
          </div>
        </div>
        <div class="card-action">
          <button type="submit" name="addContact" class="btn center">Add contact</button>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include('inc/footer.php'); ?>
