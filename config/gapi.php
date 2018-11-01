<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Google Analytics API - Account E-Mail
|--------------------------------------------------------------------------
*/
$config['account_email'] 	= 'apimail@apimail.iam.gserviceaccount.com';

/*
|--------------------------------------------------------------------------
| Google Analytics API - P12 Key File
|--------------------------------------------------------------------------
*/
$config['p12_key'] 			= 'p12.p12'; // api için aldığınız p12 anahtarının konumunu belirtiyorsunuz ben direk library içine attım p12 dosyasını siz konumunu istediğiniz gibi ayarlayabilirsiniz. konumu library klasörüne göre vermeniz gerekmekte
/*
|--------------------------------------------------------------------------
| Google Analytics API - Profile ID
|--------------------------------------------------------------------------
*/
$config['ga_profile_id']	= '000000000'; // analytics'e girdiğiniz zaman url'de p'den sonra başlayan kısımda analytics account id'niz mevcut buraya o id girilecek