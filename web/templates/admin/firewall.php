<?
require_once "func.php";
$back = getBack("/list/firewall/");
?>


<form id="vstobjects" name="<?=$formName ?>" method="post">
	<div class="content-wrapper">
		<?php include "content_header.php" ?>

		<!-- Main content -->
		<section class="content">

			<? if (isEditPage($formName)) : ?>
				<div class="row">

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-info"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Status</span>
								<span class="info-box-number"><?php echo __($v_status) ?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Created Date</span>
								<span class="info-box-number"><?php echo strftime("%d %b %Y", strtotime($v_date))?> <br/><?php echo $v_time?></span>
							</div><!-- /.info-box-content -->
						</div><!-- /.info-box -->

					</div>
				</div>
			<? endif; ?>

			<div class="row">

				<div class="col-md-7">

					<? if (!empty($_SESSION['error_msg'])) : ?>
						<div class="callout callout-danger">
							<h4>Error</h4>
							<p><?=$_SESSION['error_msg'] ?></p>
						</div>
					<? elseif (!empty($_SESSION['ok_msg'])) : ?>
						<div class="callout callout-info">
							<h4>Info</h4>
							<p><?=$_SESSION['ok_msg'] ?></p>
						</div>
					<? endif; ?>

					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><?=$title ?></h3>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label>
									<?php print __('Action') ?>
								</label>
								<select class="vst-list form-control" name="v_action">
									<option value="DROP" <?php if ((!empty($v_action)) && ( $v_action == "DROP" )) echo 'selected'?>><?php print __('DROP') ?></option>
									<option value="ACCEPT" <?php if ((!empty($v_action)) && ( $v_action == "ACCEPT" )) echo 'selected'?>><?php print __('ACCEPT') ?></option>
								</select>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Protocol') ?>
								</label>
								<select class="vst-list form-control" name="v_protocol">
									<option value="TCP" <?php if ((!empty($v_protocol)) && ( $v_protocol == "TCP" )) echo 'selected'?>><?php print __('TCP') ?></option>
									<option value="UDP" <?php if ((!empty($v_protocol)) && ( $v_protocol == "UDP" )) echo 'selected'?>><?php print __('UDP') ?></option>
									<option value="ICMP" <?php if ((!empty($v_protocol)) && ( $v_protocol == "ICMP" )) echo 'selected'?>><?php print __('ICMP') ?></option>
								</select>
							</div>

							<div class="form-group">
								<label>
									<?php print __('Port');?> <span class="optional">(<?php print __('ranges are acceptable');?>)</span>
								</label>
								<input type="text"  class="vst-input form-control" name="v_port" <?php if (!empty($v_port)) echo "value=".$v_port; ?>>





							</div>

							<div class="form-group">
								<label>
									<?php print __('IP address');?> <span class="optional">(<?php print __('CIDR format is supported');?>)</span>

								</label>
								<input type="text"  class="vst-input form-control" name="v_ip" <?php if (!empty($v_ip)) echo "value=".$v_ip; ?>>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Comment');?> <span class="optional">(<?php print __('optional');?>)</span>
								</label>

								<input type="text"  class="vst-input form-control" name="v_comment" maxlength="8" <?php if (!empty($v_comment)) echo "value=".$v_comment; ?>>

							</div>

						</div>

						<div class="box-footer">
							<input type="submit" name="<?=$submitName ?>" value="<?php print $submitButtonName ?>" class="btn btn-primary">
							<input type="button" class="btn" value="<?php print __('Back');?>" onclick="<?php echo $back ?>">

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</form>