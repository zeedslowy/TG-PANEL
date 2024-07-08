<!DOCTYPE html>
<html>
<head>
    <title>Welcome Dashboard</title>
    <style>
        /* CSS stillerini buraya ekleyebilirsiniz */
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Run</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Run Python Script</h1>
            <form action="/run_python" method="post" enctype="multipart/form-data">
                <input type="file" name="python_file" accept=".py" required>
                <button type="submit">Run</button>
            </form>
        </section>

        <section>
            <h1>Account Settings</h1>
            <form action="/update_profile" method="post">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Update</button>
            </form>
        </section>
    </main>

    <script>
        // JavaScript kodunu buraya ekleyebilirsiniz
    </script>
</body>
</html>
