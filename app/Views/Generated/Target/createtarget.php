<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Target.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/target/createtarget/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- Application : lien vers l'application -->
		<label for="app_id" class="col-2 col-form-label">* <?= lang('generated/Target.form.app_id.label') ?>
		</label>
		<div class="col-10">
			<select name="app_id" id="app_id" aria-describedby="app_idHelp" 
				class="form-control">
				<?php foreach ($applicationCollection as $applicationElt): ?>
				<option value="<?= $applicationElt['id'] ?>" ><?= $applicationElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="app_idHelp" class="form-text">
				<?= lang('generated/Target.form.app_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Nom : Nom compréhensible par l'utilisateur -->
		<label for="name" class="col-2 col-form-label">* <?= lang('generated/Target.form.name.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="name" 
				aria-describedby="nameHelp" id="name" required  >
			<span id="nameHelp" class="form-text">
				<?= lang('generated/Target.form.name.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Code : Nom technique -->
		<label for="code" class="col-2 col-form-label">* <?= lang('generated/Target.form.code.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="code" 
				aria-describedby="codeHelp" id="code" required  >
			<span id="codeHelp" class="form-text">
				<?= lang('generated/Target.form.code.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Sélecteur : Selecteur dans la page -->
		<label for="selector" class="col-2 col-form-label"><?= lang('generated/Target.form.selector.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="selector" 
				aria-describedby="selectorHelp" id="selector"  >
			<span id="selectorHelp" class="form-text">
				<?= lang('generated/Target.form.selector.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/target/listtargets/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/target/createtarget.js"></script>
