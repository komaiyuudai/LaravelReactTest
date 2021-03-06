
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Intermediate</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Raleway';
            margin-top: 25px;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .table-text div {
            padding-top: 6px;
        }
    </style>

    <script>
        (function () {
            $('#task-name').focus();
        }());
    </script>
</head>

<body>
    <div id="content"></div>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">Member Management System</a>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="/auth/register"><i class="fa fa-btn fa-heart"></i>Register</a></li>
                            <li><a href="/auth/login"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
                        @else
                            <li class="navbar-text"><i class="fa fa-btn fa-user"></i>{{ Auth::user()->name }}</li>
                            <li><a href="/auth/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<form action="/member_use_service/add" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="member_use_service-service_id" class="col-sm-3 control-label">サービス</label>
        <div class="col-sm-6">
            <select name="service_id">
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->service_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="member_use_service-member_id" class="col-sm-3 control-label">会員</label>
        <div class="col-sm-6">
            <select name="member_id">
                @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <input type="hidden" name="deleted" value="0"></input>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-plus"></i>新規登録
            </button>
        </div>
    </div>

</form>
<script src="./js/dist/member_use_service.js"></script>
</body>

</html>
