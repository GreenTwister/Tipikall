<?php
/*
Template Name: devis 
*/
get_header();

?>
	<div id="modalDevis" class="modal valign-wrapper">
		
	<div class="counter">
			<h5 class="red white-text btn-large" id="questionNumber">Question 1/6</h5>
	</div>	
	<div class="counterSecond">
			<h5 class="red white-text btn-large" id="amountNumber">A partir de: </h5>
	</div>	

		<div class="modal-content valign-wrapper">
	
			<div class="container" id="quotationDiv">
					<div class="row center" id="quotationRow">
						<div id="quotationCol">
							<form method="post" id="quoteForm">
								<div id="lineCoord">
									<div class="row">
										<div class="input-field col s12 l12">
											<input id="first_name" name="group8" type="text" autocomplete="Prénom" class="validate active" required>
											<label for="first_name">Prénom</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 l12">
											<input id="last_name" name="group9" type="text" autocomplete="Nom" class="validate active" required>
											<label for="last_name">Nom</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 l12">
											<input id="email" name="group10" type="email" autocomplete="@" class="validate active" required>
											<label for="email">Email</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 l12">
											<input id="phone" name="group11" type="tel" class="validate active" required>
											<label for="phone">Téléphone</label>
										</div>
									</div>
								</div>



								<div id="line1" class="line">
									<h5>Je suis:</h5>
									<label>
										<input class="line1" name="group1" type="radio" value="Luxe"/>
										<span>Un Hôtel</span>
									</label>

									<label>
										<input class="line1" name="group1" type="radio" value="Hôtel" />
										<span>Un camping</span>
									</label>

									<label>
										<input class="line1" name="group1" type="radio" value="Camping"/>
										<span>Une auberge</span>
									</label>

									<label>
										<input class="line1" name="group1" type="radio" value="Auberge"/>
										<span>Un gîte</span>
									</label>

									<label>
										<input class="line1" name="group1" type="radio" value="Chambre"/>
										<span>Autre</span>
									</label>
								</div>

								<div id="line2" class="line">
									<h5>Je souhaite:</h5>
									<label>
										<input class="line2" name="group2" type="radio" value="1" id="1000"/>
										<span>Créer un nouveau site</span>
									</label>

									<label>
										<input class="line2" name="group2" type="radio" value="2" id="800"/>
										<span>Refondre un site existant</span>
									</label>

									<label>
										<input class="line2" name="group2" type="radio" value="3" id="1200"/>
										<span>Pouvoir gérer des réservations</span>
									</label>
								</div>

								

								<div id="line3" class="line">
									<h5>Pour le design?</h5>
									<label>
										<input class="line3" name="group3" type="radio"  value="1" id="0"/>
										<span>Rien n'est à prévoir</span>
									</label>

									<label>
										<input class="line3" name="group3" type="radio"  value="2" id="400"/>
										<span>Il faut refondre les visuels</span>
									</label>

									<label>
										<input class="line3" name="group3" type="radio"  value="3"  id="800"/>
										<span>Il faut créer les visuels</span>
									</label>
								</div>

								<div id="line4" class="line">
									<h5>Combien de langues doit intégrer votre projet?</h5>
									<label>
										<input class="line4" name="group4" type="radio"  value="1" id="0"/>
										<span>Du français</span>
									</label>

									<label>
										<input class="line4" name="group4" type="radio"  value="2" id="500"/>
										<span>Deux langues</span>
									</label>

									<label>
										<input class="line4" name="group4" type="radio"  value="3" id="1000"/>
										<span>Trois langues ou plus</span>
									</label>
								</div>

								<div id="line5" class="line">
									<h5>Combien de visiteurs avez-vous?</h5>
									<label>
										<input class="line5" name="group5" type="radio"  value="1" id="100"/>
										<span>Quelques centaines au maximum</span>
									</label>

									<label>
										<input class="line5" name="group5" type="radio"  value="2" id="200"/>
										<span>Plusieurs milliers</span>
									</label>

									<label>
										<input class="line5" name="group5" type="radio"  value="3" id="400"/>
										<span>Des dizaines de milliers ou plus</span>
									</label>
								</div>


								<div id="line6" class="line">
									<h5>Comment pouvons-nous aider votre publicité?</h5>
									<label>
										<input class="line6" name="group6" type="radio"  value="1"  id="0"/>
										<span>Je ne sais pas</span>
									</label>

									<label>
										<input class="line6" name="group6" type="radio"  value="2" id="50"/>
										<span>Il faut peu de publicité</span>
									</label>

									<label>
										<input class="line6" name="group6" type="radio"  value="3" id="150"/>
										<span>Il en faut beaucoup</span>
									</label>

									<label>
										<input class="line6" name="group6" type="radio"  value="4" id="400"/>
										<span>Il me faut une stratégie complète</span>
									</label>
								</div>
								<button id="quoteSend" class="btn waves-effect waves-light center-align valign-wrapper" type="submit" name="action">Envoyer
									<i class="material-icons right">send</i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>		
	</div>	
		


<script src="https://ocp5.entem-design.com/wp-content/themes/tipikall/assets/js/quote.js"></script>
<script>

	jQuery(document).ready(function($){
		$("#quoteForm").submit(function() {
			var formData=$(this).serialize();
			$.ajax({
				url:'Checkprice.php',
				type:'POST',
				data:formData,
				dataType:'html'
			});

	})
})
		
	


</script>

<?php
get_footer();
?>