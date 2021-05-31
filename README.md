<p align="center"><a href="https://polcard.ir" target="_blank"><img src="https://user-images.githubusercontent.com/20902452/120212204-f2169e80-c246-11eb-8301-ba12bc6b1037.png" width="320"></a></p>

<p align="center">
<a href="https://packagist.org/packages/rahmatwaisi/pol-gateway"><img src="https://img.shields.io/packagist/dt/rahmatwaisi/pol-gateway?style=for-the-badge&&logo=composer" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rahmatwaisi/pol-gateway"><img src="https://img.shields.io/packagist/l/rahmatwaisi/pol-gateway?style=for-the-badge&&" alt="License"></a>
</p>
<div dir="rtl">

# پکیج اتصال به درگاه پرداخت پل کارت [polcard.ir](https://polcard.ir/ipg.php)

برای اتصال به درگاه پرداخت اینترنتی پل کارت و استفاده از api های آن می توانید از این پکیج استفاده کنید.

**توجه:**
این پکیج برای لاراول 6 به بعد قابل استفاده است.

---

**نصب**

برای نصب پکیج توسط `composer` مراحل زیر را به دقت دنبال کنید:

**مرحله اول**
</div>
    
```shell
composer require rahmatwaisi/pol-gateway
```

---

<div dir="rtl">
    
**مرحله دوم - انتقال فایل های مورد نیاز**
    
</div>


```shell

php artisan vendor:publish
# now choose: PoLServiceProvider

```

---

<div dir="rtl">

**مرحله سوم**

در این مرحله باید تنظیمات مربوط به درگاه و درج کلید پذیرندگی را انجام دهید که برای اینکار باید فایل
`config/pol.php` را ویرایش کنید.

</div>

```php 
    
    /**
     * کلید پذیرندگی
     * Acceptance Key
     */

    'key' => 'INSERT_YOUR_KEY_HERE', 
```

---

<div dir="rtl">
    
**مرحله چهارم**

باید متد `callback` را در کنترلر `app\Http\Controllers\PaymentCallbackController::class` طبق نیاز خود ویرایش کنید.
چند راهکار به صورت `TODO` پیشنهاد شده است.

</div>

---

<div dir="rtl">

**مرحله پایانی - اضافه کردن یک مسیر برای دریافت اطلاعات پرداخت از درگاه**

_باید توجه داشت که این route نباید دارای هیچ middleware ی باشد._

مسیر `payments/callback/` به عنوان `callback_route` به صورت پیشفرض در فایل کانفیگ پل کارت `config/pol.php` درج شده است
که می توانید آن را تغییر داده و مسیر جدید را به عنوان `callback_route` انتخاب کنید.
</div>

```php
\Illuminate\Support\Facades\Route::any(
    // TODO change this path if you want
    //   so if you changed this path, open config/pol.php and edit  callback_route key.
    '/payments/callback'
    , [
        Http\Controllers\PaymentCallbackController::class
        , 'callback'
    ]
);
```

    
<div dir="rtl">    
    
**نحوه استفاده**
    
</div>

```php
// ابتدا فاساد پکیج را ایمپورت کنید
use RahmatWaisi\PoL\Facade\PoL;


/*
 | در کنترلر یا متد مورد نظر کدهای زیر را استفاده کنید
 */
 
$price = 6480000; // 648 هزار تومان
$paymentId = 'asdf1234'; // تا حداکثر 30 کاراکتر

// درخواست توکن پرداخت
$token  = PoL::getToken($price, $paymentId);

// برای هدایت به صفحه پرداخت
PoL::pay( $token,  $paymentId);

// برای بررسی صحت تراکنش
PoL::verifyPayment( $token,  $price);

// برای تائید پرداخت موفق و دریافت شماره مرجع و شماره پیگیری
PoL::confirmPayment( $token, $price);

// برای اصلاحیه پرداخت ناموفق و درخواست لغو تراکنش و برگشت مبلغ به حساب دارنده کارت
PoL::reversePayment( $token);
```


---

<div dir="rtl">
    
**در صورت تمایل جهت همکاری در توسعه شامل:**

1. توسعه مستندات پکیج.
2. گزارش باگ و خطا.
3. افزودن سرویس های دیگر
4. ارتقاء کدها
5. نوشتن تست

درصورت بروز هر گونه
[باگ](https://github.com/rahmatwaisi/pol/issues)
ما را آگاه سازید .

---

### ارتباط با ما

- [Telegram](https://t.me/rahmatwaisi)
- [Email](mailto:rahmatwaisi@gmail.com)

---
</div>



<div dir="rtl">

### لایسنس
    
<p align="center">

پکیج اتصال به درگاه پل کارت بصورت متن باز و تحت لایسنس [MIT license](https://opensource.org/licenses/MIT) قرار دارد.

</p>

</div>

