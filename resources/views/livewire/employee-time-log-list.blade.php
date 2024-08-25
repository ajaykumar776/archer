<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Add Time Log Button -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('time-log.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Time Log
                </a>
            </div>

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subproject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Time</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Hours</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($timeLogs as $log)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->subProject->project->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->subProject->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->start_time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->end_time }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->total_hours }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Edit Button -->
                            <button wire:click="edit({{ $log->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                            <!-- Delete Button -->
                            <button wire:click="delete({{ $log->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
