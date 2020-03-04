# -PHP-message-board
PHP简单留言版开发
### 前言
经过两天的奋斗，终于把一套简单的PHP留言板开发完成了。这套源码从前台到后台，最后到数据库都是一步一步来完成的，主要是为了熟悉一下PHP开发的基本流程和一些功能点的设计思路，为了接下来的代码审计做准备。

* * *
### 前期准备
首先设计前端页面，前端页面主要使用的boostraps框架(因为这个框架简单好用23333...)。自己也不会前端，所以用到什么就去Boostrap官网现找。
其次是设计数据库，数据库的话需要三张表：user表，comment表，admin表。
设计代码如下：
comment：
```
create table comment(
    id int unsigned not null auto_increment,
    comment varchar(255) not null,
    primary key(id)
)engine=MyISAM default charset=utf8 comment "评论表"
```

* * *
user表
```
create table user(
    id int unsigned not null auto_increment,
    username varchar(255) not null ,
    password varchar(255) not null ,
    email varchar(255) not null,
    comment varchar(255) not nul ,
    join_date date not null ,
    primary key(id),
    unique key(username),
    unique key(password)
)engine=MyISAM default charset=utf8;
```

* * *
admin表
```
create table admin(
    id int unsigned not null auto_increment,
    username varchar(255) not null,
    password varchar(255) not null,
    primary key(id)
)engine=MyISAM default charset=utf8

insert into admin(username,password) values ('admin','21232f297a57a5a743894a0e4a801fc3');
```

* * *
### 功能点分析
在设计后台代码的时候，首先是分析功能点，这个很重要。**因为大网站都是靠一个个小的功能点堆积起来的。**
这个留言板主要的功能为：
```
用户注册
用户登录
密码找回
个人信息设置(信息更新 头像上传)
留言发布
留言展示
前台留言分页展示
搜索界面
管理员后台登录
后台用户管理
后台留言管理
```
所以在写的时候，要一个功能一个功能的去实现。
