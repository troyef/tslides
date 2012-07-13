<?php
$this->load->helper('url');
$this->load->helper('html');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Photo Galleries</title>
        <?php
			
				echo link_tag('css/tbase.css');
				echo link_tag('css/tgrid.css');
				echo link_tag('css/tslides.css');


		?>
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?= base_url("scripts/jquery.min.js")?>"></script>
        <script type="text/javascript">
        
		function setPanelSizes(){
			$('.bgPanel').height($(window).height());
			var bgWidth = 0
			$.each($('.imgPanel'),function(){bgWidth += $(this).width() + 5;});
			$('.bgPanel').width(bgWidth);
		}
		var images = [<?=$imagesArray   ?>];
		var imagePath = "<?=$imagePath   ?>";
		var slideInfo = <?=$slideInfo   ?>;

        $(document).ready(function(){ 
			$('.bgPanel').height($(window).height());
			$('.bgPanel').width($(window).width()*2);
			
			$(window).resize(function() { setPanelSizes(); });
			

			for (var i in images){
				var caption = (typeof(slideInfo[images[i]]) !== undefined && slideInfo[images[i]] !== undefined && slideInfo[images[i]] != '') ? '<div class="caption">' + slideInfo[images[i]] + '</div>' : "";
				$('.bgPanel').append('<div class="imgPanel">' + caption + '<img src="' + imagePath + images[i] + '"/></div>');
			}
			$(window).bind('load', setPanelSizes);
			
			$(window).bind('keypress', function(e) { 
				var code = (e.keyCode ? e.keyCode : e.which);
				//alert(code);
				if (code == 32) {
				   $('.msgbox').toggle();
				} else if (code == 99) {
				   $('.caption').toggle();
				}
				
			});
       });

	

		</script>
        
    </head>
    
    
    <body>
		<div class="navigation">
		<?php foreach ($galleries as $gallery => $galTitle){
		?>
			<div class="msgbox"><a href="<?= site_url($gallery)?>"><?=$galTitle?></a></div>
		<?php }?>
		
			<div class="msgbox legend">press 'c' to hide/show captions<br/>spacebar to hides/shows the rest</div>
		</div>
	
       <div class="bgPanel">
		</div>
        
    </body>
</html>