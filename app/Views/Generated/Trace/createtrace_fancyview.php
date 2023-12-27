<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("trace","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/trace.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormTrace', 'id' => 'AddFormTrace', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/trace/createtracejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- dt_trace : Date de trace -->
		<label class="control-label" for="dt_trace">* 
			<?= lang('generated/trace.form.dt_trace.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="dt_trace" id="dt_trace" required  >
			<span class="help-block valtype"><?= lang('generated/trace.form.dt_trace.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- app_id : Application -->
		<label class="control-label" for="app_id">* 
			<?= lang('generated/trace.form.app_id.label') ?> :
		</label>
		<div class="controls">
			<select name="app_id" id="app_id"> 
				<?php foreach ($applicationCollection as $applicationElt): ?>
				<option value="<?= $applicationElt->id ?>" ><?= $applicationElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/trace.form.app_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- target_id : Cible -->
		<label class="control-label" for="target_id">* 
			<?= lang('generated/trace.form.target_id.label') ?> :
		</label>
		<div class="controls">
			<select name="target_id" id="target_id"> 
				<?php foreach ($targetCollection as $targetElt): ?>
				<option value="<?= $targetElt->id ?>" ><?= $targetElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/trace.form.target_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- detail : Détail -->
		<label class="control-label" for="detail">
			<?= lang('generated/trace.form.detail.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="detail" id="detail"  >
			<span class="help-block valtype"><?= lang('generated/trace.form.detail.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/trace/createtrace.fancy.js"></script>
