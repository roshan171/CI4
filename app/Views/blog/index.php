<!-- blog/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Blog Management</h1>

        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPostModal">Add Post</button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= $post['id']; ?></td>
                        <td><?= $post['title']; ?></td>
                        <td><?= $post['content']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                             data-target="#editPostModal<?= $post['id']; ?>">Edit</button>
                            <a href="<?php echo base_url('blog-delete/'.$post['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
    
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Post Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Post Form -->
                    <?= view('blog/create'); ?>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Post Modals -->
    <?php foreach ($posts as $post): ?>
        <div class="modal fade" id="editPostModal<?= $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel<?= $post['id']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPostModalLabel<?= $post['id']; ?>">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Post Form -->
                        <?= view('blog/edit', ['post' => $post]); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
