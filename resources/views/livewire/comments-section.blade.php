<div>
    <form wire:submit.prevent="postComment" class="mb-6">
        <textarea wire:model.defer="message" rows="3"
            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Write a comment..."></textarea>
        @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    <br>
        <button type="submit"
            class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Post Comment</button>
    </form>

    @forelse($comments as $comment)
        <div class="border-t pt-4 mt-4 my-8">
            <p class="  mt-4">{{ $comment->message }}</p>
            <div class="text-sm  flex justify-between">
                <span>{{ $comment->user->name }} | {{ $comment->created_at->format('M d, Y h:i A') }}</span>
                @if($comment->user_id === Auth::id())
                    <button wire:click="deleteComment({{ $comment->id }})"
                        class="text-red-600 hover:underline">Delete</button>
                @endif
            </div>
        </div>
    @empty
        <p class="mt-4">No comments yet.</p>
    @endforelse
</div>
