<?php
class inicio extends CI_Controller {	
	
	public function index()
	{
		?>
		<script>
		location="<?php echo base_url()?>index.html";
		</script>
		<?php 
	}
}
?>