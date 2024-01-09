<!-- blog/edit.php -->
<?= form_open('/blog/update'); ?>
    <input type="hidden" name="id" value="<?= $post['id']; ?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $post['title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea class="form-control" id="content" name="content" required><?= $post['content']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
<?= form_close(); ?>
