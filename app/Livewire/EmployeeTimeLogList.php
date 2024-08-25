<?php

namespace App\Livewire;

use App\Models\TimeLog;
use Livewire\Component;

class EmployeeTimeLogList extends Component
{
    public function render()
    {
        $timeLogs = auth()->user()->timeLogs()->with('subProject.project')->get();

        return view('livewire.employee-time-log-list', [
            'timeLogs' => $timeLogs,
        ]);
    }

    public function delete($id)
    {
        // Find the TimeLog entry by its ID
        $timeLog = TimeLog::find($id);

        // Check if the TimeLog exists and belongs to the authenticated user
        if ($timeLog && $timeLog->user_id === auth()->id()) {
            $timeLog->delete();
            session()->flash('message', 'Time log deleted successfully!');
        } else {
            session()->flash('error', 'Time log not found or unauthorized access.');
        }

        // Refresh the component to reflect the deletion
        $this->render();
    }

    public function  edit($id) {
        return redirect()->route('time-log.edit', ['id' => $id]);

    }

}
