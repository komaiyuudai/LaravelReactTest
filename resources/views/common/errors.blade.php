@if (count($errors) > 0)
    <!-- フォームのエラーリスト -->
    <div class="alert alert-danger">
        <strong>error!</strong>

        <br><br>

        <ul>
            {{$errors->all()}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
