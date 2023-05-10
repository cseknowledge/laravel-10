<html>

<head>
    <title>Login Form</title>
</head>

<body>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/validation">
        @csrf
        <table border='1'>
            <tr>
                <td align='center' colspan='2'>Login</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" id="name" name="username" value=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" id="password" name="password" value=""></td>
            </tr>
            <tr>
                <td align='center' colspan='2'><input type="submit" value="Submit"></td>
            </tr>
        </table>

    </form>

</body>

</html>
