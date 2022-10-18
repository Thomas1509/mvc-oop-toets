<h3><?= $data['title'] ?></h3>

<table>
    <thead>
        <th>Id</th>
        <th>MyName</th>
        <th>Networth</th>
        <th>Age</th>
        <th>Company</th>
        <th>Delete</th>
    </thead>

    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?>/landingpages/index">back to landingpages</a></p>