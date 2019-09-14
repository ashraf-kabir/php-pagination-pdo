<?php
include 'db.php';
?>

<?php
// For Slecting from tabel name posts
$sql = "SELECT*FROM posts";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// Check If it exist
// $posts = $stmt->fetchAll();
//  foreach($posts as $post){
//      echo $post->title;
//  }
// Result per page you want
$result_per_page = 3;
// Number of results
$number_of_results = $stmt->rowCount();
// Number of pages
$number_of_pages = ceil($number_of_results / $result_per_page);
// Check will be from ajax
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
// Determine Limit
$this_page_first_result = ($page - 1) * $result_per_page;
// Finally Showing data

$sql = "SELECT * FROM posts ORDER BY `id` LIMIT " . $this_page_first_result . ',' . $result_per_page;
//var_dump($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
$output = '';
if ($stmt->rowCount() > 0) {
    foreach ($posts as $post) {?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo htmlentities($post->title); ?></td>
                                <td><?php echo htmlentities($post->author); ?></td>
                                <td><?php echo htmlentities($post->body); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php $cnt = $cnt + 1;
    }
}
// Pagination link
for ($i = max(1, $page - 2); $i <= min($page + 4, $number_of_pages); $i++) {
    if ($i == $page) {
        echo '<a style="cursor:pointer" class="pagination-link page-active" id="' . $i . '">' . $i . '</a>';
    } else {
        echo '<a style="cursor:pointer" class="pagination-link" id="' . $i . '">' . $i . '</a>';
    }
}
$check = $this_page_first_result + $result_per_page;
$next = $page + 1;
if ($number_of_results > $check) {
    echo '<a class="pagination-link" style="cursor:pointer" id="' . $next . '">Next</a>';
}
?>