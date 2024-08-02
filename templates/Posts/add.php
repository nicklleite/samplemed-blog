<div class="add-post">
    <h1>Add Post</h1>

    <?php
    echo $this->Form->create(null, ["id" => "newPostForm", "action" => ""]);
    echo $this->Form->control('title');
    echo $this->Form->control('subtitle');
    echo $this->Form->control('full_text', ['rows' => '3']);
    echo $this->Form->button('Add Post', ["id" => "add-post"]);
    echo $this->Form->end();
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function () {
        $('#newPostForm').submit(function (event) {
            event.preventDefault();

            let title = $('#title').val();
            let subtitle = $('#subtitle').val();
            let fullText = $('#full_text').val();

            $.ajax({
                url: '/api/posts',
                type: 'POST',
                dataType: 'json',
                data: {
                    title: title,
                    subtitle: subtitle,
                    full_text: fullText
                },
                success: function (response) {
                    console.log(response);
                    alert('Post added successfully.');
                },
                error: function () {
                    alert('An error occurred while adding post.');
                }
            });
        });
    });
</script>
