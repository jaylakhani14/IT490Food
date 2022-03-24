<?php

require "../db/config.php";
require "../include/api_session_check.php";
$auth = $_SESSION['auth'];

$url = 'https://api.spoonacular.com/recipes/random?apiKey=be7f9060c2ad4dae9e094291a14d27bf&number=100';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

$data = curl_exec($curl);
$data=json_decode($data);
curl_close($curl);
?>
<div class="table-responsive">
    <table class="table table-bordered" id="td">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Ready In Minutes</th>
            <th>Servings</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data->recipes as $row) {
            ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->title ?></td>
                <td><img src="<?= $row->image ?>" alt="img" style="height: 100px"></td>
                <td><?= $row->readyInMinutes ?></td>
                <td><?= $row->servings ?></td>
                <th>
                    <div class="btn-group">
                        <a
                                href="recipe_detail.php?id=<?= $row->id ?>"
                                class="btn btn-info btn-sm text-white ml-2">
                            View
                        </a>
                    </div>
                </th>
            </tr>
            <?php
        } ?>
        </tbody>
    </table>
</div>
