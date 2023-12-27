<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Trace.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/trace/createtrace/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- Date de trace : Date de la trace -->
		<label for="dt_trace" class="col-2 col-form-label">* <?= lang('generated/Trace.form.dt_trace.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="dt_trace" 
				aria-describedby="dt_traceHelp" id="dt_trace" required  >
			<span id="dt_traceHelp" class="form-text">
				<?= lang('generated/Trace.form.dt_trace.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Application : Application tracée -->
		<label for="app_id" class="col-2 col-form-label">* <?= lang('generated/Trace.form.app_id.label') ?>
		</label>
		<div class="col-10">
			<select name="app_id" id="app_id" aria-describedby="app_idHelp" 
				class="form-control">
				<?php foreach ($applicationCollection as $applicationElt): ?>
				<option value="<?= $applicationElt['id'] ?>" ><?= $applicationElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="app_idHelp" class="form-text">
				<?= lang('generated/Trace.form.app_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Cible : Lien vers la cible -->
		<label for="target_id" class="col-2 col-form-label">* <?= lang('generated/Trace.form.target_id.label') ?>
		</label>
		<div class="col-10">
			<select name="target_id" id="target_id" aria-describedby="target_idHelp" 
				class="form-control">
				<?php foreach ($targetCollection as $targetElt): ?>
				<option value="<?= $targetElt['id'] ?>" ><?= $targetElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="target_idHelp" class="form-text">
				<?= lang('generated/Trace.form.target_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Détail : Détail sur le marquage -->
		<label for="detail" class="col-2 col-form-label"><?= lang('generated/Trace.form.detail.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="detail" 
				aria-describedby="detailHelp" id="detail"  >
			<span id="detailHelp" class="form-text">
				<?= lang('generated/Trace.form.detail.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/trace/listtraces/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/trace/createtrace.js"></script>
