<?php

namespace App\Livewire;

use App\Models\SubProject;
use App\Models\TimeLog;
use Livewire\Component;

class EmployeeTimeLogForm extends Component
{
    public $subproject_id, $date, $start_time, $end_time;
    public $editMode = false;
    public $timeLogId; // ID of the time log being edited

    public function mount($timeLogId = null)
    {
        if ($timeLogId) {
            $this->editMode = true;
            $this->timeLogId = $timeLogId;
            $timeLog = TimeLog::find($timeLogId);

            if ($timeLog) {
                $this->subproject_id = $timeLog->sub_project_id;
                $this->date = $timeLog->date;
                $this->start_time = $timeLog->start_time;
                $this->end_time = $timeLog->end_time;
            }
        }
    }

    public function save()
    {
        $this->validate([
            'subproject_id' => 'required|exists:sub_projects,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $hours = (strtotime($this->end_time) - strtotime($this->start_time)) / 3600;

        if ($this->editMode) {
            $timeLog = TimeLog::find($this->timeLogId);
            if ($timeLog) {
                $timeLog->update([
                    'sub_project_id' => $this->subproject_id,
                    'date' => $this->date,
                    'start_time' => $this->start_time,
                    'end_time' => $this->end_time,
                    'total_hours' => $hours,
                ]);
                session()->flash('message', 'Time log updated successfully!');
                return redirect()->route('time-log.list');
                
            }
        } else {
            TimeLog::create([
                'user_id' => auth()->id(),
                'sub_project_id' => $this->subproject_id,
                'date' => $this->date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'total_hours' => $hours,
            ]);
            session()->flash('message', 'Time log saved successfully!');
            return redirect()->route('time-log.list');

        }

        $this->resetInputFields();

    }

    public function edit($timeLogId)
    {
        $this->mount($timeLogId);
    }

    public function confirmDelete($timeLogId)
    {
        $this->timeLogId = $timeLogId;
        $this->dispatchBrowserEvent('confirm-delete');
    }

    public function delete()
    {
        $timeLog = TimeLog::find($this->timeLogId);
        if ($timeLog) {
            $timeLog->delete();
            session()->flash('message', 'Time log deleted successfully!');
        }
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->subproject_id = '';
        $this->date = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->editMode = false;
        $this->timeLogId = null;
    }

    public function render()
    {
        return view('livewire.employee-time-log-form', [
            'projects' => SubProject::all(),
        ]);
    }
}
