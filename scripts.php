<script>
	$(document).ready(function(){

		$("#title").text($("#title").text().toUpperCase());

		$(".directory").each(function(index){
			
			string = $(this).text();
			$(this).text(string.charAt(0).toUpperCase() + string.slice(1));
		});
	});
</script>