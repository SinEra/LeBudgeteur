graphColor = [
"red",
"blue",
"yellow",
"pink",
"green",
"purple",
"brown",
"orange",
"magenta",
"gray",
"cyan",
"white",
"lime",
];

function CreatePieChart(ctx, data) {

	data.datasets[0].backgroundColor = graphColor;

	new Chart(ctx, {
		type: 'pie',
		data: data,
		options: {

		}
	})
}

$(function(){
	
	//change = la fonction va être appelé quand #nbGraphiques change de valeur
	$("#nbGraphiques").change(function(){
		var self = $(this);
		afficherGraphiques(self.val());
	})
})

function afficherGraphiques(nbGraphiques){
	//Exemple 3, on garde entre 0 et 3
	$(".date").slice(0, nbGraphiques).show();
	//On garde le reste sauf les 3 premiers
	$(".date").slice(nbGraphiques).hide();
}