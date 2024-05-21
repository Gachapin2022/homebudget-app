<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>{{ config('app.name') }}</h1>
    </header>
    <section class="container">
        <div class="balance">
            <h3>収支一覧</h3>
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
                        <th>日付</th>
                        <th>カテゴリ</th>
                        <th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homebudgets as $homebudget)
                        <tr>
                            <td>{{ $homebudget->date }}</td>
                            <td>{{ $homebudget->category->name }}</td>
                            <td>
                                @if ($homebudget->category->name == '収入')
                                    <span class="income">
                                @else
                                    <span class="payment">
                                @endif
                                {{ $homebudget->price }}</span>
                            </td>
                            <td class="button-td">
                                <form action="{{ route('homebudget.edit', ['id'=>$homebudget->id]) }}" method="">
                                    <input type="submit" value="更新" class="edit-button">
                                </form>
                                <form action="{{ route('homebudget.destroy', ['id'=>$homebudget->id]) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="削除" class="delete-button">
                                </form>
                            </td><!-- /button-td -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex">
                <div class="pagination">
                    {{ $homebudgets->links() }}
                </div><!-- /pagination -->
                <div class="flex total">
                    <p>収入合計：<span class="income">{{ $income }}円</p></span>
                    <p>収支合計：<span class="payment">{{ $payment }}円</p></span>
                </div><!-- /flex total-->
            </div><!-- /flex -->
        </div><!-- /balance -->

        <div class="add-balance">
            <h3>収支の追加</h3>

            <form action="{{ route('store') }}" method="POST">
                @csrf
                <label for="date">日付：</label>
                <input type="date" id="date" name="date">
                @if ($errors->has('date'))<span class="error">{{ $errors->first('date') }}</span>@endif

                <label for="category">カテゴリ：</label>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))<span class="error">{{ $errors->first('category') }}</span>@endif

                <label for="price">金額：</label>
                <input type="text" id="price" name="price">
                @if ($errors->has('price'))<span class="error">{{ $errors->first('price') }}</span>@endif

                <button type="submit">追加</button>
            </form>
        </div><!-- /add-balance -->
    </section><!-- /container -->
</body>
</html>