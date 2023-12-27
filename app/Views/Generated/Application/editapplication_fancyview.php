<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("application","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/application.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormApplication', 'id' => 'EditFormApplication', 'class' => 'form-horizontal');
$fields_info = array('id' => $application->id);
echo form_open_multipart('Generated/application/getapplicationjson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- Nom : Nom pour l'utilisateur -->
		<label class="col-md-2 control-label" for="name">* <?= lang('generated/application.form.name.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="name" id="name" value="<?= $application->name ?>" required  >
			<span class="help-block"><?= lang('generated/application.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Code : Code pour le système -->
		<label class="col-md-2 control-label" for="code">* <?= lang('generated/application.form.code.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="code" id="code" value="<?= $application->code ?>" required  >
			<span class="help-block"><?= lang('generated/application.form.code.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Propriétaire : Propriétaire de l'application -->
		<label class="col-md-2 control-label" for="owner"><?= lang('generated/application.form.owner.label') ?> :</label>
		<div class="controls">
		<select name="owner" id="owner" class="form-control">
			<option value=""></option>
			<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt->id ?>" <?= ($userElt->id == $application->owner)?("selected"):("")?>><?= $userElt->name ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/application.form.owner.description')?></span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2 col-xs-offset-2 col-xs-2">
				<button type="submit" class="btn btn-primary"><?= lang('form.button.save') ?></button>
			</div>
			<div class="col-md-offset-4 col-md-2 col-xs-offset-4 col-xs-2">
				<a data-dismiss="modal" href="#" type="button" class="btn btn-default"><?= lang('form.button.cancel') ?></a>
			</div>
		</div>
			
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->


<script src="<?= base_url() ?>/js/Generated/application/editapplication.fancy.js"></script>
