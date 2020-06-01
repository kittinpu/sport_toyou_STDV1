<nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">

        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <img src="../img_member/<?php echo $s_member_photo; ?>" alt="user" class="rounded-circle img-thumbnail">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="text-overflow"><small><?php echo 'ยินดีต้อนรับคุณ ' . $s_member_username; ?></small> </h5>
                </div>

                <!-- item-->
                <a href="frm_update_profile.php" class="dropdown-item notify-item">
                    <i class="md md-account-circle"></i> <span>Profile</span>
                </a>

                <!-- item-->
                <a href="logout.php" class="dropdown-item notify-item">
                    <i class="md md-settings-power"></i> <span>Logout</span>
                </a>

            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
                <i class="dripicons-menu"></i>
            </button>
        </li>
    </ul>

</nav>