<?php
include "./include/header.php";
?>


<h2>Banner</h2>


<div class="card mt-5 shadow">
    <div class="card-header bg-primary text-light">Add Banners Here</div>
    <div class="card-body">
        <form action="../controller/store_banner.php" method="POST" enctype="multipart/form-data">
            <button type="submit" name="store_banner" class="float-right btn btn-primary">Add Banner</button>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <label for="banner_img" class="w-100">
                        <img src="https://returntofreedom.org/store/wp-content/uploads/shop-placeholder.png" alt="" id="bannerImg" style="width: 100%;" class="bannerImg">
                    </label>
                    <input type="file" id="banner_img" name="banner_img" class="d-none inputImage">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="w-100">
                                Banner Title
                                <input type="text" class="form-control" name="title">
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <label class="w-100">
                                Banner Detail
                                <textarea name="detail" name="detail" class="form-control"></textarea>
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <label class="w-100">
                                Banner Video Clip
                                <input type="text" class="form-control" name="video">
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