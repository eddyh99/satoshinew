<?php

namespace App\Controllers;

class Homepage extends BaseController
{
    public function index()
    {
        $mdata = [
            'title'     => 'Homepage - ' . NAMETITLE,
            'content'   => 'homepage/index'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function hotdeals() {
        $mdata = [
            'title'     => 'Hot Deals - ' . NAMETITLE,
            'content'   => 'homepage/hotdeals'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function secret_formula() {
        $mdata = [
            'title'     => 'Secret Formula - ' . NAMETITLE,
            'content'   => 'homepage/secret-formula'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function giveaway() {
        $mdata = [
            'title'     => 'Giveaway - ' . NAMETITLE,
            'content'   => 'homepage/giveaway'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }
}
