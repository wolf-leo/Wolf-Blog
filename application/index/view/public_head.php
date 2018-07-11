<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
        <title>{$title|default=WEB_TITLE}</title>
        <link rel="stylesheet" href="/src/blog/css/blog-style.css?v=1.53" />
        <link rel="stylesheet" href="/src/blog/css/blog-pc.css?v=2.38" />
        <link rel="stylesheet" href="/src/blog/css/blog-ipad.css?v=1.85" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone.css?v=2.32" />
        <link rel="stylesheet" href="/src/blog/css/blog-phone2.css?v=1.70" />
        <script src="https://apps.bdimg.com/libs/jquery/2.0.3/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <header id="header-web">
            <div class="header-main">
                <hgroup class="logo">
                    <h1><a href="/" rel="home"><img src="/src/blog/image/logo.jpg" /></a></h1>
                </hgroup>
                <!--logo-->
                <nav class="header-nav">
                    <ul id="menu-nav" class="menu">
                        <li class="nav-logo">
                            <a href="/" rel="home"><img src="/src/blog/image/logo.jpg" /></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home">
                            <a href="/">首页</a>
                        </li>
                        <volist name="headernav.type" id="v">
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="/?type={$key}" <?php if (isset($type) && $type == $key): ?>class="current"<?php endif; ?>>{$v}</a>
                            </li>
                        </volist>
                    </ul>
                </nav>
                <!--header-nav-->
                <!--header-main-->
            </div>
        </header>
