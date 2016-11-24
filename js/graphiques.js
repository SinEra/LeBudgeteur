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