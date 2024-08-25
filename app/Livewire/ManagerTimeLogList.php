<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\TimeLog;
use App\Models\User;
use Livewire\Component;

class ManagerTimeLogList extends Component
{
    public $employeeId, $departmentId, $projectId, $subProjectId;

    public function render()
    {
        $timeLogs = TimeLog::with('user', 'subProject.project.department')
            ->when($this->employeeId, fn($query) => $query->where('user_id', $this->employeeId))
            ->when($this->departmentId, fn($query) => $query->whereHas('subProject.project.department', fn($q) => $q->where('id', $this->departmentId)))
            ->when($this->projectId, fn($query) => $query->whereHas('subProject.project', fn($q) => $q->where('id', $this->projectId)))
            ->when($this->subProjectId, fn($query) => $query->where('sub_project_id', $this->subProjectId))
            ->get();

        return view('livewire.manager-time-log-list', [
            'timeLogs' => $timeLogs,
            'employees' => User::where('role', 'employee')->get(),
            'departments' => Department::all(),
        ]);
    }
}
