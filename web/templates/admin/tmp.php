
<form action="/bulk/TODO/" method="post" id="objects">
	<div class="content-wrapper">
		<?php include "content_header.php" ?>

		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-md-9">
					<a class="btn btn-default" href="/add/TODO/"><i class="fa  fa-plus"></i> TODO</a>
					<a class="btn btn-default submenu-select-link" href='javascript:checkedAll("objects");'><i class="fa  fa-check-square"></i> toggle all </a>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-3">
					TODO
				</div>
				<div class="col-md-1">
					<input type="submit" name="ok" value="Apply" class="btn btn-default">
				</div>
			</div>
			<br />
			TODO
				<?
					$boxClass = ($status == "active") ? "info" : "danger";
				?>
				<div class="row">
					<div class="col-md-12">
						<div class="box  box-<?=$boxClass ?>">
							<div class="box-header">
								<h3 class="box-title"><?php echo $key ?> <small>(<?php echo __($status) ?>)</small> </h3>
							</div>
							<div class="box-body">
								<div class="row">
									<div class="col-md-1">
										TODO
									</div>
									<div class="col-md-3">
										TODO
									</div>
									<div class="col-md-3">
										TODO
									</div>

									<div class="col-md-3">
										TODO
									</div>
								</div>
							</div>
							<div class="box-footer">
								<a class="btn btn-default"  href="javascript: $('#delete-modal-<?= $i ?>').modal('show');"> <img src="/images/delete.png" width="7px" height="8px"> <?php print __('delete'); ?></a>
								<a class="btn btn-default" href="javascript: $('#suspend-modal-<?=$i ?>').modal('show');" > <img src="/images/suspend.png" width="7px" height="8px"> <?php echo __($spnd_action); ?></a>

							</div>
						</div>
					</div>
				</div>

				<!-- Confirm Dialog for Delete -->
				<div class="modal modal-danger" id="delete-modal-<?= $i  ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><?php print __('Confirmation');?></h4>
							</div>
							<div class="modal-body">
								<p><?php print __('DELETE_USER_CONFIRMATION',$key);?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><?php echo __('Close') ?></button>
								<a class="btn btn-outline" href="/delete/db/?database=<?php echo "$key" ?>" onclick="$(this).html('Please Wait...')"><?php print __("Confirm");?></a>
							</div>
						</div>
					</div>
				</div>

				<!-- Confirm Dialog for Suspend -->
				<div class="modal modal-danger" id="suspend-modal-<?= $i  ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title"><?php print __('Confirmation');?></h4>
							</div>
							<div class="modal-body">
								<p><?php print __($spnd_confirmation,$key);?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><?php echo __('Close') ?></button>
								<a class="btn btn-outline" href="/<?php echo $spnd_action ?>/db/?database=<?php echo "$key" ?>"  onclick="$(this).html('Please Wait...')"><?php print __("Confirm");?></a>
							</div>
						</div>
					</div>
				</div>

			<?php
			}
			?>

			<div class="data-count">
				TODO
			</div>
		</section>
	</div>
</form>