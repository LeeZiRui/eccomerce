<?php


namespace App\Interfaces;


class JsonReportFromater implements ReportFormaterInterface
{
    public function output($data){
        return $data;
    }
}
