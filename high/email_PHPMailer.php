<?php
/** PHPMailer 是一个封装好的 PHP 邮件发送类，支持发送 HTML 内容的电子邮件，以及可以添加附件发送，并不像 PHP 本身 mail() 函数需要服务器环境支持，您只需要设置邮件服务器以相关信息就能实现邮件发送功能。
 * PHPMailer 项目地址：https://github.com/PHPMailer/PHPMailer
 * PHPMailer 需要 PHP 的 sockets 扩展支持，而登录 QQ 邮箱 SMTP 服务器则必须通过 SSL 加密，故 PHP 还得包含 openssl 的支持。
 * 参考博客 http://www.cnblogs.com/woider/p/6980456.html
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-25 18:29
 */

// 引入PHPMailer的核心文件
require_once __DIR__ . '/../lib/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../lib/PHPMailer/Exception.php';
require_once __DIR__ . '/../lib/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class QQMailer{
    public static $HOST = 'smtp.qq.com'; // QQ 邮箱的服务器地址
    public static $PORT = 465; // smtp 服务器的远程服务器端口号
    public static $SMTP = 'ssl'; // 使用 ssl 加密方式登录
    public static $CHARSET = 'UTF-8'; // 设置发送的邮件的编码

    private static $USERNAME = '1439293823@qq.com'; // 授权登录的账号
    private static $PASSWORD = 'hzqqmail525672'; // 授权登录的密码
    private static $NICKNAME = '何钊'; // 发件人的昵称

    /**
     * QQMailer constructor.
     * @param bool $debug [调试模式]
     */
    public function __construct($debug = false)
    {
        // 实例化PHPMailer核心类
        $this->mailer = new PHPMailer();
        // 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $this->mailer->SMTPDebug = $debug ? 1 : 0;
        // 使用smtp鉴权方式发送邮件
        $this->mailer->isSMTP();
    }

    /**
     * @return PHPMailer
     */
    public function getMailer(){
        return $this->mailer;
    }

    private function loadConfig(){
        /* Server Settings  */
        $this->mailer->SMTPAuth = true; // 开启 SMTP 认证
        $this->mailer->Host = self::$HOST; // SMTP 服务器地址
        $this->mailer->Port = self::$PORT; // 远程服务器端口号
        $this->mailer->SMTPSecure = self::$SMTP; // 登录认证方式
        /* Account Settings */
        $this->mailer->Username = self::$USERNAME; // SMTP 登录账号
        $this->mailer->Password = self::$PASSWORD; // SMTP 登录密码
        $this->mailer->From = self::$USERNAME; // 发件人邮箱地址
        $this->mailer->FromName = self::$NICKNAME; // 发件人昵称（任意内容）
        /* Content Setting  */
        $this->mailer->isHTML(true); // 邮件正文是否为 HTML
        $this->mailer->CharSet = self::$CHARSET; // 发送的邮件的编码
    }

    /**
     * Add attachment
     * @param $path [附件路径]
     */
    public function addFile($path){
        $this->mailer->addAttachment($path);
    }


    /**
     * Send Email
     * @param $email [收件人]
     * @param $title [主题]
     * @param $content [正文]
     * @return bool [发送状态]
     */
    public function send($email, $title, $content){
        $this->loadConfig();

        // 添加多个收件人
        if(is_array($email)){
            foreach ($email as $val){
                $this->mailer->addAddress($val); // 收件人邮箱
            }
        }else if(is_string($email)){ // 单个收件人
            $this->mailer->addAddress($email); // 收件人邮箱
        }

        $this->mailer->Subject = $title; // 邮件主题
        $this->mailer->Body = $content; // 邮件信息
        return (bool)$this->mailer->send(); // 发送邮件
    }
}



try {
// 实例化 QQMailer
    $mailer = new QQMailer(true);
// 添加附件
    $mailer->addFile('C:\Users\Administrator\Pictures\头像\IMG_1079 - 副本.jpg');
// 邮件标题
    $title = '愿得一人心，白首不相离。';
// 邮件内容
    $content = <<< EOF
<p align="center">
皑如山上雪，皎若云间月。<br>
闻君有两意，故来相决绝。<br>
今日斗酒会，明旦沟水头。<br>
躞蹀御沟上，沟水东西流。<br>
凄凄复凄凄，嫁娶不须啼。<br>
愿得一人心，白首不相离。<br>
竹竿何袅袅，鱼尾何簁簁！<br>
男儿重意气，何用钱刀为！</p>
EOF;
// 发送QQ邮件
    $mailer->send('hezhao_java@163.com', $title, $content);
    echo "邮件已发送成功";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}