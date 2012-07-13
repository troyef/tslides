<?php
$this->load->helper('url');
$this->load->helper('html');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TWeb Template PHP Index</title>
<?php
		echo link_tag('css/tbase.css');
		echo link_tag('css/tgrid.css');
		echo link_tag('css/tslides.css');


?>
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?php echo base_url("scripts/jquery.min.js");?>"></script>
        <script type="text/javascript">
        
        $(document).ready(function(){
        
        
       });

		</script>
        
    </head>
    
    
    <body>
        <div class="navigation">
		<?php foreach ($galleries as $gallery => $galTitle){
		?>
			<div class="msgbox"><a href="<?= site_url($gallery)?>"><?=$galTitle?></a></div>
		<?php }?>
		
			
		</div>
        
        
        
    </body>
</html>