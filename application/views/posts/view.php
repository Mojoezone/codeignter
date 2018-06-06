<h2><?php echo $post['title']; ?></h2>
<div class="avatar-thumbnail">
  <img class="img-fluid img-thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" />
</div>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<br />
<div class="post-body">
  <p><?php echo $post['body']; ?></p>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr />
<a class="btn btn-secondary float-left mr-2" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
  <input type="submit" value="delete" class="btn btn-danger" ?>
</form>
<?php endif;?>
<!-- comments -->
<br />
<br />
<hr />
<h3>Comments</h3>
<?php if($comments) : ?>
  <?php foreach($comments as $comment) : ?>
    <div class="border mt-3 p-4">
      <h5><?php echo $comment['body']; ?> <br />[by <strong><?php echo   $comment['name']; ?></strong>]</h5>
    </div>
  <?php endforeach; ?>
<?php else : ?>
  <p>No Comments to Display!</p>
<?php endif; ?>

<br />
<hr />
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
<div calss="form-group">
  <label>Name</label>
  <input type="text" name="name" class="form-control" />
</div>
<div calss="form-group">
  <label>Email</label>
  <input type="text" name="email" class="form-control" />
</div>
<div calss="form-group">
  <label>Body</label>
  <textarea name="body" class="form-control" ></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>" />
<br />
<button class="btn btn-primary" type="submit">Submit</button>
</form>
