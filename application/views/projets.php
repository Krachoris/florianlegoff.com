<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">
	<div class="conteneur">
		<?php foreach ($projets as $projet): ?>
			<div class="projet">
				<p>
					<a href="#<?php echo $projet->attribut_projet; ?>">
					<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->miniature_projet; ?>" alt="Miniature <?php echo $projet->titre_projet; ?>" />
					</a>
					<a href="#<?php echo $projet->attribut_projet; ?>" class="viewProject">
						<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
						Voir le Projet
					</a>
				</p>
						
				<h4><a href="#<?php echo $projet->attribut_projet; ?>"><?php echo $projet->titre_projet; ?></a></h4>
			</div>
		<?php endforeach; ?>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back0 -->

<?php foreach ($projets as $projet): ?>

<div class="back1 prezProjet" id="<?php echo $projet->attribut_projet; ?>">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->icone_projet; ?>" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				<?php echo $projet->titre_projet; ?><br />
				<span class="sTitreProjet"><?php echo $projet->sousTitre_projet; ?></span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" class="blackClose" />
					<img src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoCloseSurvol.png" alt="Icone fermer le projet" class="redClose" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<div class="diapoProjet" >
				<p>
					<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->attribut_projet; ?>/<?php echo $projet->attribut_projet; ?>_accueil.jpg" alt="Fenetre comportant les screens du site" width="660px" />
				</p>
			</div>
			<div class="infosProjet" >
				<h3>Description</h3>
				<p>
					<?php echo nl2br($projet->description_projet); ?>
				</p>

				<h3>Détails</h3>
				<p>
					<strong>Cliente :</strong> <?php echo $projet->client_projet; ?><br />
					<strong>Date :</strong> <?php echo $projet->date_projet; ?><br />
					<strong>Webdesign :</strong> <?php echo $projet->webdesign_projet; ?><br />
					<strong>Technologies : </strong> <?php echo $projet->technologies_projet; ?>
				</p>
				<h3>Liens</h3>
				<p>
					<strong>Site :</strong> <?php echo $projet->url_projet; ?><br />
				</p>
			</div>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#<?php echo $projet->prev_projet; ?>"><img class="flecheG" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				<?php echo $projet->position_projet; ?>/<?php echo $nbProjets; ?>
				<a href="#<?php echo $projet->next_projet; ?>"><img class="flecheD" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<?php endforeach; ?>

<script type="text/javascript">
	$(function(){

		$('.prezProjet .closeProjet .redClose').each(function(){
			$(this).hide();
		});

		$('.prezProjet .closeProjet a').each(function(){

			$(this).mouseenter(function(){
         		$(this).find('.blackClose').fadeOut(100);
         		$(this).find('.redClose').fadeIn(100);
         	});

         	$(this).mouseleave(function(){
         		$('.prezProjet .closeProjet a .blackClose').fadeIn(100);
         		$('.prezProjet .closeProjet a .redClose').fadeOut(100);
         	});
		});

     	$('.prezProjet .footProjet .flecheG').each(function(){
        	$(this).mouseenter(function(){
         		$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGaucheSurvol.png');
         	});
         	$(this).mouseleave(function(){
         		$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png');
         	});
      	});

      	$('.prezProjet .footProjet .flecheD').each(function(){
         	$(this).mouseenter(function(){
         		$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroiteSurvol.png')
         	});
         	$(this).mouseleave(function(){
         		$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png')
         	});
      	});

    })
</script>

<?php require('application/views/template/footer.php') ?>