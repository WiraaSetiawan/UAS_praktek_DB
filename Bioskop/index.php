<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test</title>
</head>
<body>
<div class="flex items-center justify-center min-h-screen" style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9c8612ba-81b2-4fa8-a9e1-74a58a49d430/degyvjl-b80f50b9-d6cf-4fa0-a494-4340c7a27610.png/v1/fill/w_900,h_507,q_80,strp/nekopoi___download_av___h_sub_indonesia_official_by_nephi_chanmoe_degyvjl-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTA3IiwicGF0aCI6IlwvZlwvOWM4NjEyYmEtODFiMi00ZmE4LWE5ZTEtNzRhNThhNDlkNDMwXC9kZWd5dmpsLWI4MGY1MGI5LWQ2Y2YtNGZhMC1hNDk0LTQzNDBjN2EyNzYxMC5wbmciLCJ3aWR0aCI6Ijw9OTAwIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmltYWdlLm9wZXJhdGlvbnMiXX0.JRuyhgc5sCHPEjpMQ40q6JkYDT4ZaikRMF1mxBWPi6Y); background-size: cover; position: absolute; width: 100%; height: 100%">
        <div class="rounded-lg px-8 py-6 mt-4 text-left border border-transparent bg-transparent shadow-lg">
            <h3 class="text-2xl font-bold text-center">Login</h3>
            <form action="login.php" method="post">
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Username<label>
                                <input type="text" name="uname" placeholder="Username" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <label class="block">Password<label>
                                <input type="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="button1">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="w-full px-6 py-2 mt-4 text-black bg-red-200 rounded-lg hover:bg-red-300" type="submit">Login</button>
                    </div>
                    <button class="w-full px-6 py-2 mt-4 text-black bg-red-200 rounded-lg hover:bg-red-300"><a href="regis.php">Register</a></button>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>