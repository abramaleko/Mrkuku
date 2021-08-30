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
                <form  autocomplete="off">
                    <div class="mb-4">
                        <label class="text-xl text-gray-600 ">Title <span class="text-red-500">*</span></label></br>
                        <input type="text" class="w-full p-2 border-2 border-gray-300" id="title"
                            wire:model.defer="title">
                        @error('title') <span class="block text-sm text-red-700 error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="document-editor" wire:ignore>
                        <div class="document-editor__toolbar"></div>
                        <div class="document-editor__editable-container">
                            <div class="document-editor__editable">
                                <p>The initial editor data.</p>
                            </div>
                        </div>
                    </div>
                    @error('content')
                    <span class="block text-sm text-red-700 error">{{ $message }}</span>
                    @enderror


                    <div class="flex items-center w-full mt-8 bg-grey-lighter">
                        <label class="flex flex-col items-center w-64 px-4 py-6 tracking-wide uppercase bg-white border rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue-500 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a image</span>
                            <input type='file' class="hidden" wire:model="photo" />
                        </label>
                    </div>
                    @error('photo')
                    <span class="block text-sm text-red-700 error">{{ $message }}</span>
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
                        <button role="button" wire:click="savePost"
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

        editor.model.document.on('change:data', () => {
            Livewire.emit('blogContent',editor.getData())

       })
    } )
    .catch( err => {
        console.error( err );
    } );
    </script>
</div>
