<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/client-assets/assets/css/error_404.css">
    <title>404 page</title>
</head>

<body>
    <div id="container">
        <div class="content">
            <h2>404</h2>
            <h4>Opps! Page not found</h4>
            <p>The page you were looking for doesn't exist. You may have mistyped the address or the page may have
                moved.</p>
        </div>
    </div>
</body>
<script type="text/javascript">
    var container = document.getElementById('container');
    window.onmousemove = function (e) {
        var x = e.clientX/5,
            y = e.clientY/5;
        container.style.backgroundPositionX = x + 'px';
        container.style.backgroundPositionY = y + 'px';

    }
</script>

</html>
