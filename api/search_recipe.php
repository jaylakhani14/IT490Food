<?php

require "../db/db_config.php";
require "../include/api_session_check.php";
$auth = $_SESSION['auth'];
$title = isset($_POST['title']) ? $_POST['title'] : null;
$includeIngredients = isset($_POST['includeIngredients']) ? $_POST['includeIngredients'] : null;
$cuisine = isset($_POST['cuisine']) ? $_POST['cuisine'] : null;
$type = isset($_POST['type']) ? $_POST['type'] : null;
$url = 'https://api.spoonacular.com/recipes/complexSearch?apiKey=be7f9060c2ad4dae9e094291a14d27bf';

if (!is_null($title)) {
    $url .= "&query=$title";
}
if (!is_null($includeIngredients)) {
    $ingredients = "";
    foreach ($includeIngredients as $row) {
        $ingredients .= $row . ",";
    }
    $url .= "&includeIngredients=$ingredients";
}
if (!is_null($cuisine)) {
    $url .= "&cuisine=$cuisine";
}

if (!is_null($type)) {
    $url .= "&type=$type";
}

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

$data = curl_exec($curl);
$data = json_decode($data);
curl_close($curl);
?>
<div class="table-responsive">
    <table class="table table-bordered" id="td">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data->results as $row) {
            ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->title ?></td>
                <td><img src="<?= $row->image ?>" alt="img" style="height: 100px"></td>
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
