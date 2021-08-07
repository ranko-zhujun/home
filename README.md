# 企业网站标准化模板  
开源免费的企业网站内容展示系统，使用PHP开发，基于YII2进行构建。

# 开源协议
GPL

# 注意事项
严禁使用本软件从事任何非法活动

# 安装步骤
1. 复制install目录下的dev文件至config目录下
2. 修改dev目录下的db.php中的数据库配置
3. 数据库导入SQL脚本,对应的脚本install目录下  
4. 默认密码：ranko/admin
5. 后台地址：index.php?r=site/login   

# 代码地址
码云：https://gitee.com/wx_ranko/home


# rewrite设置

```
Allow from all
RewriteEngine on

RewriteRule ^(.*)-(.*).html$ index.php?r=site/index&view=$1&id=$2
RewriteRule ^(.*).html$ index.php?r=site/index&view=$1
```

