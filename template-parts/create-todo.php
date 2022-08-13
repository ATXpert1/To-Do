<!-- form to create new todo task -->
<form action="" method="post" class="row gx-1 mb-5">
  <div class="col-6  mb-3">
    <div class="input-group">
      <div class="input-group-text">New todo text</div>
      <textarea style="height: 10px" class="form-control todo__newPostContent" id="new-post" name="todo_text" rows="3" required></textarea>
    </div>
  </div>
  <div class="col-6 mb-3">
    <div class="input-group">
      <div class="input-group-text">Todo Date</div>
      <input class="form-control" type="datetime-local" id="todo_date" name="todo_date" required>
    </div>
  </div>
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" name="submit_post_action" class="btn btn-primary btn-block w-25" value="submit_post">Post</button>
  </div>
</form>

<?php
// handle new post event
if (isset($_POST['submit_post_action'])) {
  $post = array(
    'post_content'  => sanitize_textarea_field($_POST['todo_text']),
    'post_date' => $_POST['todo_date'],
    'post_status'   => 'open',
    'post_author'   => 1
  );

  // Insert the post into the database
  wp_insert_post($post);
}
?>