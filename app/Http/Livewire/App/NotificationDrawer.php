<?php

namespace App\Http\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;


class NotificationDrawer extends Component
{

    /*
        this function updates to read notification and
       redirects to routes depending on the route,it receives two parameterss
        the notification and the order of the notification increment this number as
        notifications increase
        1= add phone number notification 2=contract sign notification 3=slips declined
        notification
    */
    public function redirectTo($notification, $order)
    {
        $user = Auth::user();

        switch ($order) {
            case 1:
                $user->where('id', $notification['id'])
                    ->markAsRead();
                return redirect()->route('profile.show');
                break;

            case 2:
                $user->notifications()
                ->where('id', $notification['id'])
                ->update([
                    'read_at' => now()
                ]);
                    return redirect()->route('investor.invoice-details',$notification['data']['investment_id']);
                    break;


            case 3:
                $user->notifications()
                ->where('id', $notification['id'])
                ->update([
                    'read_at' => now()
                ]);
                return redirect()->route('investor.invoice-details',$notification['data']['investment_id']);
                break;
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

         session()->flash('success','Successfully marked all as read');

         return route('notifications');
    }

    //deletes the notification
    public function deleteNotification($notification)
    {
        Auth::user()->notifications()
            ->where('id', $notification['id'])
            ->delete();


        session()->flash('deleted', 'Notification deleted successfully');

        return $this->emit('showNotification');
    }

    public function render()
    {

        return view('livewire.app.notification-drawer', [
            'notifications' => Auth::user()->notifications()->paginate(5),
        ]);
    }
}
