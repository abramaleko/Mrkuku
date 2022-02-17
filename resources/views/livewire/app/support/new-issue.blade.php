    <div class="p-8">
        <h1 class="text-2xl font-semibold text-gray-700 lg:text-3xl">Hello {{ Auth::user()->name }},</h1>
        <p class="py-4 text-lg leading-relaxed text-gray-600 ">
            Welcome to our live support chat forum, are you having issues 😰 ? Request support just by filling the
            field below  and we will quickly get back to you in in 5 - 10 minutes during office times.
        </p>

        <label class="block">
            <span class="text-lg font-bold text-gray-500">
                Issue detail 💡
            </span>
            <textarea class="block w-full mt-1 mb-2 border-blue-500 rounded-md form-textarea" rows="5"
                placeholder="Enter what do you want us to help you with" wire:model.defer="issueDetail">
    </textarea>
            @error('issueDetail') <span class="block text-sm font-semibold text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <div class="mt-4">
             <!-- check for the current page session if the user has already requested-->
            <button wire:click="issueRequest"
                class="px-6 py-3 tracking-wide text-white uppercase bg-blue-700 rounded hover:bg-blue-600">
                Request
            </button>
        </div>
    </div>
