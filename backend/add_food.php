<?php
include "./include/header.php";
include "./include/env.php";
$query = "SELECT * from categories WHERE status = '1'";
$data = mysqli_query($conn, $query);
$categories = mysqli_fetch_all($data, 1);


?>


<h2>Banner</h2>


<div class="card mt-5 shadow">
    <div class="card-header bg-primary text-light">Add Foods Here</div>
    <div class="card-body">
        <form action="../controller/store_food.php" method="POST" enctype="multipart/form-data">
            <button type="submit" name="store_banner" class="float-right btn btn-primary">Add Foods</button>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <label for="food_img" class="w-100">
                        <img src="https://returntofreedom.org/store/wp-content/uploads/shop-placeholder.png" alt="" id="bannerImg" style="width: 100%;" class="bannerImg">
                    </label>
                    <input type="file" id="food_img" name="food_img" class="d-none inputImage">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="w-100">
                                Food Title
                                <input type="text" class="form-control" name="title">
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <label class="w-100">
                                Food Detail
                                <textarea name="detail" name="detail" class="form-control"></textarea>
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <label class="w-100">
                                Price
                                <input type="text" class="form-control" name="price">
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <label class="w-100">
                                Category
                                <select name="category_id" class="form-control">
                                    <option disabled selected>PLEASE CHOOSE A CATEGORY</option>
                                    <?php
                                    foreach ($categories as $category) {
                                    ?>
                                        <option value="<?= $category['id'] ?>"><?= ucwords($category['title']) ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </label>
                        </div>

                    </div>
                </div>
        </form>

    </div>
</div>


<?php
include "./include/footer.php";
?>