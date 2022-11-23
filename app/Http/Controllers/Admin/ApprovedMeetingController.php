<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovedMeetingController extends GroceryController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $title = "Approved Meetings";
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('meetings');
        $crud->where([
            'status' => 'Approved',
            'deleted_at is null'
        ]);
        $crud->setSubject('Approved Meeting', 'Approved Meetings');
        $crud->columns(['instansi', 'tujuan', 'waktu', 'deskripsi']);
        $crud->unsetAdd()->unsetDelete()->unsetEdit();
        $crud->setRead()->readFields(['nama', 'email', 'handphone', 'instansi', 'tujuan', 'waktu', 'deskripsi', 'created_by', 'updated_by', 'keterangan']);
        $output = $crud->render();

        return $this->_showOutput($output, $title);
    }
}
