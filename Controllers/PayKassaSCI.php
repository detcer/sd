<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayKassaSCI extends Controller
{
    public $version = "0.4";

    public function __construct($sci_id, $sci_key, $test = false)
    {
        $this->domain = $_SERVER['SERVER_NAME'];
        $this->params = [];
        $this->params["sci_id"] = $sci_id;
        $this->params["sci_key"] = $sci_key;
        $this->params["test"] = $test;
        $this->params["domain"] = $this->domain;

        $this->url = "https://paykassa.app/sci/" . $this->version . "/index.php";
    }

    public function post_json_request($url, $data = [])
    {
        $postdata = http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        // Вимкнення перевірки SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    private function query($url, $data = [])
    {
        $result = $this->post_json_request($url, $data + $this->params);
        if ($result === false || $result === null) {
            return [
                "error" => true,
                "message" => "Помилка запиту до сервісу!",
            ];
        }
        return $result;
    }

    public function sci_create_order($amount, $currency, $order_id="", $comment="", $system=0, $phone=false, $paid_commission="") {
        $fields = ["amount", "currency", "order_id", "comment", "system", "phone", "paid_commission"];
        return $this->query($this->url, [
                "func" => "sci_create_order",
            ] + compact($fields));
    }

    public function sci_create_order_merchant($amount, $currency, $order_id="", $comment="", $system=0, $phone=false, $paid_commission="") {
        $fields = ["amount", "currency", "order_id", "comment", "system", "phone", "paid_commission"];
        return $this->query($this->url, [
                "func" => "sci_create_order_merchant",
            ] + compact($fields));
    }

    public function sci_create_order_get_data($amount, $currency, $order_id="", $comment="", $system=0, $phone=false, $paid_commission="") {
        $fields = ["amount", "currency", "order_id", "comment", "system", "phone", "paid_commission"];
        return $this->query($this->url, [
                "func" => "sci_create_order_get_data",
            ] + compact($fields));
    }

    public function sci_confirm_order() {
        $private_hash = $this->request("private_hash");
        $fields = ["private_hash",];
        return $this->query($this->url, [
                "func" => "sci_confirm_order",
            ] + compact($fields));
    }

    public function alert($message) { ?>
        <script>window.alert("<?php echo $message; ?>");</script>
        <?php
    }

    public function format_currency($money, $currency) {
        if (strtolower($currency) === "btc") {
            return format_btc($money);
        }
        return format_money($money);
    }

    public function format_btc($money) {
        return sprintf("%01.8f", $money);
    }

    public function format_money($money) {
        return sprintf("%01.2f", $money);
    }

    public function post($key, $value=false) {
        if ($value) {
            $_POST[$key] = $value;
        }
        return isset($_POST[(string)$key]) ? $_POST[(string)$key] : "";
    }

    public function get($key, $value=false) {
        if ($value) {
            $_GET[$key] = $value;
        }
        return isset($_GET[(string)$key]) ? $_GET[(string)$key] : "";
    }

    public function request($key, $value=false) {
        if ($value) {
            $_REQUEST[$key] = $value;
        }
        return isset($_REQUEST[(string)$key]) ? $_REQUEST[(string)$key] : "";
    }
}
