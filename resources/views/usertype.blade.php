<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf  <label for="usertype">User Type:</label>
        <input type="text" name="usertype" id="usertype" required>

        <button type="submit">Create User</button>
    </form>
</body>
</html>
