<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?>藥要看</title><?php
        $trailDesc = '藥要看提供簡單的介面檢索國內有註冊登記的藥品資訊';
        if (!isset($desc_for_layout)) {
            $desc_for_layout = $trailDesc;
        } else {
            $desc_for_layout .= $trailDesc;
        }
        echo $this->Html->meta('description', $desc_for_layout);
        echo $this->Html->meta('icon');
        ?>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <?php
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('AdminLTE');
        echo $this->Html->css('default');
        ?>
        <style type="text/css">
            .table>tbody>tr>td { vertical-align:middle; }
            .dl-horizontal>dt {padding-top:6.5px}
        </style>
        <?php
        echo $scripts_for_layout;
        ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php echo $this->Html->link('藥要看', '/', array('class' => 'logo')); ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    &nbsp;
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" id="keyword" value="<?php echo isset($keyword) ? $keyword : ''; ?>" class="form-control" placeholder="搜尋..."/>
                        </div>
                        <div class="divider">&nbsp;</div>
                        <div class="btn-group-justified">
                            <a href="#" class="btn btn-default btn-find">一般搜尋</a>
                            <a href="#" class="btn btn-default btn-outward">外觀搜尋</a>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="<?php echo $this->Html->url('/drugs/index'); ?>">
                                <i class="fa fa-newspaper-o"></i> <span>藥物證書</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo $this->Html->url('/drugs/index/sort:License.submitted/direction:desc'); ?>"><i class="fa fa-angle-double-right"></i> 藥證更新</a></li>
                                <li><a href="<?php echo $this->Html->url('/drugs/index/sort:License.license_date/direction:desc'); ?>"><i class="fa fa-angle-double-right"></i> 新藥發證</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url('/drugs/outward'); ?>">
                                <i class="fa fa-photo"></i>
                                <span>藥物外觀</span>
                                <i class="fa pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url('/ingredients'); ?>">
                                <i class="fa fa-cogs"></i>
                                <span>藥物成份</span>
                                <i class="fa pull-right"></i>
                            </a>
                        </li>
                        <?php
                        switch (Configure::read('loginMember.group_id')) {
                            case '0':
                                ?><li>
                                    <a href="<?php echo $this->Html->url('/members/login'); ?>">
                                        <i class="fa fa-user"></i>
                                        <span>會員登入</span>
                                        <i class="fa pull-right"></i>
                                    </a>
                                </li><?php
                                break;
                            case '1':
                                ?>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-newspaper-o"></i> <span>會員管理</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo $this->Html->url('/admin/members/index'); ?>"><i class="fa fa-angle-double-right"></i> 會員</a></li>
                                        <li><a href="<?php echo $this->Html->url('/admin/groups/index'); ?>"><i class="fa fa-angle-double-right"></i> 群組</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Html->url('/members/logout'); ?>">
                                        <i class="fa fa-sign-out"></i>
                                        <span>會員登出</span>
                                        <i class="fa pull-right"></i>
                                    </a>
                                </li>
                                <?php
                                break;
                        }
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <footer class="footer" style="margin-left: auto;margin-right: auto; margin-bottom: 15px;">
            <div class="row" align="center">
                <hr />
                <?php echo $this->Html->link('江明宗 . 政 . 路過', 'http://k.olc.tw/', array('target' => '_blank')); ?>
                / <?php echo $this->Html->link('關於本站', '/pages/about'); ?>
                <?php
                if (isset($apiRoute)) {
                    echo ' / ' . $this->Html->link('本頁 API', $apiRoute, array('target' => '_blank'));
                }
                ?>
            </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <?php
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('olc');
        echo $this->Html->script('app');
        echo $this->Html->script('zhutil.min');
        echo $this->element('sql_dump');
        ?>
        <script type="text/javascript">
            //<![CDATA[
            $(function () {
                $('a.btn-find').click(function () {
                    var keyword = $('input#keyword').val();
                    if (keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/drugs/index/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });
                $('a.btn-outward').click(function () {
                    var keyword = $('input#keyword').val();
                    if (keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/drugs/outward/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });

            });
            //]]>
        </script>
    </body>
</html>
