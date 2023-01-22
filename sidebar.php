<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="img/user.png" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $user['username']; ?>
            </div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>
                <?php echo $user['staff_type']; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <?php
        if (isset($_GET['dashboard'])) { ?>
            <?php if ($user['staff_type'] == 'admin' || $user['staff_type'] == 'staff'): ?>
                <li class="active">
                    <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                        Dashboard
                    </a>
                </li>
            <?php endif; ?>
        <?php } else { ?>
            <?php if ($user['staff_type'] == 'admin' || $user['staff_type'] == 'staff'): ?>
                <li>
                    <a href="index.php?dashboard"><em class="fa fa-dashboard">&nbsp;</em>
                        Dashboard
                    </a>
                </li>
            <?php endif; ?>
        <?php }
        if (isset($_GET['reservation'])) { ?>
            <li class="active">
                <a href="index.php?reservation"><em class="fa fa-calendar">&nbsp;</em>
                    Reservation
                </a>
            </li>
        <?php } else { ?>
            <li>
                <a href="index.php?reservation"><em class="fa fa-calendar">&nbsp;</em>
                    Reservation
                </a>
            </li>
        <?php }

        if (isset($_GET['room_mang'])) { ?>
            <?php if ($user['staff_type'] == 'admin' || $user['staff_type'] == 'staff'): ?>
                <li class="active">
                    <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                        Manage Rooms
                    </a>
                </li>
            <?php endif; ?>
        <?php } else { ?>
            <?php if ($user['staff_type'] == 'admin' || $user['staff_type'] == 'staff'): ?>
                <li>
                    <a href="index.php?room_mang"><em class="fa fa-bed">&nbsp;</em>
                        Manage Rooms
                    </a>
                </li>
            <?php endif; ?>
        <?php } ?>


    </ul>
</div>
<!--/.sidebar-->