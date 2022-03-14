<div class="p-8">
   <h1 class="text-2xl font-semibold text-gray-700">
       Create A New Job Post
   </h1>
   <div class="max-w-4xl p-8 mt-8 bg-white rounded-lg">

       <div class="my-4">
          <label for="title" class="text-base ">Job Title</label>
           <input type="text" wire:model.defer="title" class="block w-full py-2 my-2 text-gray-600 border-blue-300 rounded-md lg:w-3/4" placeholder="i.e IT Manager">
           @error('title')
           <span class="py-2 text-sm text-red-500">
            {{$message}}
           </span>
           @enderror
        </div>

       <div class="mb-4">
       <div wire:ignore class="form-group row">
        <label for="description" class="text-base ">Job Description</label>
        <div>
            <textarea wire:model="description" class="form-control required" name="message" id="message" placeholder="i.e Tasks,responsibilities, experience level which would be associated with this job"></textarea>
        </div>
    </div>
    </div>

    <div class="">
        <label for="deadline" class="text-base">Application Deadline</label>
        <input wire:model.defer="application_deadline" type="date" class="block w-full my-2 border-blue-300 rounded-md lg:w-1/2">
        @error('application_deadline')
        <span class="py-2 text-sm text-red-500">
         {{$message}}
        </span>
        @enderror
    </div>
    <div class="mt-4">
        <button wire:click="createJob"  class="px-8 py-2 text-white bg-blue-700 rounded-md hover:bg-blue-600">
            Create Post
        </button>
    </div>
   </div>
</div>

<x-slot name="scripts">
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

    <script>
         ClassicEditor
           .create(document.querySelector('#message'))
           .then(editor => {
               editor.model.document.on('change:data', () => {
               @this.set('description', editor.getData());
              })
           })
           .catch(error => {
              console.error(error);
           });
    </script>
</x-slot>

<x-slot name="styles">
    <style>
        .ck-editor__editable_inline {
            min-height: 700px;
        }
        </style>
</x-slot>
