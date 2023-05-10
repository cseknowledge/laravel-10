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

    <form method="POST" action="/uploadfile" enctype="multipart/form-data">
        @csrf
        <table border='1'>
            <tr>
                <td align='center' colspan='2'>Login</td>
            </tr>
            <tr>
                <td>File</td>
                <td><input type="file" id="file" name="file"></td>
            </tr>
            <tr>
                <td align='center' colspan='2'><input type="submit" value="Submit"></td>
            </tr>
        </table>

    </form>

</body>

</html>
