<x-slot name="title">
    Create post
</x-slot>
<x-slot name="styles">
    <link rel="stylesheet" href="{{asset('css/blog/create.css')}}">
</x-slot>


<div class="pb-4">
    <h1 class="py-8 text-lg font-bold text-gray-600 sm:pl-6 lg:pl-16 lg:text-4xl">New post</h1>
    <!-- component -->
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="savePost" autocomplete="off">
                    @csrf
                    <div class="mb-4">
                        <label class="text-xl text-gray-600 ">Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="w-full p-2 border-2 border-gray-300" id="title"
                            wire:model.defer="title">
                        @error('title') <span class="block text-sm text-red-700 error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="document-editor">
                        <div class="document-editor__toolbar"></div>
                        <div class="document-editor__editable-container">
                            <div class="document-editor__editable">
                                <p>The initial editor data.</p>
                            </div>
                        </div>
                    </div>
                    @error('content') <span class="block text-sm text-red-700 error">{{ $message }}</span>
                    @enderror


                    <div class="flex p-1 mt-8">
                        <label class="block mt-4">
                            <span class="text-xl text-gray-700">Category :</span>
                            <select class="block w-full mt-1 form-select" wire:model.defer="post_category">
                                <option disabled value="">Choose ..</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->category }} </option>
                                @endforeach
                            </select>
                            @error('post_category') <span
                                class="block text-sm text-red-700 error">{{ $message }}</span> @enderror
                        </label>
                    </div>

                    <div class="flex p-1">
                        <label class="block mt-4">
                            <span class="py-2 text-xl text-gray-700">Save method :</span>
                            <select class="block w-full mt-1 form-select" wire:model="post_status">
                                <option value="published">Save and Publish</option>
                                <option value="draft">Save Draft</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-8">
                        <button role="submit"
                            class="py-3 mr-2 tracking-wide text-white bg-blue-500 px-7 hover:bg-blue-400"
                            required>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
     @include('ckfinder::setup')
    <script>
DecoupledEditor
    .create( document.querySelector( '.document-editor__editable' ), {
        ckfinder: {
            uploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'
        }

    } )
    .then( editor => {
        const toolbarContainer = document.querySelector( '.document-editor__toolbar' );

        toolbarContainer.appendChild( editor.ui.view.toolbar.element );

        window.editor = editor;
    } )
    .catch( err => {
        console.error( err );
    } );
    </script>
</div>
