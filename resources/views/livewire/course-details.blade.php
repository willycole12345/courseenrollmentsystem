<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="bg-white dark:bg-zinc-800 shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-bold mb-2">{{ $course->title }}</h2>
        <p class="mb-2">{{ $course->description }}</p>
        <p class="text-sm">Duration: {{ $course->duration }}</p>
    </div>

    <div class="bg-white dark:bg-zinc-800 shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>

        @livewire('comments-section', ['course' => $course])
    </div>
</div>
