<?php
	$back = $_SESSION['back'];
	if (empty($back)) {
		$back = "location.href='/list/cron/'";
	} else {
		$back = "location.href='" . $back . "'";
	}
?>

<form id="vstobjects" name="<?=$formName ?>" method="post">
<div class="content-wrapper">
	<?php include "content_header.php" ?>

	<!-- Main content -->
	<section class="content">

		<? if ($formName == "v_edit_cron") : ?>
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
							<label><?php print __('Minute'); ?></label>
							<input type="number" class="vst-input form-control" name="v_min" <?php if (isset($v_min)) echo "value=" . $v_min; ?>>
						</div>

						<div class="form-group">
							<label><?php print __('Hour'); ?></label>
							<input type="number" class="vst-input form-control" name="v_hour" <?php if (isset($v_hour)) echo "value=" . $v_hour ; ?>>
						</div>

						<div class="form-group">
							<label><?php print __('Day'); ?></label>
							<input type="number" class="vst-input form-control" name="v_day" <?php if (isset($v_day)) echo "value=" . $v_day; ?>>
						</div>

						<div class="form-group">
							<label><?php print __('Month'); ?></label>
							<input type="number" class="vst-input form-control" name="v_month" <?php if (isset($v_month)) echo "value=" . $v_month ; ?>>
						</div>

						<div class="form-group">
							<label><?php print __('Day of week'); ?></label>
							<input type="number"  class="vst-input form-control" name="v_wday" <?php if (isset($v_wday)) echo "value=" . $v_wday ; ?>>

						</div>

						<div class="form-group">
							<label><?php print __('Command'); ?></label>
							<input type="text" class="vst-input long form-control" name="v_cmd" <?php if (isset($v_cmd)) echo "value='" . $v_cmd . "'"; ?>>

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