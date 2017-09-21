<?php if (!defined('THINK_PATH')) exit();?><!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="<?php echo (ADMIN_PUBLIC); ?>/assets/img/user.png" class="img-thumbnail" />

                    <div class="inner-text">
                        <?php echo ($value = session(username)); ?>
                        <br />
                        <small>Last Login : 3 Weeks Ago </small>
                    </div>
                </div>

            </li>
                <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
                    <a href="#"><i class="fa fa-desktop "></i><?php echo ($v["naviname"]); ?> <span class="fa arrow"></span></a>
                    <?php if(is_array($navp)): foreach($navp as $key=>$vp): if($v["id"] == $vp['pid']): ?><ul class="nav nav-second-level">
                                <li>
                                    <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i><?php echo ($vp["naviname"]); ?></a>
                                </li>
                            </ul><?php endif; endforeach; endif; ?>
                    </li><?php endforeach; endif; ?>

            <li>
                <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>控制台</a>
            </li>

           
            <li>
                <a href="#"><i class="fa fa-yelp "></i>系统设置 <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo U('Variable/Index');?>"><i class="fa fa-coffee"></i>自定义变量</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Variable/Setting');?>"><i class="fa fa-flash "></i>网站设置</a>
                    </li>
                    <li>
                        <a href="component.html"><i class="fa fa-key "></i>后台菜单</a>
                    </li>
                    <li>
                        <a href="social.html"><i class="fa fa-send "></i>新增菜单</a>
                    </li>

                    <li>
                        <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>

            </li>
            <li>
                <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
                    </li>
                    <li>
                        <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
            </li>
            <li>
                <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
            </li>
            <li>
                <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>

            <li>
                <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
            </li>
        </ul>

    </div>

</nav>