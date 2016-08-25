<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $input = [];

    protected $request = null;

    protected $repository = null;

    /**
     *
     * @var string
     * @author simon
     */
    protected $view = '';


    public function __construct()
    {
        $this->request = app('request');

        $this->input = $this->request->all();

        DB::enableQueryLog();
    }


    /**
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view,array $data = [],array $mergeData = [])
    {
        return view($this->view.$view,$data,$mergeData);
    }

    /**
     * @param $status
     * @param array $data
     * @param null $url
     * @return $this|\Illuminate\Http\JsonResponse
     */
    protected function response($status,$data = [],$url = null)
    {
        return responding($status,$data,$url);
    }
}
