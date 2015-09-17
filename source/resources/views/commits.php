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

    <nav class="navbar navbar-inverse">
        <div class="container">

            <div class="navbar-header">
                <a class="navbar-brand" href="/">example-php-challenge</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/">Latest Commits</a>
                    </li>
                    <li>
                        <a href="/by-author">Commits by Author</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">

        <table class="table">

            <thead>
                <th>Commit</th>
                <th>Author</th>
                <th>Email</th>
                <th>Date</th>
            </thead>

            <tbody>

                <?php foreach ($commits as $commit): ?>
                    <tr <?php if (is_numeric(substr($commit->sha, -1))): ?>class="info"<?php endif; ?>>
                        <td>
                            <a href="<?= $commit->url; ?>"><?= $commit->sha; ?></a>
                        </td>
                        <td><?= $commit->author_name; ?></td>
                        <td><?= $commit->author_email; ?></td>
                        <td><?= $commit->author_date; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</body>

