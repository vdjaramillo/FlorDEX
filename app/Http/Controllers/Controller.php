<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array
     */
    private $alertas = [];

    /**
     * @return array
     */
    public function getAlerts()
    {
        return $this->alertas;
    }

    /**
     *
     */
    public function setAlertsSession()
    {
        Session::flash('alerts', $this->getAlerts());
    }

    /**
     * @param $type
     * @param $message
     */
    public function setAlert($type, $message)
    {
        if (isset($this->alertas[$type])) {
            array_push($this->alertas[$type], $message);
            Session::flash('alerts', $this->getAlerts());
        } else {
            $this->alertas[$type] = [
                $message,
            ];
            Session::flash('alerts', $this->getAlerts());
        }
    }
}
