<?php
$this->load->helper('url');
$this->load->helper('html');


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Photo Galleries</title>
		<?php
				$this->load->helper('html');
				echo link_tag('css/tbase.css');
				echo link_tag('css/tgrid.css');
				echo link_tag('css/admin.css');


		?>
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?php echo base_url("scripts/jquery.min.js");?>"></script>
        <script type="text/javascript">
        
		

        $(document).ready(function(){
			$('button').click(function(){
				var imgName = $(this).attr('name');
				$.ajax({
				  type: "POST",
				  url: "<?= site_url('admin/update/'.$imageLib) ?>",
				  data: { 'imgname': imgName, 'caption': $('textarea[name="' + imgName + '"]').val() }
				}).done(function( msg ) {
				  alert( "Result: " + msg );
				});
				
			});
	
        });

	

		</script>
        
    </head>
    
    
    <body>
		
       <div class="editList">
			<?= $imageTable ?>
		</div>
        
    </body>
</html>