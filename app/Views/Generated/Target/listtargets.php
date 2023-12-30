<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Target.form.list.title') ?></h2>
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
					<th class="sortable"><!-- app_id -->
						<a href="<?= base_url() ?>/Generated/target/listtargets/index/app_id/<?= ($orderBy == 'app_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'app_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'app_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Target.form.app_id.label') ?></a></th>
					<th class="sortable"><!-- name -->
						<a href="<?= base_url() ?>/Generated/target/listtargets/index/name/<?= ($orderBy == 'name'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'name'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'name'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Target.form.name.label') ?></a></th>
					<th class="sortable"><!-- code -->
						<a href="<?= base_url() ?>/Generated/target/listtargets/index/code/<?= ($orderBy == 'code'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'code'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'code'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Target.form.code.label') ?></a></th>
					<th class="sortable"><!-- selector -->
						<a href="<?= base_url() ?>/Generated/target/listtargets/index/selector/<?= ($orderBy == 'selector'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'selector'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'selector'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Target.form.selector.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_selector = array();
foreach($targets as $target):

?>
	<tr>

				<td valign="top"><?=($target['app_id'] == 0)?(""):($applicationCollection[$target['app_id']]['name'])?>
			</td>
				<td valign="top"><?=$target['name']?></td>
				<td valign="top"><?=$target['code']?></td>
				<td valign="top"><?=$target['selector']?></td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/target/edittarget/index/<?=$target['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Target.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/target/listtargets/delete/<?=$target['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/target/createtarget/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Target.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/target/listtargets.js"></script>
