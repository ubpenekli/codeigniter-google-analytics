<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gapi_ornek extends CI_Controller {
    public function index() {
		$this->load->config('gapi'); // gapi configuration çağırıyoruz
        $GAAPI_Params = [ 'client_email' => $this->config->item('account_email'), 'key_file' => $this->config->item('p12_key') ]; // gapi parametrelerini giriyoruz
        $this->load->library('gapi', $GAAPI_Params); // girdiğimiz parametrelerle kütüphaneyi çağırıyoruz

        $this->gapi->requestReportData(
			$this->config->item('ga_profile_id'),
			array('date'),
			array(
				'pageviews',
				'uniquePageviews'
			),
			'date',
			'',
			date('Y-m-d', strtotime('-29 days')),
			date('Y-m-d'),
			1,
			500); // 1 aylık verilerin sorgusu
        foreach($this->gapi->getResults() as $result)
        {
            $GAAPI_Data['Pageviews'][$result->getDate()] = $result->getPageviews(); // bugünlük çoğul hit
            $GAAPI_Data['UniquePageviews'][$result->getDate()] = $result->getUniquePageviews(); // bugünlük tekil hit
        }
        $Anasayfa_Veri['Analytics']['Aylik'] = $GAAPI_Data; // aylık grafik çıkarmak için bu kısmı aylık değişkenine atadım

        $this->gapi->requestReportData(
			$this->config->item('ga_profile_id'),
			array('date'),
			array(
				'sessions',
				'uniquePageviews',
				'pageviews',
				'pageviewsPerSession',
				'avgSessionDuration',
				'bounceRate',
				'percentNewSessions'
			),
			'date',
			'',
			date('Y-m-d', strtotime('-6 days')),
			date('Y-m-d'),
			1,
			500
		); // 1 haftalık verilerin sorgusu
        $GAAPI_Data['Sessions'] = $this->gapi->getSessions(); // oturumlar
        $GAAPI_Data['UniquePageviews'] = $this->gapi->getUniquePageviews(); // tekil hit
        $GAAPI_Data['Pageviews'] = $this->gapi->getPageviews(); // çoğul hit
        $GAAPI_Data['PageviewsPerSession'] = $this->gapi->getPageviewsPerSession(); // oturum bazlı hit
        $GAAPI_Data['AvgSessionDuration'] = $this->gapi->getAvgSessionDuration(); // ortalama ziyaret süresi
        $GAAPI_Data['BounceRate'] = $this->gapi->getBounceRate(); // hemen çıkma oranı
        $GAAPI_Data['PercentNewSessions'] = $this->gapi->getPercentNewSessions(); // yeni oturum yüzdesi

        foreach($this->gapi->getResults() as $result)
        {
            $GAAPI_Data['Gun']['Sessions'][$result->getDate()] = $result->getSessions();
            $GAAPI_Data['Gun']['UniquePageviews'][$result->getDate()] = $result->getUniquePageviews();
            $GAAPI_Data['Gun']['Pageviews'][$result->getDate()] = $result->getPageviews();
            $GAAPI_Data['Gun']['PageviewsPerSession'][$result->getDate()] = $result->getPageviewsPerSession();
            $GAAPI_Data['Gun']['AvgSessionDuration'][$result->getDate()] = $result->getAvgSessionDuration();
            $GAAPI_Data['Gun']['BounceRate'][$result->getDate()] = $result->getBounceRate();
            $GAAPI_Data['Gun']['PercentNewSessions'][$result->getDate()] = $result->getPercentNewSessions();
        }

        $Anasayfa_Veri['Analytics']['Haftalik'] = $GAAPI_Data; // haftalık verileri ayrıca okuyorum bu kısımda bunları da ayrıca yazdırıyorum

        $this->load->view('gapi_oku',$Anasayfa_Veri); // view atamıyorum ne yazık ki çok fazla dosya çağırmam gerekeceği için, içinizden geldiğince düzenleyebilirsiniz
	}
}
?>