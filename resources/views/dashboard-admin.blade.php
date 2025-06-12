<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <p>This is your dashboard.</p>

    <form method="POST" action="{{ route('adminmentor.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
