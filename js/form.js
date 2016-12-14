$(function(){
	$(".modifier-compte").click(function(){
		var ligne = $(this).closest("tr");
		ligne.find(".input").show();
		ligne.find(".value").hide();
	});

	$(".sauvegarder-compte").click(function(){
		var ligne = $(this).closest("tr");
		var data = {
			compteId: ligne.find("[name=compteId]").val(),
			typeCompte: ligne.find("[name=typeCompte]").val(),
			nom: ligne.find("[name=nom]").val(),
			montant: ligne.find("[name=montant]").val(),
		};


		$.ajax({
			method: "POST",
			url:"sauvegarderCompte.php", 
			data: data,
			success: function(){
				ligne.find(".value-typeCompte").text(ligne.find("[name=typeCompte] :selected").text());
				ligne.find(".value-nom").text(data.nom);
				ligne.find(".value-montant").text(data.montant);

				ligne.find(".input").hide();
				ligne.find(".value").show();		
			}})
	});
});