<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("application","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/application.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormApplication', 'id' => 'AddFormApplication', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/application/createapplicationjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- name : Nom -->
		<label class="control-label" for="name">* 
			<?= lang('generated/application.form.name.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="name" id="name" required  >
			<span class="help-block valtype"><?= lang('generated/application.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- code : Code -->
		<label class="control-label" for="code">* 
			<?= lang('generated/application.form.code.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="code" id="code" required  >
			<span class="help-block valtype"><?= lang('generated/application.form.code.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- owner : Propriétaire -->
		<label class="control-label" for="owner">
			<?= lang('generated/application.form.owner.label') ?> :
		</label>
		<div class="controls">
			<select name="owner" id="owner"> 
				<option value=""></option>
				<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt->id ?>" ><?= $userElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/application.form.owner.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/application/createapplication.fancy.js"></script>
