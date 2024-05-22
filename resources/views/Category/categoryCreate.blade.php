<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header>
        <h1>カテゴリ追加</h1>
    </header>
    <section class="container">
            <div class="balance">
                <h3>カテゴリ一覧</h3>
                @if (session('flash_message'))
                    <div class="flash_message">
                        {{ session('flash_message') }}
                    </div><!-- /flash_message -->
                @endif
                @if (session('flash_error_message'))
                    <div class="flash_error_message">
                        {{ session('flash_error_message') }}
                    </div><!-- /flash_error_message -->
                @endif
                <table>
                    <thead>
                        <tr>
                            <th>カテゴリ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="button-td">
                                    <form action="{{ route('category.edit',['id'=>$category->id]) }}" method="">
                                        <input type="submit" value="変更" class="edit-button">
                                    </form>
                                    <form action="#" method="">
                                        @csrf
                                        <input type="submit" value="削除" class="delete-button">
                                    </form>
                                </td><!-- /button-td -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /balance -->

            <div class="categoryAdd-balance">
                <form action="{{ route('category.registrar') }}" method="POST">
                    @csrf
                    <label for="name">カテゴリ</label>
                    <input type="text" id="name" name="name">
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span> @endif

                    <div class="button-container">
                        <button type="submit" class="categoryCreate-button">追加</button>
                        <input type="button"  class="back-button" value="戻る" onclick="window.location.href='{{ url('/') }}'">
                    </div><!-- /button-container -->
                </form>
            </div><!-- /categoryAdd-balance -->
    </section><!-- /container -->
</body>
</html>