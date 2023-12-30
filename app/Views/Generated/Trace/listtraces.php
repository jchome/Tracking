<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Trace.form.list.title') ?></h2>
			<?php 
			$msg = session()->getFlashdata('msg_info');    if($msg != ""){echo '<div class="alert alert-info" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_confirm'); if($msg != ""){echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_warn');    if($msg != ""){echo '<div class="alert alert-warning" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_error');   if($msg != ""){echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';}
			
		?>
		
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
		<!-- table header auto-generated : -->
					<th class="sortable"><!-- dt_trace -->
						<a href="<?= base_url() ?>/Generated/trace/listtraces/index/dt_trace/<?= ($orderBy == 'dt_trace'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'dt_trace'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'dt_trace'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Trace.form.dt_trace.label') ?></a></th>
					<th class="sortable"><!-- app_id -->
						<a href="<?= base_url() ?>/Generated/trace/listtraces/index/app_id/<?= ($orderBy == 'app_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'app_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'app_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Trace.form.app_id.label') ?></a></th>
					<th class="sortable"><!-- target_id -->
						<a href="<?= base_url() ?>/Generated/trace/listtraces/index/target_id/<?= ($orderBy == 'target_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'target_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'target_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Trace.form.target_id.label') ?></a></th>
					<th class="sortable"><!-- detail -->
						<a href="<?= base_url() ?>/Generated/trace/listtraces/index/detail/<?= ($orderBy == 'detail'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'detail'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'detail'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Trace.form.detail.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_detail = array();
foreach($traces as $trace): 
?>
	<tr>

				<td valign="top"><?=$trace['dt_trace']?></td>
				<td valign="top"><?=($trace['app_id'] == 0)?(""):($applicationCollection[$trace['app_id']]['name'])?>
			</td>
				<td valign="top"><?=($trace['target_id'] == 0)?(""):($targetCollection[$trace['target_id']]['name'])?>
			</td>
				<td valign="top"><?=$trace['detail']?></td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/trace/edittrace/index/<?=$trace['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Trace.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/trace/listtraces/delete/<?=$trace['id']?>';}" 
							title="<?= lang('App.form.button.delete') ?>">
							<i class="bi bi-x"></i>
						</a>
					</td>
				</tr>
<?php 
endforeach; ?>

			</tbody>
		</table>
	
		<?php if(isset($pager)) { ?>
		<div class="row">
			<ul class="pagination">
			<?= $pager->links('bootstrap', 'bootstrap_pagination') ?>
			</ul>
		</div><!-- .pagination -->
		<?php } ?>
		
		<a href="<?= base_url('Generated/trace/createtrace/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Trace.form.create.title') ?></a>
	</div><!-- .container -->
	
	<hr>
	<button onclick="testTrace()" class="btn btn-primary">Tester</button>

<script src="<?= base_url() ?>/js/Generated/trace/listtraces.js"></script>

<script>
function testTrace() {

	const data = {
		app: 'estelle-serenity',
		target: 'massages',
		detail: 'test'
	}
	$.ajax({
		url: base_url() + "Client/AddTrace",
		method: "POST",
		headers: {'X-Requested-With': 'XMLHttpRequest'},
		data: data,
		success: function (result) {
			console.log(result);	
        }
    });
	
}
</script>
