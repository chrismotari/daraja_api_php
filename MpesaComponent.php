<?php
    class MpesaComponent extends Component
    {
        public function getAccessToken()
        {
            // Replace placeholders with your actual API keys
            $consumerKey = "BoLOAGGWBGCaWYdlmkBiuG7wQKVP6mi5QcXGMIGblhcqP9JN";
            $consumerSecret = "xG5QRO1aNoWf4HZhnbcCeTrKKxanjpWgUmflRDV2EiRsEKA90uBV19Klz6H3dMI0";

            $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            $headers = ['Content-Type:application/json; charset=utf8'];

            $curl = curl_init($access_token_url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);

            $result = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTPCODE);
            $result = json_decode($result);

            $access_token = $result->access_token;
            curl_close($curl);

            return $access_token;
        }
    }
?>