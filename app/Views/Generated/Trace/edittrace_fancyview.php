<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("trace","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/trace.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormTrace', 'id' => 'EditFormTrace', 'class' => 'form-horizontal');
$fields_info = array('id' => $trace->id);
echo form_open_multipart('Generated/trace/gettracejson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- Date de trace : Date de la trace -->
		<label class="col-md-2 control-label" for="dt_trace">* <?= lang('generated/trace.form.dt_trace.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="dt_trace" id="dt_trace" value="<?= $trace->dt_trace ?>" required  >
			<span class="help-block"><?= lang('generated/trace.form.dt_trace.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Application : Application tracée -->
		<label class="col-md-2 control-label" for="app_id">* <?= lang('generated/trace.form.app_id.label') ?> :</label>
		<div class="controls">
		<select name="app_id" id="app_id" class="form-control">
			<?php foreach ($applicationCollection as $applicationElt): ?>
				<option value="<?= $applicationElt->id ?>" <?= ($applicationElt->id == $trace->app_id)?("selected"):("")?>><?= $applicationElt->name ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/trace.form.app_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Cible : Lien vers la cible -->
		<label class="col-md-2 control-label" for="target_id">* <?= lang('generated/trace.form.target_id.label') ?> :</label>
		<div class="controls">
		<select name="target_id" id="target_id" class="form-control">
			<?php foreach ($targetCollection as $targetElt): ?>
				<option value="<?= $targetElt->id ?>" <?= ($targetElt->id == $trace->target_id)?("selected"):("")?>><?= $targetElt->name ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/trace.form.target_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Détail : Détail sur le marquage -->
		<label class="col-md-2 control-label" for="detail"><?= lang('generated/trace.form.detail.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="detail" id="detail" value="<?= $trace->detail ?>"  >
			<span class="help-block"><?= lang('generated/trace.form.detail.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/trace/edittrace.fancy.js"></script>
