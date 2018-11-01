# Codeigniter Altyapısı ile basit Google Analytics API Kullanımı

## Türkçe Anlatım ile

### Codeigniter veya herhangi bir MVC yapısı ile ilgili bir fikir sahibi değilseniz kısaca açıklayayım;

** Controllers Dizini **

Bu dizinde aslında sadece veri çekme ve işleme yapıyoruz. Kütüphaneleri, konfigürasyonları birleştirip işlemler yapıyoruz.

** Config Dizini **

Bu dizinde yapılandırma ayarlarımız mevcut. Google'dan almış olduğunuz API anahtar bilgilerinizin girişini daha sonra controller'da çekmek üzere bu dizindeki gapi.php dosyasında yapıyorsunuz.

** Libraries Dizini **

Bu dizinde google'ın sağlamış olduğu kütüphanenin CI için düzenlenmiş hali mevcut. Kalıtımları ve yapıcı metodları düzenlediğiniz zaman saf PHP ile de kullanılabilir. Uğraşmak istemem derseniz Google'ın [bu](https://developers.google.com/analytics/devguides/reporting/core/v4/) sayfasından yönergeleri takip ederek saf halini de edinebilirsiniz.

*Elimden geldiğince yorum satırlarında da kodları açıklamaya çalıştım eğer eksik anlatımım olduysa kusurum affola bildirirseniz elimden geldiğince düzeltmeye çalışırım.*
