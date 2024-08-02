<div class="add-post">
    <h1>Add Post</h1>

    <?php
        echo $this->Form->create(null, ['url' => ['controller' => 'Posts', 'action' => 'add']]);
        echo $this->Form->control('title');
        echo $this->Form->control('subtitle');
        echo $this->Form->control('full_text', ['rows' => '3']);
        echo $this->Form->button('Add Post');
        echo $this->Form->end();
    ?>
</div>
