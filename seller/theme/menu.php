<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="http://localhost/project/template_admin/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Seller</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/project/template_admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ผู้ขายสินค้า</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <!-- แทบรายงาน -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              รายงาน
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="index2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ประวัติการขาย</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="add-expenses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>จัดการค่าจัดส่ง</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="index3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>การจัดส่ง</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- แทบรายงาน -->

          <!-- จัดการสินค้า -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                จัดการสินค้า
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ข้อมูลสินค้า</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มสินค้า</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="order-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>การสั่งซื้อ</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- จัดการสินค้า -->

          <!-- โปรโมชั่น -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              จัดการโปรโมชั่น
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-promotion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>เพิ่มโปรโมชั่น</p>
                </a>
                </ul>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="promotion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>โปรโมชั่น</p>
                </a>
                </ul>
              </li>
          <!-- โปรโมชั่น -->

         
         <!-- แทบรายงาน -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              จัดการบัญชี
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-accounting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>จัดการรายรับ-รายจ่าย</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="accounting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>แสดงข้อมูล</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>