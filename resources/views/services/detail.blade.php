
@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>{{$service->service_name}}</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                    </tr>
                    @foreach ($members as $member)
                        <tr>
                            <td class="table-text"><div>{{ $member->id }}</div></td>
                            <td class="table-text"><div>{{ $member->name}}></div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
