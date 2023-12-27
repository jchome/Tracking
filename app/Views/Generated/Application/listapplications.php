<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Application.form.list.title') ?></h2>
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
					<th class="sortable"><!-- name -->
						<a href="<?= base_url() ?>/Generated/application/listapplications/index/name/<?= ($orderBy == 'name'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'name'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'name'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Application.form.name.label') ?></a></th>
					<th class="sortable"><!-- code -->
						<a href="<?= base_url() ?>/Generated/application/listapplications/index/code/<?= ($orderBy == 'code'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'code'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'code'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Application.form.code.label') ?></a></th>
					<th class="sortable"><!-- owner -->
						<a href="<?= base_url() ?>/Generated/application/listapplications/index/owner/<?= ($orderBy == 'owner'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'owner'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'owner'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Application.form.owner.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_owner = array();
foreach($applications as $application):

?>
	<tr>

				<td valign="top"><?=$application['name']?></td>
				<td valign="top"><?=$application['code']?></td>
				<td valign="top"><?=($application['owner'] == 0)?(""):($userCollection[$application['owner']]['name'])?>
			</td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/application/editapplication/index/<?=$application['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Application.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/application/listapplications/delete/<?=$application['id']?>';}" 
							title="<?= lang('App.form.button.delete') ?>">
							<i class="bi bi-x"></i>
						</a>
					</td>
				</tr>
<?php 
endforeach; ?>

			</tbody>
		</table>
	
		<div class="row">
			<ul class="pagination">
			<?= $pager->links('bootstrap', 'bootstrap_pagination') ?>
			</ul>
		</div><!-- .pagination -->
		
		<a href="<?= base_url('Generated/application/createapplication/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Application.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/application/listapplications.js"></script>
