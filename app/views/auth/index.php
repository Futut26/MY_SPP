
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$data['title'];?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="<?=BASE_URL?>/images/logo/logo_pandu.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/vendors/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/vendors/animate/animate.css">

<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/vendors/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/vendors/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/util.css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/css/main.css">

<meta name="robots" content="noindex, follow">
<script nonce="92702838-65b7-40c4-8f0b-58f7ed3f0b58">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
            <body>
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <div class="login100-pic js-tilt" data-tilt>
                        <img src="<?=BASE_URL?>/images/logo/logo_pandu.png" class="p-b-80" alt="IMG">
                        </div>
                        <form class="login100-form validate-form" action="<?=BASE_URL?>/Auth/login" method="POST">
                            <span class="login100-form-title">
                                 Silahkan Login
                            </span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="username" required placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-at" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" required name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                            Login
                            </button>
                        </div>
                        <div class="text-center p-t-10">
                        <?php Flasher::flash2(); ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

<script src="<?=BASE_URL?>/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="<?=BASE_URL?>/vendors/bootstrap/js/popper.js"></script>
<script src="<?=BASE_URL?>/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL?>/vendors/select2/select2.min.js"></script>
<script src="<?=BASE_URL?>/vendors/tilt/tilt.jquery.min.js"></script>
<script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-23581568-13');
</script>
<script src="<?=BASE_URL?>/vendors/js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"712d982f3be735a9","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>


