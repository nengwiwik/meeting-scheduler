<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RejectedMeetingController extends GroceryController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $title = "Rejected Meetings";
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('meetings');
        $crud->where([
            'status' => 'Rejected',
            'deleted_at is null'
        ]);
        $crud->setSubject('Rejected Meeting', 'Rejected Meetings');
        $crud->columns(['instansi', 'tujuan', 'waktu', 'deskripsi']);
        $crud->unsetAdd()->unsetDelete()->unsetEdit();
        $crud->setRead()->readFields(['nama', 'email', 'handphone', 'instansi', 'tujuan', 'waktu', 'deskripsi', 'created_by', 'updated_by', 'keterangan']);
        $output = $crud->render();

        return $this->_showOutput($output, $title);
    }
}
