
<div class="container">

<h2>Cron jobs</h2>
    <?php 
    $msg = session()->getFlashdata('msg_info');    if($msg != ""){echo '<div class="alert alert-info" role="alert">' . $msg . '</div>';}
    $msg = session()->getFlashdata('msg_confirm'); if($msg != ""){echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';}
    $msg = session()->getFlashdata('msg_warn');    if($msg != ""){echo '<div class="alert alert-warning" role="alert">' . $msg . '</div>';}
    $msg = session()->getFlashdata('msg_error');   if($msg != ""){echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';}
    
?>

		
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Line</th>
                <th>Job</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php
$line = 0;
foreach($jobs as $job): 
?>
            <tr>
                <td>
                    <?= $line ?>
                </td>
                <td>
                    <?= $job ?>
                </td>
                <td>
                    <a class="btn btn-danger" href="#" 
                        onclick="if( confirm('Supprimer ce job ?')){document.location.href='<?= base_url() ?>/Cron/Jobs/delete/<?= $line ?>';}" 
                        title="<?= lang('App.form.button.delete') ?>">
                        <i class="bi bi-x"></i>
                    </a>
                </td>
            </tr>
<?php 
$line++;
endforeach; 
?>
        </tbody>
    </table>

    <hr>

<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
echo form_open_multipart('Cron/Jobs/add');
?>

        <div class="row mb-3">
            <label for="new" class="col-2 col-form-label">
                Ligne à ajouter
            </label>
            
            <div class="col-8">
                <input class="form-control" type="text" name="new" 
                aria-describedby="nameHelp" id="new" required >
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit">
                    Sauver
                </button>
            </div>
        </div>

<?php
echo form_close('');
?>
