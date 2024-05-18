<!-- Thanh bên -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Thương hiệu Thanh bên -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/dashboard.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quản Lý Quang Huy</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Mục Thanh bên - Bảng điều khiển -->
    <li class="nav-item active">
        <a class="nav-link" href="../admin/dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bảng điều khiển</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Mục Thanh bên - Loại phòng -->
    <li class="nav-item">
        <a class="nav-link" href="../admin/add-category.php">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Loại phòng</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Mục Thanh bên - Chi tiết Phòng -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-bed"></i>
            <span>Phòng Mới</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chi Tiết Phòng</h6>
                <a class="collapse-item" href="../admin/add-room.php">Thêm Phòng</a>
                <a class="collapse-item" href="../admin/edit-room.php">Quản Lý Phòng</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Mục Thanh bên - Yêu Cầu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-info"></i>
            <span>Yêu Cầu</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Liên Hệ</h6>
                <a class="collapse-item" href="../admin/read-enquiry.php">Đọc Yêu Cầu</a>
                <a class="collapse-item" href="../admin/unread-enquiry.php">Yêu Cầu Chưa Đọc</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Mục Thanh bên - Thông Tin Đặt Phòng -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-book"></i>
            <span>Đặt Phòng</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chi Tiết Đặt Phòng</h6>
                <a class="collapse-item" href="../admin/all-booking.php">Tất Cả Đặt Phòng</a>
                <a class="collapse-item" href="../admin/new-booking.php">Đặt Phòng Mới</a>
                <a class="collapse-item" href="../admin/approved-bk.php">Đặt Phòng Đã Duyệt</a>
                <a class="collapse-item" href="../admin/cancelled-bk.php">Đặt Phòng Bị Hủy</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Mục Thanh bên - Người Dùng -->
    <li class="nav-item">
        <a class="nav-link" href="../admin/users.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Người Dùng</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- Kết thúc Thanh bên -->
