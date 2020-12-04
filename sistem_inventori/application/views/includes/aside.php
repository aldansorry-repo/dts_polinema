<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?php echo base_url('cooladmin/'); ?>images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?php echo base_url("Home") ?>">
                        <i class="fas fa-home"></i>Home</a>
                </li>

                <?php if ($this->session->userdata('is_loggedin') != null) : ?>
                    <li>
                        <a href="<?php echo base_url("Barang") ?>">
                            <i class="fas fa-archive"></i>Barang</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("Supplier") ?>">
                            <i class="fas fa-users"></i>Supplier</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("Login/logout") ?>">
                            <i class="fas fa-gear"></i>Logout</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="<?php echo base_url("Login") ?>">
                            <i class="fas fa-unlock"></i>Login</a>
                    </li>
                <?php endif ?>

            </ul>
            <script>
                $('[href*="<?php echo $this->uri->segment(1) ?>"]').parent().addClass("active");
            </script>
        </nav>
    </div>
</aside>