<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    label,
    textarea {
        font-size: 0.8rem;
        letter-spacing: 1px;
    }

    form {
        text-align: center;
    }

    textarea {
        padding: 10px;
        max-width: 100%;
        line-height: 1.5;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 1px #999;
    }

    submit {
        padding: 10px;
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }
</style>
<body>
<form action="{{ route('proxies.check') }}" method="post">
    @csrf
    <label for="description">Введите список ваших прокси</label>
    <textarea name="proxies" id="" cols="30" rows="10">
    </textarea>
    <button>Отправить</button>
</form>

<ul>
    @foreach($groups as $groupId => $proxies)
        <li>
            <a href="{{ route('proxies.index', ['groupId' => $groupId]) }}" class="">
                Proxies at group {{ $proxies[0]->created_at }} {{ $groupId }} ({{ count($proxies) }} proxies)
            </a>
        </li>
    @endforeach
</ul>

</body>
</html>
