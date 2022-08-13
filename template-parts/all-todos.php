<?php

global $wpdb;

// handle delete event
if (isset($_POST['delete_todo'])) {
    $wpdb->delete('wp_posts', array('ID' => $_POST['delete_todo']));
}

// handle update event
if (isset($_POST['update_todo'])) {
    // get input fields value
    $checkbox = htmlentities($_POST['todo_checkbox']);
    $text = htmlentities($_POST['todo_text']);
    $date = htmlentities($_POST['todo_date']);
    // set database value from checkbox
    if ($checkbox) {
        $checkbox = 'closed';
    } else {
        $checkbox = 'open';
    }
    $wpdb->update('wp_posts', array('ID' => $_POST['update_todo'], 'post_content' => $text, 'post_status' => $checkbox, 'post_date' => $date), array('ID' => $_POST['update_todo']));
}

// get all todo tasks
$all_todos = query_posts(
    array(
        'post_status' => 'any',
        'posts_per_page' => -1,
        'suppress_filters' => false,
        'post_type' => 'post',
        'order'     => 'ASC',
        'orderby'   => 'date',
    )
);

// loop through the array, for each todo task: render form with update, delete, checkbox, text, date
if ($all_todos) {
    foreach ($all_todos as $todo) {
        setup_postdata($todo); ?>
        <form method="post" class="border border-3 mb-4 p-2 align-items-center row row-cols-lg-auto">
            <div class="col-12 form-check form-switch">
                <input class="form-check-input" role="switch" type="checkbox" id="todo_checkbox" name="todo_checkbox" <?php echo ($todo->post_status == 'closed' ? 'checked' : ''); ?>>
                <label class="form-check-label" for="todo_checkbox">Mark as done</label>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-text">Text</div>
                    <input type="text" class="form-control" name="todo_text" id="todo_text" value="<?= $todo->post_content ?>" required>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-text">Date</div>
                    <input class="form-control" type="datetime-local" id="todo_date" name="todo_date" value="<?= $todo->post_date ?>" required>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" name="update_todo" value="<?= $todo->ID ?>" type="submit">Update</button>
                <button class="btn btn-danger" name="delete_todo" value="<?= $todo->ID ?>" type="submit">Delete</button>
            </div>
        </form>
<?php }
}
// restore global
wp_reset_postdata();
?>