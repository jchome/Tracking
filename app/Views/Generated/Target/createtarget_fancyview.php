<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("target","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/target.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormTarget', 'id' => 'AddFormTarget', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/target/createtargetjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- app_id : Application -->
		<label class="control-label" for="app_id">* 
			<?= lang('generated/target.form.app_id.label') ?> :
		</label>
		<div class="controls">
			<select name="app_id" id="app_id"> 
				<?php foreach ($applicationCollection as $applicationElt): ?>
				<option value="<?= $applicationElt->id ?>" ><?= $applicationElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/target.form.app_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- name : Nom -->
		<label class="control-label" for="name">* 
			<?= lang('generated/target.form.name.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="name" id="name" required  >
			<span class="help-block valtype"><?= lang('generated/target.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- code : Code -->
		<label class="control-label" for="code">* 
			<?= lang('generated/target.form.code.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="code" id="code" required  >
			<span class="help-block valtype"><?= lang('generated/target.form.code.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- selector : Sélecteur -->
		<label class="control-label" for="selector">
			<?= lang('generated/target.form.selector.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="selector" id="selector"  >
			<span class="help-block valtype"><?= lang('generated/target.form.selector.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/target/createtarget.fancy.js"></script>
