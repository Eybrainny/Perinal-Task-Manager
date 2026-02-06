<div>
    @if (session()->has('message'))
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-900 ">
            <div class="text-center mb-8 text-black-600 p-3 bg-green-500 rounded-3xl">
                <h1>
                    {{ session('message') }}
                </h1>
            </div>
    @endif
        <div
            class="max-w-3xl mx-auto mt-7 bg-white border border-gray-200 rounded-xl shadow-2xs dark:bg-neutral-900 dark:border-neutral-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Task Manager</h1>
                </div>

                <div class="mt-5">


                    <!-- Form -->
                    <h2 class="block text-m font-bold text-gray-800 dark:text-white">Create a task</h2>

                    <form wire:submit.prevent="save">
                        <input type="text" wire:model="title" placeholder="Enter task title"
                            class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            required aria-describedby="title-error">
                        @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        <div class="flex gap-3 justify-end mt-2">
                            <button type="submit"
                                class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Add
                                Task</button>
                        </div>

                    </form>


                </div>
                <div class="text-gray-800 dark:text-white">
                    <h3 class="block text-2xl font-bold text-gray-800 dark:text-white text-center">Tasks List</h3>
                    @foreach($tasks as $task)
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700 dark:text-neutral-400">{{ $task->title }}</span>
                            <button wire:click="deleteTask({{ $task->id }})"
                                class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-red-500">
                                Delete
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- End Form -->
            </div>
        </div>
    </div>
</div>