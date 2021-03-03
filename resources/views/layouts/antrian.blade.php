<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

    </style>

    <title>Antrian SPP</title>
</head>

<body>
    <nav class="navbar" style="border-bottom: 3px solid#0d6efd">
        <div class="container-fluid">
            <div class="navbar-brand mx-auto py-3">
                <img class="rounded" src="{{ asset('/assets/images/logo-light.png') }}" alt="logo">
            </div>
        </div>
    </nav>

    <div id="app">
        <router-view></router-view>
    </div>

    <footer class="bg-primary bg-gradient text-center text-white p-3">
        <h1 id="time">0 : 0 : 0</h1>
        <h3>Sun, 20 Feb 2020</h3>
    </footer>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <script src="{{ mix('/js/app.js') }}"></script>

    <script>
        let time = document.getElementById('time')

        function refreshTime() {
            let h = new Date().getHours()
            let m = new Date().getMinutes()
            let s = new Date().getSeconds()
            let formated = `${h} : ${m} : ${s}`
            time.innerHTML = formated
        }
        setInterval(refreshTime, 1000)

    </script>
</body>

</html>
