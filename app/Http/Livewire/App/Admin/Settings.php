<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Settings as ModelsSettings;


use Livewire\Component;

class Settings extends Component
{
    public $bonus=true;

    public $Roi_gold=[],$Roi_Diamond=[],$Roi_Tanzanite=[];

   public function mount()
   {
       $this->bonus=ModelsSettings::where('setting','bonuses')
       ->select('value')
       ->first()
       ->value;

       $this->Roi_gold=json_decode(ModelsSettings::where('setting','Roi_Gold')
       ->select('value')
       ->first()
       ->value);

       $this->Roi_Diamond=json_decode(ModelsSettings::where('setting','Roi_Diamond')
       ->select('value')
       ->first()
       ->value);

       $this->Roi_Tanzanite=json_decode(ModelsSettings::where('setting','Roi_Tanzanite')
       ->select('value')
       ->first()
       ->value);

   }

   public function updateProject()
   {
    ModelsSettings::where('setting','bonuses')
       ->update(['value' => $this->bonus]);

       if ($this->bonus === 'true') {

       ModelsSettings::where('setting','Roi_Gold')
       ->update(['value' => json_encode($this->Roi_gold)]);

       ModelsSettings::where('setting','Roi_Diamond')
       ->update(['value' => json_encode($this->Roi_Diamond)]);

       ModelsSettings::where('setting','Roi_Tanzanite')
       ->update(['value' => json_encode($this->Roi_Tanzanite)]);
       }

       return session()->flash('updateBonusMrKuku','Updated Successfully');

   }


    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('manage settings')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.settings');
    }
}
