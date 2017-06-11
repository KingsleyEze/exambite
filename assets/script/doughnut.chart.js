	

		
		$(document).ready(function(){
		
		var colors = ["#99B2FF", "#FF7373"];
		
		var url = '../assets/xware/cubix/chart.wiz.php'; 
					
		$.get(url, { mode:'speed', ui:ubid}, function(data){ 
		
			$("#speed-data").html(data + '%'); 
			
			var num = parseInt(data);
			var pc = 100 - num;
			
			
			var speed = [
				{
					value: pc,
					color: colors[0],
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: num,
					color: colors[1],
					highlight: "#5AD3D1",
					label: "Blue"
				}

			];
			
			
				var ctxA = document.getElementById("chart-areaA").getContext("2d");
				window.myDoughnut = new Chart(ctxA).Doughnut(speed, {responsive : true});
		});
		
		$.get(url, { mode:'accuracy', ui:ubid}, function(data){ 
			
			$("#accuracy-data").html(data + '%'); 
				
				var num = parseInt(data);
				var pc = 100 - num;
				
				var accuracy = [
				{
					value: pc,
					color:colors[0],
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: num,
					color: colors[1],
					highlight: "#5AD3D1",
					label: "Blue"
				}

			];
			
				var ctxB = document.getElementById("chart-areaB").getContext("2d");
				window.myDoughnut = new Chart(ctxB).Doughnut(accuracy, {responsive : true});
				
			
			});
			
		$.get(url, { mode:'overall', ui:ubid}, function(data){ 	
			
				$("#overall-data").html(data + '%'); 
			
				var num = parseInt(data);
				var pc = 100 - num;
				
				var overall = [
				{
					value: pc,
					color: colors[0],
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: num,
					color: colors[1],
					highlight: "#5AD3D1",
					label: "Blue"
				}

			];
			
				var ctxC = document.getElementById("chart-areaC").getContext("2d");
				window.myDoughnut = new Chart(ctxC).Doughnut(overall, {responsive : true});
			
			});
});	