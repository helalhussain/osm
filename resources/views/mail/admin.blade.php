<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">

        <div class="table-responsive">
            <h2 class="text-center pt-1 pb-1 text-primary"> Welcome to new user</h2>
            <table class="table table-light p-3 rounded-3">
                {{-- <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead> --}}
                <tbody class="p-2">
                    <tr class="">
                        <td scope="row">User type</td>
                        <td>Admin</td>

                    </tr>
                    <tr class="">
                        <td scope="row">Name</td>
                        <td>{{ $name }}</td>

                    </tr>
                    <tr class="">
                        <td scope="row">Email</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr class="">
                        <td scope="row">Password</td>
                        <td>{{ $password }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.login') }}" class="btn btn-dark text-center pt-2 text-white">Go to login</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>


{{-- <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:150px">Name</span>
                <b style="color:green;font-weight:normal;margin:0">{{ $request->name }}</b>
            </p>
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:150px">Email</span>
                <b style="color:green;font-weight:normal;margin:0">{{ $request->email }}</b>
            </p>
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:150px">Subject</span>
                <b style="color:green;font-weight:normal;margin:0">{{ $request->subject }}</b>
            </p>
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:150px">Message</span>
                <b style="color:green;font-weight:normal;margin:0">{{ $request->message }}</b>
            </p>
        </td>
    </tr> --}}
