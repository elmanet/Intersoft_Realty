<script type="text/javascript" src="../../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../../js/jconfirmaction.jquery.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function() {
				
				
				$('.ask-plain').click(function(e) {
					
					e.preventDefault();
					thisHref	= $(this).attr('href');
					
					if(confirm('Are you sure')) {
						window.location = thisHref;
					}
					
				});
				
				$('.ask-custom').jConfirmAction({question : "Quieres Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
				$('.ask').jConfirmAction();
			});
			
		</script>