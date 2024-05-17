<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body { 
            background: #333;
            font-family: monospace;
        }
        h1, h3 { 
            color: #fff;
            text-align: center;
        }
        h3 {
            font-size: 12px;
        }
        p { 
            color: #fff;
            text-align: justify;
            margin: auto 10vh;
        }
    </style>
</head>
<body>
    <h1>{{ $P['title'] }}</h1>
    <h3>{{ $P['date'] }}</h3>
    <hr>
    <p>{{ $P['body'] }}</p>
</body>
</html>