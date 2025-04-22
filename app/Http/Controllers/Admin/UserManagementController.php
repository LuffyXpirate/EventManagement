<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserManagementController extends Controller
{
    public function index()
    {
        $attendee = User::whereIn('user_type', [ 'attendee'])->latest()->get();
        return view('admin.admin.manageattendee.list', compact('attendee'));
    }
    public function destroy($id)
    {
        $attendee = User::findorfail($id);
        $attendee->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Deleted Successfully');
    }
}
