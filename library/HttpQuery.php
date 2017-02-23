<?php
namespace app\library;

class HttpQuery
{
    public static function postQuickCurlQuery($url, $params, $test = false)
    {
        $this_header = array(
            "content-type: application/x-www-form-urlencoded;charset=UTF-8"
        );
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_HTTPHEADER,$this_header);

        curl_setopt($curl, CURLOPT_URL, $url);
        $optHeader = $test? 1 : 0;
        curl_setopt($curl, CURLOPT_HEADER, $optHeader);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($curl, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $data = curl_exec($curl);
        //$response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        //返回获得的数据
        return $data;
    }

    public static function getQuickCurlQuery($url, $test = false, $gzip = false)
    {
        $this_header = array(
            "content-type: application/x-www-form-urlencoded;charset=UTF-8"
        );

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_HTTPHEADER,$this_header);
        // 设置你需要抓取的URL
        curl_setopt($curl, CURLOPT_URL, $url);
        // 设置header 响应头是否输出
        $optHeader = $test? 1 : 0;
        curl_setopt($curl, CURLOPT_HEADER, $optHeader);
        // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
        // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($gzip) curl_setopt($curl, CURLOPT_ENCODING, "gzip");
        // 运行cURL，请求网页
        $data = curl_exec($curl);
        //$response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        //返回获得的数据
        return $data;
    }
}