<?php


namespace App\Interfaces;


class HtmlReportFormater implements ReportFormaterInterface
{
    public function output($data){
        $html = '<ul>';
        foreach ($data as $item){
            $html .= '<li>'.$item.'</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}

