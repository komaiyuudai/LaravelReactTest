
@extends('layouts.app')
@section('content')

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

@endsection
