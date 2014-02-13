<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-5-12
 * Time: 下午6:09
 * 账号管理
 */
class AccountAction extends BaseAction {

    private $type;

    // 构造函数
    public function __construct () {
        BaseAction::__construct();
    }

    public function apply () {
        $this->setTplParam('genInput', $this->genInput());
        $this->setTplParam('userInfo', $this->arrUser);
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/apply.tpl');

        $this->render();
    }

    public function checkcode () {
        // 生成验证码图片
        header("Content-type: image/png");
        // 要显示的字符，可自己进行增删
        $str = "0,1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
        $list = explode(",", $str);
        $cmax = count($list) - 1;
        $verifyCode = '';
        for ($i=0; $i < 5; $i++) {
            $randnum = mt_rand(0, $cmax);
            //取出字符，组合成为我们要的验证码字符
            $verifyCode .= $list[$randnum];
        }
        // 将字符放入SESSION中
        $_SESSION['code'] = $verifyCode;
        // 生成图片
        $im = imagecreate(58, 30);
        // 此条及以下三条为设置的颜色
        $black = imagecolorallocate($im, 0, 0, 0);
        $white = imagecolorallocate($im, 255, 255, 255);
        $gray = imagecolorallocate($im, 200, 200, 200);
        $red = imagecolorallocate($im, 255, 0, 0);
        // 给图片填充颜色
        imagefill($im, 0, 0, $white);
        // 将验证码绘入图片
        imagestring($im, 5, 10, 8, $verifyCode, $black);
        for($i = 0; $i < 100; $i++) {
            imagesetpixel($im, mt_rand(0, 255), mt_rand(0, 255), $black);
            imagesetpixel($im, mt_rand(0, 255), mt_rand(0, 255), $red);
            imagesetpixel($im, mt_rand(0, 255), mt_rand(0, 255), $gray);
            imagearc($im, mt_rand(0, 255), mt_rand(0, 255), 20, 20, 75, 170, $black);
            imageline($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), $red);
        }
        imagepng($im);
        imagedestroy($im);
    }

    public function execute ($context) {

        $this->type = $context[1];

        // function分发
        switch ($this->type) {
            case 'reset':
                break;
            case 'apply':
                $this->apply();
                break;
            case 'checkcode':
                $this->checkcode();
                break;
            default:
                to404();
                break;
        }
    }
}
