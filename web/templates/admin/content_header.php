<section class="content-header">
	<h1><?php echo $TAB; ?></h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><?php echo $TAB; ?></li>
	</ol>
</section>



<!-- Replace display_error_block() with this Modal -->
<? if (!empty($_SESSION['error_msg'])) : ?>
	<div class="modal modal-warning" id="error-msg-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><?php print __('Error');?></h4>
				</div>
				<div class="modal-body">
					<p></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-right" data-dismiss="modal"><?php echo __('OK') ?></button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$("#error-msg-modal .modal-body").html($("#dialog-message").html());
			$("#error-msg-modal").modal("show");
			$(".ui-dialog").remove();
		});
	</script>
<? endif; ?>

<? display_error_block(); ?>

<script>
	// Destroy the default error dialog
	$(document).ready(function () {
		$( "#dialog-message" ).dialog("destroy");
	});
</script>

