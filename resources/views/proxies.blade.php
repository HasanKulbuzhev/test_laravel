<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="block proxynow"><p class="title one">Archive for 2024-06-20</p>
    <table id="resultTable" width="100%">
        <thead>
        <tr>
            <td>IP:PORT</td>
            <td>Location</td>
            <td>Proxy type</td>
            <td>Timeout</td>
            <td>IP</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        @foreach($proxies as $proxy)
            <tr>
                <td>{{ $proxy->url }}</td>
                <td><i class="flag-icon flag-icon-de"></i> {{ $proxy->location ?? '' }}</td>
                {{--    Я бы создал enum и закинул бы туда типы, плюс создал бы каст в модели, который выводит в текстовом виде тип прокси            --}}
                <td>{{ $proxy->type !== null && $proxy->type === CURLPROXY_SOCKS4? 'SOCKS4': 'HTTP' }}</td>
                <td>
                    <div class="speed"><span class="grn" style="width: 100%;">{{ $proxy->timeout . ' ms' }}</span></div>
                </td>
                <td> {{ $proxy->ip }}</td>
                <td>{{ $proxy->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
