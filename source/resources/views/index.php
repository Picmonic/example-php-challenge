<table>

    <thead>
        <tr>Date</tr>
        <tr>Hash</tr>
        <tr>Author</tr>
    </thead>

    <tbody>

        <?php foreach ($commits as $commit): ?>
            <tr>
                <td><?= $commit['commit']['author']['date']; ?></td>
                <td><?= substr($commit['sha'], 0, 7); ?></td>
                <td><?= $commit['commit']['author']['name']; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>
