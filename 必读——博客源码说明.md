## Wolf Blog 博客源码开源共享

+ [作者博客地址](https://blog.wangjianbo.cn) 


欢迎加入群交流：652087037   【新建2000人群，等待发展】

使用源码后请在您的网站地址链接或说明来源【可选】

依赖Thinkphp5.1.12搭建，如果有使用的小伙伴可以浏览官方文档说明进行深入研究

文档地址：https://www.kancloud.cn/manual/thinkphp5_1/353946

之后还会继续更新Thinkphp版本

本地搭建建议使用PHPstudy环境，官方地址：http://www.phpstudy.net/

特别提醒：项目的访问目录是/public/

【网站默认是开启app_debug的，如需调试，请前往/config/app.php中自行开启或关闭】

搭建后的样式请预览同级目录下的demo.png文件

## 相关修改和添加说明

## 添加

 + 新建测试数据库
 
5.1.8版本更新后，我在/public/index.php中新增了自动添加数据库的代码，INSTALL_SQL 参数值默认为TRUE【自动执行数据库安装程序】

然后重新访问网站首页即可，否则第一次访问会有Thinkphp的错误页面提示！

【项目上线后请将INSTALL_SQL修改成FALSE或删除相关自行安装数据库的代码】

已经创建过文章数据库的可以跳过此步骤

数据库相关文件都在/extend/目录下

删除数据库后请记得同时删除/extend/installsql.lock文件 【installsql.lock 存在表示系统已经创建过博客测试数据库】

相关数据仅供测试使用

 + 常用定义
 
在 \application\Common\const.php、\application\Common\define.php、 \application\common.php 定义了项目会经常使用的一些常量和方法
其中 common.php 是Thinkphp自带的，任何分组都可以调用

const.php 和 define.php 是自定义的，如果需要使用，可以引入【参考 \application\Common\Controller\BaseController.php】

## 修改：

 + 对底层的唯一修改就是在 \thinkphp\library\think\db\Query.php 大概第1476行 有一个注释 必改之处

//必改之处：$where数组传入后字段丢失问题

//$where[] = is_null($val) ? [$key, 'NULL', ''] : [$key, '=', $val];

                    if (is_scalar($val)) {
					
                        $where[$key] = [$key, '=', $val];
						
                    } else {
					
                        array_unshift($val, $key);
						
                        $where[$key] = $val;
						
                    }

主要原因是因为习惯Thinkphp3.2的组合查询后在5.1中使用例如 ET、EGT、LT、ELT等方法会报错

如果你已经习惯了5.1的组合查询，可以不修改底层，因为如果习惯使用我修改的这段之后在更新Thinphp版本都必须记得修改这个位置

更新项目方法请使用官方文档中推荐的Composer update，不建议使用拷贝覆盖！！！

 + \config\template.php
 
// 模板后缀

    'view_suffix' => 'php',
	
默认使用的是html文件格式，博客改成了php，如果你习惯了html，可以替换回去

// 模板文件名分隔符 你可以自行修改

    'view_depr' => '_', 
	
博客使用的是下划线，官方默认使用的是斜杆，这样要在view下面再新建一个文件夹。

// 标签库标签开始标记

    'taglib_begin' => '<',
	
// 标签库标签结束标记

    'taglib_end' => '>',
	
默认的 taglib_begin和taglib_end分别是 '{' 和 '}' 

我这边改成了以前版本中常用的'<' 和 '>' 

如果习惯5.X写法的可以换回默认

 + 在项目中新增 Error.php 控制器 错误访问会自动指向404页面
 
     404默认调用官方的助手函数 abort 只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
	 
     404页面指定路径修改在 config\app.php 中 http_exception_template 修改

如有任何疑问请留言，地址：  https://blog.wangjianbo.cn/info/107/

