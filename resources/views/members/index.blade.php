
@extends('layouts.app')
@section('content')

<form action="/member/add" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="member-name" class="col-sm-3 control-label">名前</label>
        <div class="col-sm-6">
            <input type="text" name="name" value="{{ old('name') }}" id="member-name" class="form-control">
            <div class="alert-danger">{{$errors->first('name')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-sex" class="col-sm-3 control-label">性別</label>
        <div class="col-sm-6">
            <input type="radio" name="sex" value="0" @if (old('sex') == 0) checked @endif>男</input>
            <input type="radio" name="sex" value="1" @if (old('sex') == 1) checked @endif>女</input>
            <div class="alert-danger">{{$errors->first('sex')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-age" class="col-sm-3 control-label">年齢</label>
        <div class="col-sm-6">
            <input type="number" name="age" value="{{old('age')}}" id="member-age" class="form-control">
            <div class="alert-danger">{{$errors->first('age')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-street_address" class="col-sm-3 control-label">住所</label>
        <div class="col-sm-6">
            <select name="street_address_id">
                @foreach ($streetAddress as $val)
                    @if ($val->id == old('street_address_id'))
                        <option value="{{$val->id}}" selected>{{$val->prefecture_name}}</option>
                    @else
                        <option value="{{$val->id}}">{{$val->prefecture_name}}</option>
                    @endif
                @endforeach
            </select>
            <div class="alert-danger">{{$errors->first('street_address_id')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-mail_address" class="col-sm-3 control-label">メールアドレス</label>
        <div class="col-sm-6">
            <input type="email" name="mail_address" value="{{ old('mail_address') }}" id="member-mail_address" class="form-control">
            <div class="alert-danger">{{$errors->first('mail_address')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-tel" class="col-sm-3 control-label">電話番号</label>
        <div class="col-sm-6">
            <input type="tel" name="tel" value="{{ old('tel') }}" id="member-tel" class="form-control">
            <div class="alert-danger">{{$errors->first('tel')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-login_account" class="col-sm-3 control-label">ログイン名</label>
        <div class="col-sm-6">
            <input type="text" name="login_account" value="{{ old('login_account') }}" id="member-login_account" class="form-control">
            <div class="alert-danger">{{$errors->first('login_account')}}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="member-login_password" class="col-sm-3 control-label">ログインパスワード</label>
        <div class="col-sm-6">
            <input type="password" name="login_password" value="{{ old('login_password') }}" id="member-login_password" class="form-control">
            <div class="alert-danger">{{$errors->first('login_password')}}</div>
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


@if (count($members) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            会員一覧
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>会員一覧</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>性別</th>
                        <th>年齢</th>
                        <th>住所</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>ログイン名</th>
                        <th>ログインパスワード</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($members as $member)
                        <tr>
                            <form action="/member/edit" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $member->id }}"></input>
                            <td class="table-text"><div>{{ $member->id }}</div></td>
                            <td class="table-text"><div><input type="text" name="name" value="{{ $member->name}}"></input></div></td>
                            <td class="table-text">
                                <div>
                                @if ($member->sex == 0)
                                    <input type="radio" name="sex" value="0" checked>男</input>
                                    <input type="radio" name="sex" value="1">女</input>
                                @else
                                    <input type="radio" name="sex" value="0">男</input>
                                    <input type="radio" name="sex" value="1" checked>女</input>
                                @endif
                                </div>
                            </td>
                            <td class="table-text"><div><input type="number" name="age" value="{{ $member->age}}"></input></div></td>
                            <td class="table-text">
                                <div>
                                    <select name="street_address_id">
                                        @foreach ($streetAddress as $val) 
                                            @if ($val->id == $member->street_address_id)
                                            <option value="{{$val->id}}" selected>{{$val->prefecture_name}}</option>
                                            @else
                                            <option value="{{$val->id}}">{{$val->prefecture_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td class="table-text"><div><input type="email" name="mail_address" value="{{ $member->mail_address}}"></input></div></td>
                            <td class="table-text"><div><input type="tel" name="tel" value="{{ $member->tel}}"></input></div></td>
                            <td class="table-text"><div><input type="text" name="login_account" value="{{ $member->login_account}}"></input></div></td>
                            <td class="table-text"><div><input type="text" name="login_password" value="{{ $member->login_password}}"></input></div></td>

                            <!-- Task Edit Button -->
                            <td>
                                <button type="submit" id="edit-member-{{ $member->id }}" class="btn btn-edit">
                                        <i class="fa fa-btn fa-trash"></i>Edit
                                </button>
                            </td>
                            </form>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="/member/delete/{{ $member->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-member-{{ $member->id }}" class="btn btn-danger">
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
