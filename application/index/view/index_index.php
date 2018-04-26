<div id="main">
    <div id="soutab">
    </div>
    <!-- /header -->
    <div id="container">
        <volist name='list' id='vo'>
            <section class="list">
                <span class="titleimg">
                    <a href="/info/{$vo.id}/">
                        <img width="270" height="165" src="/src/blog/image/default.png" data-original="{$vo.img|default='/src/blog/image/default.png'}" class="attachment-thumbnail wp-post-image" />
                    </a>
                </span>
                <div class="mecc">
                    <h2 class="mecctitle">
                        <a href="/info/{$vo.id}/">{$vo.title}</a> </h2>
                    <address class="meccaddress">
                        <time>{$vo.c_time}</time>
                        <a href='/?type={$vo.type}'>{$headernav['type'][$vo['type']]}</a>
                    </address>
                    <a href="/info/{$vo.id}/">
                        <p>
                            <?php echo $vo['desc'] ? htmlspecialchars_decode($vo['desc']) : '暂无简介'; ?>...
                            [查看全文]
                        </p>
                        <div class="readmore">
                            <a class="me_articleItem_readMore" href="/info/{$vo.id}/">
                                Read More –&gt;
                            </a>
                        </div>
                    </a>
                </div>
                <div class="clear"></div>
            </section>
        </volist>
        <div class="clear"></div>
        <!-- page start -->
        <div class="pageshow">
            {$page|raw}
        </div>
        <!-- page end -->
    </div>
    <!--Container-->
    <include file="public:aside" />
    <!-- /right -->
    <div class="clear"></div>
</div>
<!--main-->
<!--内容结束-->
