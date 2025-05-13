<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Course List</h2>
        <div>
            <label class="mr-2 font-semibold">Filter:</label>
            <select wire:model.change="filter"
                class="border border-gray-300 rounded p-2 focus:ring focus:border-blue-300">
                <option value="all">All Courses</option>
                <option value="enrolled">Enrolled</option>
                <option value="not_enrolled">Not Enrolled</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-md bg-white dark:bg-zinc-800">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-sm uppercase tracking-wider">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Date Added</th>
                    <th class="px-4 py-3">Number of Comments</th>
                    <th class="px-4 py-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $course->title }}</td>
                        <td class="px-4 py-3">{{ Str::limit($course->description, 50) }}</td>
                        <td class="px-4 py-3">{{ $course->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3">{{ $course->comments_count }}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            @if($course->enrollments->where('user_id', Auth::id())->count())
                                <a href="{{ route('courses.show', $course->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-700">View</a>
                                <button wire:click="cancel({{ $course->id }})"
                                   class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-700">Cancel</button>
                            @else
                                <button wire:click="enroll({{ $course->id }})" variant="primary"
                                   class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">Enroll</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="border-b hover:bg-gray-50">
                        <td colspan="5" class="text-center py-6 text-gray-500">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
</div>
