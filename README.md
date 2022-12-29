## <p align="center">Password Store</p>



## Password Store Hakkında

Şifrelerinizi ortak bir web sitede saklayıp kişi hakları ile yönetebildiğiniz bir laravel altyapısı ile oluşturulmuş platformdur.

## Gereksinimler

- **[PHP 8.1](https://windows.php.net/download#php-8.1)**
- **[Composer 2.5.1](https://getcomposer.org/download/)**
- **[MariaDB 10.10.2](https://mariadb.org/download/?t=mariadb&p=mariadb&r=10.10.2&os=windows&cpu=x86_64&pkg=msi&m=nzbilisim)**
- **[Node JS](https://nodejs.org/en/download/)**
- **[Git](https://git-scm.com/downloads)**
- **[PHP Manager 1.5.0 for IIS 10](https://www.iis.net/downloads/community/2018/05/php-manager-150-for-iis-10)**
- **[Microsoft Visual C++ 2015-2022 Redistributable (x64)](https://learn.microsoft.com/en-us/cpp/windows/latest-supported-vc-redist?view=msvc-170)**
- **[URL Rewriter ](https://www.iis.net/downloads/microsoft/url-rewrite)**


## Kurulum

- Php download edip C: dizini altındaki PHP isimli klasöre çıkarınız.
- Ardından ```C:\inetpub\wwwroot``` klasöründe yayınlayacağınız içeriğe göre bir klasör yaratınız. Örn: PasswordManager
- Kurulumunu yaptığınız git ile şu komutla repository klon ediniz.
```
git clone https://github.com/HilaliAhmer/PasswordManager.git "C:\inetpub\wwwroot\PasswordManager"
```

- PHP Manager 1.5.0 for IIS 10 ve Url Rewriter kurulumunu yapınız.
- Ardından IIS'de PasswordManager isimli bir site oluşturup fiziksel pathine `C:\inetpub\wwwroot\PasswordManager\public` klasörünü yol olarak gösterip yayınlayınız.
- PasswordManager site'ı altında PHP managere giriş yapınız ve register new PHP version diyerek C dizini altında bulunan php-chi.exe dosyasını gösterip php ile register olunuz.
- Sonra tekrar `C:\inetpub\wwwroot\PasswordManager\` klasörüne gidiniz
- .env dosyasındaki database ayarlarınızı yapınız.
- `C:\inetpub\wwwroot\PasswordManager\` klasörü içerisinde bir terminal açarak sırası ile aşağıdaki komutları yürütünüz.
```
composer install
npm install
npm run production
php artisan key:generate
php artisan migrate
```






## Lisans

[MIT license](https://opensource.org/licenses/MIT).
