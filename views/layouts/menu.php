<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="header">Navigation SideBar</li>
            <!-- Optionally, you can add icons to the links -->

            <li><a href=<?= \yii\helpers\Url::to(['/person']) ?>><i class="fa fa-photo"></i> <span>People</span></a></li>
            <li><a href=<?= \yii\helpers\Url::to(['/brand']) ?>><i class="fa fa-photo"></i> <span>Brands</span></a></li>
            <li><a href=<?= \yii\helpers\Url::to(['/category']) ?>><i class="fa fa-columns"></i> <span>Categories</span></a></li>
            <li><a href=<?= \yii\helpers\Url::to(['/color']) ?>><i class="fa fa-money"></i> <span>Color</span></a></li>
            <li><a href=<?= \yii\helpers\Url::to(['/privilege']) ?>><i class="fa fa-user"></i> <span>Privilege</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Items</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/allitems']) ?>"><i class="fa fa-navicon"></i> <span>All Items</span></a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['/itemsold']) ?>"><i class="fa fa-columns"></i> <span>Items Sold</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
