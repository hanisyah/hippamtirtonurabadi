<?php
namespace Wablass;

class Wablass
{
    public function __construct()
    {
        $this->api_key      = env('WABLASS_API_KEY','');
        $this->url_endpoint = 'https://us.wablas.com/api';
    }

    public function curl($endpoint,$data,$httpGet = false)
    {
        $url = rtrim($this->url_endpoint,'/').'/'.ltrim($endpoint,'/');

        $header = [
            'Authorization: '.$this->api_key,
        ];

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_FRESH_CONNECT,true);
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_ENCODING,"");
        curl_setopt($curl,CURLOPT_MAXREDIRS,10);
        curl_setopt($curl,CURLOPT_TIMEOUT,30000);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl,CURLOPT_FAILONERROR,false);

        if($httpGet == false){
            curl_setopt($curl,CURLOPT_POST,true);
            curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($data));
        }

        $error = curl_error($curl);
        $errno = curl_errno($curl);
        $response = curl_exec($curl);

        curl_close($curl);

        if($errno)
        {
            return json_encode([
                'success'=>false,
                'Message'=>$error,
                'connected'=>false
            ]);
        }else{
            return $response;
        }
    }

    public function send_message($data = []){
        $response = $this->curl('/send-message',$data);

        return $response;
    }


    public function send_document($data = []){
        $response = $this->curl('/send-document',$data);

        return $response;
    }

    public function send_image($data = []){
        $response = $this->curl('/send-image',$data);

        return $response;
    }

}
