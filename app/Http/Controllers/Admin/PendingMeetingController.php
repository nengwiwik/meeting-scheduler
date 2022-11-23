<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedMeeting;
use App\Mail\RejectedMeeting;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PendingMeetingController extends GroceryController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $title = "Pending Meetings";
        $crud = $this->_getGroceryCrudEnterprise();
        $crud->setTable('meetings');
        $crud->where([
            'status' => 'Pending',
            'deleted_at is null'
        ]);
        $crud->setSubject('Pending Meeting', 'Pending Meetings');
        $crud->columns(['instansi', 'tujuan', 'waktu', 'deskripsi']);
        $crud->unsetAdd()->unsetDelete();
        $crud->fields(['instansi', 'tujuan', 'waktu', 'deskripsi', 'status', 'keterangan']);
        $crud->requiredFields(['instansi', 'tujuan', 'waktu', 'deskripsi', 'status', 'keterangan']);
        $crud->setRead()->readFields(['nama', 'email', 'handphone', 'instansi', 'tujuan', 'waktu', 'deskripsi']);
        $crud->fieldType('waktu', 'datetime');
        $crud->fieldType('status', 'dropdown_search', [
            'Approved' => 'Approved',
            'Rejected' => 'Rejected',
        ]);
        $crud->callbackAfterUpdate(function ($s) {
            $meeting = Meeting::find($s->primaryKeyValue);
            if ($meeting->status == Meeting::STATUS_APPROVED) {
                Mail::to($meeting->email)->send(new ApprovedMeeting($meeting));
            } else {
                Mail::to($meeting->email)->send(new RejectedMeeting($meeting));
            }

            return $s;
        });
        $output = $crud->render();

        return $this->_showOutput($output, $title);
    }
}
