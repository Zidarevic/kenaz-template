<!--flexSlider-->
			<script>
				$(window).load(function() {
					
					$('#flexslider1').flexslider({
						
						animation: "slide",
						controlsContainer: $(".custom-controls-container"),
						customDirectionNav: $(".custom-navigation a"),
						pauseOnAction: true, // default setting
						after: function(slider) {
							
							/* auto-restart player if paused after action */
							if (!slider.playing) {
								slider.play();
							}
						}
					});
				});
				
				
				$(window).load(function() {
					
					$('#flexslider2').flexslider({
						
						animation: "slide",
						controlsContainer: $(".custom-controls-container2"),
						customDirectionNav: $(".custom-navigation2 a"),
						pauseOnAction: true, // default setting
						after: function(slider) {
							
							/* auto-restart player if paused after action */
							if (!slider.playing) {
								slider.play();
							}
						}
					});
				});
				
				
				$(window).load(function() {
					
					$('#flexslider3').flexslider({
						
						animation: "slide",
						controlsContainer: $(".custom-controls-container3"),
						customDirectionNav: $(".custom-navigation3 a"),
						itemWidth: 200,
						itemMargin: 30,
						minItems: 2,
						maxItems: 2,
						pauseOnAction: true, // default setting
						after: function(slider) {
							
							/* auto-restart player if paused after action */
							if (!slider.playing) {
								slider.play();
							}
						}
					});
				});
			</script>