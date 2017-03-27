
@extends('layouts.app')
@section('content')

<form action="/service/add" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="service-name" class="col-sm-3 control-label">サービス名</label>
        <div class="col-sm-6">
            <input type="text" name="service_name" id="service-name" class="form-control">
            <div class="alert-danger">{{$errors->first('service_name')}}</div>
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


@if (count($services) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            サービス一覧
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>サービス一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>詳細</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($services as $service)
                        <tr>
                            <form action="/service/edit" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$service->id}}"></input>
                            <td class="table-text"><div>{{ $service->id }}</div></td>
                            <td class="table-text"><div><input type="text" name="service_name" value="{{ $service->service_name}}"></input></div></td>

                            <td>
                                <button type="submit" id="edit-service-{{ $service->id }}" class="btn btn-success">
                                        <i class=""></i>Edit
                                </button>
                            </td>
                            </form>

                            <td>
                                <form action="/service/detail/{{ $service->id }}" method="get">
                                    {{ csrf_field() }}

                                    <button type="submit" id="delete-service-{{ $service->id }}" class="btn btn-info">
                                        <i class=""></i>Detail
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form action="/service/delete/{{ $service->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-service-{{ $service->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif


@endsection
