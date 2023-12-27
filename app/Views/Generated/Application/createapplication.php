<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Application.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/application/createapplication/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- Nom : Nom pour l'utilisateur -->
		<label for="name" class="col-2 col-form-label">* <?= lang('generated/Application.form.name.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="name" 
				aria-describedby="nameHelp" id="name" required  >
			<span id="nameHelp" class="form-text">
				<?= lang('generated/Application.form.name.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Code : Code pour le système -->
		<label for="code" class="col-2 col-form-label">* <?= lang('generated/Application.form.code.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="code" 
				aria-describedby="codeHelp" id="code" required  >
			<span id="codeHelp" class="form-text">
				<?= lang('generated/Application.form.code.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Propriétaire : Propriétaire de l'application -->
		<label for="owner" class="col-2 col-form-label"><?= lang('generated/Application.form.owner.label') ?>
		</label>
		<div class="col-10">
			<select name="owner" id="owner" aria-describedby="ownerHelp" 
				class="form-control">
				<option value=""></option>
				<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt['id'] ?>" ><?= $userElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="ownerHelp" class="form-text">
				<?= lang('generated/Application.form.owner.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/application/listapplications/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/application/createapplication.js"></script>
