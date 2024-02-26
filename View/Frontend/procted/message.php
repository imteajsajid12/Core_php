<?php if (isset($Success)) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $Success ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (isset($Delete)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?= $Delete ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (isset($Errors)) : ?>
    <?php foreach ($Errors as $key => $error) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $error ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

