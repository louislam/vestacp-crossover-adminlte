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
									<?php print __('Domain');?>

								</label>
								<input type="text"  class="vst-input form-control" name="v_domain" <?php if (!empty($v_domain)) echo "value=".$v_domain;  ?> <? editDisabled($formName) ?>>

							</div>

							<div class="form-group">
								<label><input type="checkbox" size="20" class="vst-checkbox" name="v_antispam" <?php if ((empty($v_antispam)) || ($v_antispam == 'yes')) echo "checked=yes"; ?>> <?php print __('AntiSpam Support');?></label>

								<? if (isEditPage($formName)) : ?>
									<input type="hidden" name="v_domain" <?php if (!empty($v_domain)) echo "value=".$v_domain;  ?>>
								<? endif; ?>

							</div>

							<div class="form-group">
								<label><input type="checkbox" size="20" class="vst-checkbox" name="v_antivirus" <?php if ((empty($v_antivirus)) || ($v_antivirus == 'yes')) echo "checked=yes"; ?>> <?php print __('AntiVirus Support');?></label>

							</div>

							<div class="form-group">
								<label><input type="checkbox" size="20" class="vst-checkbox" name="v_dkim" <?php if (isset($v_dkim)&&$v_dkim == 'yes') echo "checked=yes"; ?>> <?php print __('DKIM Support');?></label>

							</div>

							<div class="form-group">
								<label>
									<?php print __('Catchall email');?>

								</label>
								<input type="text" class="vst-input form-control" name="v_catchall" <?php if (!empty($v_catchall)) echo "value=".$v_catchall;  ?> >

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