<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MembersList extends Component
{

    public $members;
    public $newMemberName;

    public function Mount()
    {
        $this->members = User::find(Auth::user()->id)->members;
    }

    public function render()
    {
        return view('livewire.members-list');
    }

    public function save()
    {
        if(isset($this->newMemberName)) {
            User::find(Auth::user()->id)->members()->create(['name' => $this->newMemberName]);
            $this->newMemberName = null;
            $this->refreshMembers();
        }

    }

    private function refreshMembers() {
        $this->members = User::find(Auth::user()->id)->members;
    }


    public function delete(int $id)
    {
        Member::find($id)->delete();
        $this->refreshMembers();
    }
}
