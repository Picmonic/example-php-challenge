<!DOCTYPE html>
<html lang="en">

<head>

    <title>example-php-challenge &bull; By, Chris Kankiewicz</title>
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLES / FONTS -->
    <link href="/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">

    <!-- SCRIPTS -->
    <script type="text/javascript" scr="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" scr="/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <table class="table">

            <thead>
                <th>Commit ID</th>
                <th>Date</th>
                <th>Author</th>
            </thead>

            <tbody>

                <?php foreach ($commits as $commit): ?>
                    <tr>
                        <td><?= substr($commit['sha'], 0, 7); ?></td>
                        <td><?= $commit['commit']['author']['date']; ?></td>
                        <td><?= $commit['commit']['author']['name']; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</body>

