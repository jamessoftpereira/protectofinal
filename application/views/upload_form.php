<?php echo form_open_multipart('upload');  ?>
<p>
    <?php echo form_label('Archivo 1', 'userfile') ?>
    <?php echo form_upload('userfile') ?>
</p>
<p>
    <?php echo form_label('Archivo 2', 'userfile1') ?>
    <?php echo form_upload('userfile1') ?>
</p>
<p><?php echo form_submit('submit', 'Subir Archivos!') ?></p>
<?php form_close() ?>