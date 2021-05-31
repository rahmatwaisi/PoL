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
<div dir="rtl">
    
**مرحله دوم - انتقال فایل های مورد نیاز**
    
</div>


```shell

php artisan vendor:publish
# now choose: PoLServiceProvider

```

<div dir="rtl">
    
**مرحله سوم**

باید متد `callback` را در کنترلر `app\Http\Controllers\PaymentCallbackController::class` طبق نیاز خود ویرایش کنید.
چند راهکار به صورت `TODO` پیشنهاد شده است.

</div>

<div dir="rtl">

**مرحله چهارم - اضافه کردن یک مسیر برای دریافت اطلاعات پرداخت از درگاه**

_باید توجه داشت که این route نباید دارای هیچ middleware ی باشد._

</div>

```php
\Illuminate\Support\Facades\Route::any(
    '/payments/callback'
    , [
        Http\Controllers\PaymentCallbackController::class
        , 'callback'
    ]
);
```


<div dir="rtl">
    
**مرحله پایانی**

آخرین کاری که باید انجام دهید تغییر تنظیمات مربوط به درگاه و درج کلید پذیرندگی در آن است که باید فایل
`config/pol.php` را ویرایش کنید.
    
</div>


```php 
    
    /**
     * کلید پذیرندگی
     * Acceptance Key
     */

    'key' => 'INSERT_YOUR_KEY_HERE', 
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
### لایسنس

پکیج اتصال به درگاه پل کارت بصورت متن باز و تحت لایسنس [MIT license](https://opensource.org/licenses/MIT) قرار دارد.

</div>



