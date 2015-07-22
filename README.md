# SubPage
wordpress插件，可方便的在任何现有主题模板基础上扩展自定义页面和自定义widgets。简单的说，就是可以将你自己编写的页面和WP进行整合，能极大提高站点的灵活性，方便扩展各种功能。


>**注意** 此插件只是为WP扩展一个可自由制定页面的接口，本身并不包含任何页面和内容，所以，本扩展不是给最终用户使用的，而是给开发人员使用的，方便插入自己编写的代码，形成一个功能更强大的WP站点。

##安装

>将subpage目录复制到WP的插件目录（wp-content/plugins/）。这是插件主体
>将WP_ROOT目录下的文件复制到WP根目录，这是扩展出的示例框架，你可以在此基础上编写自己的代码，也可以删除，自行编写所需页面处理罗辑。
>登录WP后台，在插件中启用subpage扩展。


##使用
>**提示** 若您没有使用`WP_ROOT`中的代码，而是自行编写，可以忽略下面的内容。请修改插件主体的`index.php`文件，将`$subpage_template`修改为您自己的公共模板入口。
###page
>将WP_ROOT目录下的文件复制到WP根目录后，所有页面会自动引入`core/core.php`文件。若有全局函数需要加载可以编辑此文件，使用require引入自己的全局文件。
>将编写的页面放入`page`文件夹下，就可以通过网址`/?pagename`直接访问，如果有子目录，目录之间用`.`分割。例如：
```php
访问page/user/login.php文件，可以使用地址 http://yourwebsite.com/?user.login
访问page/user/new/add.php文件，可以使用地址 http://yourwebsite.com/?user.new.add
访问page/show.php文件，可以使用地址 http://yourwebsite.com/?show

传入参数id=1,name=2
http://yourwebsite.com/?user.new.add&id=1&name=2

```

>page/index.php文件是subpage的默认模板入口。所有其他页面都是通过这个页面加载。所以header,footer都可以在这里设置，WP内置函数在这个文件中有效。
###widget
>widget目录中存放的是自定义widget，自定义widget可以在管理后台通过给当前主题添加`小工具`，添加`subpage_super_widget`实现。添加subpage_super_widget后，在widget中设置自定义widget在widget文件夹中的位置，文件夹用`.`间隔，没有扩展名。例如：
```php
要调用widget/user/user_login.php，在subpage_super_widget的widget中设置user.user_login

```
**需要向widget中传递参数，可以在`subpage_super_widget`的设置中，config栏里直接以php格式设置参数，如设置`$conf=array(0,1,3);`,在widget代码中可以直接访问到$conf变量。**

###sidebar
subpage默认提供了一个sidebar，预留给可以自定义sidebar的主题使用，若要添加其他sidebar，可以自行修改index.php,复制sidebar模板自行添加，注意修改id。

###css和js
css和js文件夹分别存放css和js，可以使用
```php
subpage_css('xxx.css');
subpage_js('xxx.js');
```
加载其中的css和js文件。

###api
api文件夹功能相对独立，删除不影响其他功能，此目录提供了一个ajax访问的统一接口。使用ajax访问http://yourwebsite.com/api/?api=user.login，即可执行api/user/login.php的代码，并将结果通过apiout函数返回给浏览器，apiout返回格式化后的json数据，并且调用后停止页面执行。可以自行参照api目录中的示例。



