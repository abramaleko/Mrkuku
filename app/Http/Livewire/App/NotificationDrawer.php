<?php

namespace App\Http\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;


class NotificationDrawer extends Component
{
     public $notifications;

     public function mount()
     {
         $this->notifications=Auth::user()->unreadNotifications;
     }

     public function updatePhoneNotification($id)
     {
        auth()->user()
        ->unreadNotifications
        ->when($id,function($q) use ($id) {
           return $q->where('id',$id);
        })
        ->markAsRead();

        return redirect()->route('profile.show');
    }

    public function render()
    {
        return view('livewire.app.notification-drawer');
    }
}
