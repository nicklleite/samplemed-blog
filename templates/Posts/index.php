<div class="posts">
    <h1>Posts</h1>

    <div class="post-list">
        <div class="message" style="display: none;"></div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function () {
        let posts = [];

        $.ajax({
            url: '/api/posts',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                posts = response.posts;
                console.log(posts.length);
                let postList = $('.post-list');

                if posts.length === 0) {
                    $('.message').text('No posts found.').show();
                    return;
                }

                $.each(posts, function (index, post) {
                    postList.append('<div class="post" data-id="' + post.id + '"><h2>' + post.title + '</h2><p>' + post.body + '</p></div>');
                });
            },
            error: function () {
                $('.message').text('An error occurred while loading posts.').show();
            }
        });
    });
</script>
