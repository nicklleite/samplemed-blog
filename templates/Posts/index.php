<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Samplemed - Blog</title>
    </head>
    <body>
        <h1>Posts</h1>

        <script>
            const url = "http://localhost:8765/api/posts";

            const response = await fetch(url, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            });

            const data = await response.json();
            console.log(data);
        </script>
    </body>
</html>
