<?php
include './include/header.php';
?>


<h2>Profile</h2>


<div class="card mt-5 shadow">
    <div class="card-header bg-primary text-light">Profile Settings Here ⚙</div>
    <div class="card-body">
        <form action="../controller/profile_update.php" method="POST" enctype="multipart/form-data">
            <button type="submit" name="profile_update" class="float-right btn btn-primary">Update 😃</button>
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <label for="profileImg" class="w-100">
                        <img id="profileImagePlaceHolder" src="<?= $auth['profile_img'] ? '../uploads/users/' . $auth['profile_img'] : 'https://avatars.dicebear.com/api/initials/' . $auth['first_name'] . '.svg' ?>" alt="<?= $auth['first_name'] ?>" style="width:250px; height: 250px;display:block; margin: auto; border-radius: 50%;object-fit:contain;">
                    </label>
                    <input type="file" id="profileImg" name="profile_img" class="d-none">
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="w-100">
                                First Name
                                <input type="text" class="form-control" name="f_name" value="<?= $auth['first_name'] ?>">
                                <?php
                                if (isset($_SESSION['errors']['f_name'])) {
                                ?>
                                    <span style="color: red;"><?= $_SESSION['errors']['f_name'] ?></span>
                                <?php
                                }

                                ?>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="w-100">
                                Last Name
                                <input type="text" class="form-control" value="<?= $auth['last_name'] ?>" name="l_name">
                                <?php
                                if (isset($_SESSION['errors']['l_name'])) {
                                ?>
                                    <span style="color: red;"><?= $_SESSION['errors']['l_name'] ?></span>
                                <?php
                                }

                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="w-100">
                                Email
                                <input type="text" class="form-control" name="email" value="<?= $auth['email'] ?>">
                                <?php
                                if (isset($_SESSION['errors']['email'])) {
                                ?>
                                    <span style="color: red;"><?= $_SESSION['errors']['email'] ?></span>
                                <?php
                                }

                                ?>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="w-100">
                                Phone
                                <input type="text" class="form-control" name="phone" value="<?= $auth['phone'] ?>">
                                <?php
                                if (isset($_SESSION['errors']['phone'])) {
                                ?>
                                    <span style="color: red;"><?= $_SESSION['errors']['phone'] ?></span>
                                <?php
                                }

                                ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


<div class="row">
    <div class="card shadow mt-4 col-lg-5 px-0">
        <div class="card-header bg-primary text-light">Reset Password 🔐 </div>
        <div class="card-body">
            <form action="../controller/password_reset.php" method="POST">
                <label class="w-100">
                    Old Password
                    <input type="text" class="form-control" name="old_psk">
                    <?php
                    if (isset($_SESSION['errors']['old_psk'])) {
                    ?>
                        <span style="color: red;"><?= $_SESSION['errors']['old_psk'] ?></span>
                    <?php
                    }

                    ?>
                </label>
                <label class="w-100">
                    New Password
                    <input type="text" class="form-control" name="new_psk">
                    <?php
                    if (isset($_SESSION['errors']['new_psk'])) {
                    ?>
                        <span style="color: red;"><?= $_SESSION['errors']['new_psk'] ?></span>
                    <?php
                    }

                    ?>
                </label>
                <label class="w-100">
                    Confirm Password
                    <input type="text" class="form-control" name="confirm_psk">
                    <?php
                    if (isset($_SESSION['errors']['confirm_psk'])) {
                    ?>
                        <span style="color: red;"><?= $_SESSION['errors']['confirm_psk'] ?></span>
                    <?php
                    }

                    ?>
                </label>
                <button class="btn-primary btn w-100" name="submit">Reset Password</button>
            </form>
        </div>
    </div>
</div>




<?php
include './include/footer.php';
unset($_SESSION['errors']);

?>