<?php include('inc/header.php'); ?>

<div class='container-fluid blue-grey lighten-4' style='padding: 20px;'>
	<div class="row">

	<?php


	# LOAD XML FILE
	$XML = new DOMDocument();
	$XML->load( 'xml/xslt-exercise.xml' );

	# START XSLT
	$xslt = new XSLTProcessor();

	# IMPORT STYLESHEET 1
	$XSL = new DOMDocument();
	$XSL->load( 'schema/xslt-exercise.xsl' );
	$xslt->importStylesheet( $XSL );

	#PRINT
	print $xslt->transformToXML( $XML );
	?>


	<!--

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

	-->


	</div>
</div>

<?php include('inc/footer.php'); ?>
