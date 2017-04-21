# PublicFunction
PHP公共方法整理

php_header用法

//定义编码

header( 'Content-Type:text/html;charset=utf-8 ');

//Atom

header('Content-type: application/atom+xml');

//CSS

header('Content-type: text/css');

//Javascript

header('Content-type: text/javascript');

//JPEG Image

header('Content-type: image/jpeg');

//JSON

header('Content-type: application/json');

//PDF

header('Content-type: application/pdf');

//RSS

header('Content-Type: application/rss+xml; charset=ISO-8859-1');

//Text (Plain)

header('Content-type: text/plain');

//XML

header('Content-type: text/xml');

// ok

header('HTTP/1.1 200 OK');

//设置一个404头:

header('HTTP/1.1 404 Not Found');

//设置地址被永久的重定向

header('HTTP/1.1 301 Moved Permanently');

//转到一个新地址

header('Location: http://www.lemont.cn/');

//文件延迟转向:

header('Refresh: 10; url=http://www.lemont.cn/');

print 'You will be redirected in 10 seconds';//当然，也可以使用html语法实现//
<meta http-equiv="refresh" content="10;http://www.lemont.cn/ />

// override X-Powered-By: PHP:

header('X-Powered-By: PHP/4.4.0');

header('X-Powered-By: Brain/0.6b');

//文档语言

header('Content-language: en');

//告诉浏览器最后一次修改时间

$time = time() - 60; // or filemtime($fn), etc

header('Last-Modified: '.gmdate('D, d M Y H:i:s', $time).' GMT');

//告诉浏览器文档内容没有发生改变

header('HTTP/1.1 304 Not Modified');

//设置内容长度

header('Content-Length: 1234');

//设置为一个下载类型

header('Content-Type: application/octet-stream');

header('Content-Disposition: attachment; filename="example.zip"');header('Content-Transfer-Encoding: binary');

// load the file to send:readfile('example.zip');

// 对当前文档禁用缓存

header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the pastheader('Pragma: no-cache');

//设置内容类型:

header('Content-Type: text/html; charset=iso-8859-1');

header('Content-Type: text/html; charset=utf-8');header('Content-Type: text/plain'); 
//纯文本格式header('Content-Type: image/jpeg');
//JPG***header('Content-Type: application/zip'); 
// ZIP文件header('Content-Type: application/pdf'); 
// PDF文件header('Content-Type: audio/mpeg'); 
// 音频文件header('Content-Type: application/x-shockw**e-flash'); //Flash动画

//显示登陆对话框

header('HTTP/1.1 401 Unauthorized');

header('WWW-Authenticate: Basic realm="Top Secret"');
print 'Text that will be displayed if the user hits cancel or ';print 'enters wrong login data';



PHP header 函数的用法及其注意事项

void header ( string $string [, bool $replace = true [, int $http_response_code ]] ) : Send a raw HTTP header

下面有一些使用header的几种用法：
1、使用header函数进行跳转页面；
　　header('Location:'.$url);
　　其中$url就是将要跳转的url了。
　　这种用法的注意事项有以下几点： 
Location和":"之间不能有空格，否则会出现错误（注释：我刚测试了，在我本地环境下，没有跳转页面，但是也没有报错，不清楚什么原因）；
在用header前不能有任何的输出（注释：这点大家都知道的，如果header之前有任何的输出，包括空白，就会出现header already sent by xxx的错误）；
header 后面的东西还会执行的；
2、使用header声明content-type
　　header('content-type:text/html;charset=utf-8');
　　这个没有什么好说的；
3、使用header返回response 状态码
　　header(sprintf('%s %d %s', $http_version, $status_code, $description));
　　样式就是这样的；
　　例如：header('HTTP/1.1 404 Not Found');
4、使用header在某个时间后执行跳转
　　header("Refresh: {$delay}; url={$url}");
　　其中$delay就是推迟跳转的时间，$url为需要跳转的url
　　例如：header('Refresh: 10; url=http://www.lemont.cn/'); 意思为10s后跳转到http://www.lemont.cn这个网站
5、使用header控制浏览器缓存
　　header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
　　header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
　　header("Cache-Control: no-cache, must-revalidate");
　　header("Pragma: no-cache");
6、执行http验证
　　header('HTTP/1.1 401 Unauthorized');
　　header('WWW-Authenticate: Basic realm="Top Secret"');
7、使用header进行下载操作
　　header('Content-Type: application/octet-stream');//设置内容类型
　　header('Content-Disposition: attachment; filename="example.zip"'); 
  //设置MIME用户作为附件下载 如果将attachment换成inline意思为在线打开
　　header('Content-Transfer-Encoding: binary');//设置传输方式
　　header('Content-Length: '.filesize('example.zip'));//设置内容长度
　　// load the file to send:
　　readfile('example.zip');//读取需要下载的文件


php中一个header()跳转到另外一个页面后要加exit()
复制代码
 <?php
 //如果答完题就跳转到结果页面
 if($n==4){    
     header("Location:http://lemont.cn");
     exit();
 }
 
 $n = $n+1;
 file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."n.txt","00000000000000",LOCK_EX);
