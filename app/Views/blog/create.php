<!-- blog/create.php -->

<?= form_open('/blog/store'); ?>
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" >
        <?php if(isset($validation) && $validation->hasError('title')): ?>
            <div class="text-danger"><?= $validation->getError('title'); ?></div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" name="content" ></textarea>
        <?php if(isset($validation) && $validation->hasError('content')): ?>
            <div class="text-danger"><?= $validation->getError('content'); ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
<?= form_close(); ?>
