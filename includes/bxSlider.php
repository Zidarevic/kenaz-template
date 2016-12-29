<!--bxSlider-->
			<script>
				$('#slider1').bxSlider({
					
					/*mode: 'fade',*/
					auto: true,
					infiniteLoop: true,
					captions: true,
					autoControls: true,
					onSlideAfter: function() {
						$('.bx-start').trigger('click');
					}
				});
				
				/*$('#slider2').bxSlider({
					
					nextSelector: '#slider-next',
  					prevSelector: '#slider-prev',
  					nextText: '&#10095',
  					prevText: '&#10094',
					/*mode: 'fade',*/
				/*	auto: false,
					infiniteLoop: true,
					captions: true,
					autoControls: true,
				});
				$('#slider3').bxSlider({
					
					nextSelector: '#slider-next',
  					prevSelector: '#slider-prev',
  					nextText: '&#10095',
  					prevText: '&#10094',
					/*mode: 'fade',*/
				/*	auto: false,
					infiniteLoop: true,
					captions: true,
					autoControls: true,
				});*/
			</script>