<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/User.form.list.title') ?></h2>
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
						<a href="<?= base_url() ?>/Generated/user/listusers/index/name/<?= ($orderBy == 'name'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'name'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'name'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/User.form.name.label') ?></a></th>
					<th class="sortable"><!-- login -->
						<a href="<?= base_url() ?>/Generated/user/listusers/index/login/<?= ($orderBy == 'login'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'login'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'login'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/User.form.login.label') ?></a></th>
					<th class="sortable"><!-- password -->
						<a href="<?= base_url() ?>/Generated/user/listusers/index/password/<?= ($orderBy == 'password'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'password'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'password'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/User.form.password.label') ?></a></th>
					<th class="sortable"><!-- email -->
						<a href="<?= base_url() ?>/Generated/user/listusers/index/email/<?= ($orderBy == 'email'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'email'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'email'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/User.form.email.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_email = array();
foreach($users as $user):

?>
	<tr>

				<td valign="top"><?=$user['name']?></td>
				<td valign="top"><?=$user['login']?></td>
				<td valign="top"><input type="hidden" name="password" id="password" value="<?=$user['password']?>">
			<span title="<?=$user['password']?>">&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;</span>
			</td>
				<td valign="top"><?=$user['email']?></td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/user/edituser/index/<?=$user['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/User.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/user/listusers/delete/<?=$user['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/user/createuser/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/User.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/user/listusers.js"></script>
