<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/pkg/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="../static/pkg/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="../static/js/jquery-3.7.1.min.js"></script>
</head>
<style>
    h1 {
        margin: 50px 0;
    }

    .navbar {
        background-color: #808080;
    }
</style>

<body>
    <!-- <div class="container"> -->
    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">欢迎
                <?php
                include_once "../model/public.php";
                session_start();
                echo $_SESSION['userName'];
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <table class="table table-dark table-striped">
        <tr>
            <th>工号</th>
            <th>姓名</th>
            <th></th>
        </tr>
        <tr>
            <td id="user-table"></td>
            <td id="user-td"></td>
            <td align="center">
                <button type="button" class="btn btn-danger">删除用户</button>
            </td>
        </tr>
        <tr>

        </tr>
    </table>
    <!-- </div> -->
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '../controllers/user/user.php',
                type: 'GET',
                dataType: "json",
                success: function (data) {
                    data.forEach(function (user) {
                        $('#user-td').append('<tr><td>' + user.username + '</td></tr>');
                        $('#user-table').append('<tr><td>' + user.uid + '</td></tr>');
                    });
                    // console.log(data);
                },
                error: function () {
                    // alert('failed to fetch users data.')
                }
            })
        })
        function add() {
            window.location.href = '../view/login.html'
        }
    </script>
</body>

</html>