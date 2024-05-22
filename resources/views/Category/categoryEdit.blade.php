<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header>
        <h1>カテゴリ編集</h1>
    </header>

    <div class="edit-page">
        <div class="form-balance edit-balance">
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
                @method('put')
                <input type="hidden"  id="id" name="id" value="{{$category->id}}">
                <label for="name">カテゴリ</label>
                <input type="text" id="name" name="name" value="{{$category->name}}">
                @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span> @endif

                <div class="button-container">
                    <button type="submit" class="edit-button">更新</button>
                    <input type="button"  class="back-button" value="戻る" onclick="window.location.href='{{ url('/category') }}'">
                </div><!-- /button-container -->
            </form>
        </div><!-- /form-balance edit-balance -->
    </div><!-- /edit-page -->
</body>
</html>