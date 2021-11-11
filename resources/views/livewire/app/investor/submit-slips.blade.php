<x-app-layout>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-slot name="title">
        {{ __('Payment Verificatin') }}
    </x-slot>

    <x-slot name="styles">
        <style>
            .hasImage:hover section {
                background-color: rgba(5, 5, 5, 0.4);
            }

            .hasImage:hover button:hover {
                background: rgba(5, 5, 5, 0.45);
            }

            #overlay p,
            i {
                opacity: 0;
            }

            #overlay.draggedover {
                background-color: rgba(255, 255, 255, 0.7);
            }

            #overlay.draggedover p,
            #overlay.draggedover i {
                opacity: 1;
            }

            .group:hover .group-hover\:text-blue-800 {
                color: #2b6cb0;
            }

        </style>
    </x-slot>

    <div class="container px-6 py-8 mx-auto">

        @if (Session::has('success'))
        <div class="flex p-3 mb-4 bg-green-100 rounded-md">
            <svg class="flex-shrink-0 w-8 h-8 mr-2 text-green-600 stroke-current stroke-2" viewBox="0 0 24 24"
                fill="none" strokeLinecap="round" strokeLinejoin="round">
                <path d="M0 0h24v24H0z" stroke="none" />
                <circle cx="12" cy="12" r="9" />
                <path d="M9 12l2 2 4-4" />
            </svg>

            <div class="text-green-700">
                <div class="pb-2 text-xl font-bold">Payment Slips Submitted Successfully.</div>

                <div>
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>

        @endif
        <h1 class="text-2xl font-bold tracking-tighter text-gray-700 lg:text-3xl lg:py-0 lg:tracking-wide">
            Payment Verification
        </h1>
        <p class="mt-4 text-base leading-relaxed text-justify text-gray-500 font-extralight">
            {{ Auth::user()->name }} to verify your payment for invoice number
            INV-{{ $investment->invoice->invoice_number }}, please submit your payment
            slips so that can be verified by our team. Only upload clear taken photos of the payment slips or scan the
            payments slips
            and upload them here.
        </p>

        @if (count($errors) > 0)
            <div class="my-4 mb-2 border-l-8 border-red-900 bg-red-50">
                <div class="flex items-center">
                    <div class="p-2">
                        <div class="flex items-center">
                            <div class="ml-2">
                                <svg class="w-8 h-8 mr-2 text-red-900 cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="px-6 py-4 text-lg font-semibold text-red-900">
                                Please fix the following errors.
                             </p>
                        </div>
                        <div class="px-16 mb-4">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-sm font-bold text-red-500 list-disc text-md">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- component -->
        <form action="{{ route('investor.invoice-upload-paymentslips', $investment->id) }}"
            enctype="multipart/form-data" method="POST">
            @csrf
            <article aria-label="File Upload Modal"
                class="relative flex flex-col h-full mt-8 bg-white rounded-md shadow-xl" ondrop="dropHandler(event);"
                ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);"
                ondragenter="dragEnterHandler(event);">
                <!-- overlay -->
                <div id="overlay"
                    class="absolute top-0 left-0 z-50 flex flex-col items-center justify-center w-full h-full rounded-md pointer-events-none">
                    <i>
                        <svg class="w-12 h-12 mb-3 text-blue-700 fill-current" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                        </svg>
                    </i>
                    <p class="text-lg text-blue-700">Drop files to upload</p>
                </div>

                <!-- scroll area -->
                <section class="flex flex-col w-full h-full p-8 overflow-auto">
                    <header
                        class="flex flex-col items-center justify-center py-12 border-2 border-gray-400 border-dashed">
                        <p class="flex flex-wrap justify-center mb-3 font-semibold text-gray-900">
                            <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                        </p>
                        <input name="slips[]" id="hidden-input" type="file" multiple class="hidden" />
                        <button type="button" id="button"
                            class="px-3 py-1 mt-2 bg-gray-200 rounded-sm hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                            Upload a file
                        </button>
                    </header>

                    <h1 class="pt-8 pb-3 font-semibold text-gray-900 sm:text-lg">
                        To Upload
                    </h1>

                    <ul id="gallery" class="flex flex-wrap flex-1 -m-1">
                        <li id="empty" class="flex flex-col items-center justify-center w-full h-full text-center">
                            <img class="w-32 mx-auto"
                                src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                alt="no data" />
                            <span class="text-gray-500 text-small">No files selected</span>
                        </li>
                    </ul>
                </section>

                <!-- sticky footer -->
                <footer class="flex justify-end px-8 pt-4 pb-8">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-700 rounded hover:bg-blue-500 focus:shadow-outline focus:outline-none">
                        Upload now
                    </button>
                    <button id="cancel"
                        class="px-3 py-1 ml-3 rounded-sm hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                        Cancel
                    </button>
                </footer>
            </article>
            <form action="">



                <!-- using two similar templates for simplicity in js code -->
                <template id="file-template">
                    <li class="block w-1/2 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
                        <article tabindex="0"
                            class="relative w-full h-full bg-gray-100 rounded-md shadow-sm cursor-pointer group focus:outline-none focus:shadow-outline elative">
                            <img alt="upload preview"
                                class="sticky hidden object-cover w-full h-full bg-fixed rounded-md img-preview" />

                            <section
                                class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md">
                                <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                <div class="flex">
                                    <span class="p-1 text-blue-800">
                                        <i>
                                            <svg class="w-4 h-4 pt-1 ml-auto fill-current"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                            </svg>
                                        </i>
                                    </span>
                                    <p class="p-1 text-xs text-gray-700 size"></p>
                                    <button
                                        class="p-1 ml-auto text-gray-800 rounded-md delete focus:outline-none hover:bg-gray-300">
                                        <svg class="w-4 h-4 ml-auto pointer-events-none fill-current"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path class="pointer-events-none"
                                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>

                <template id="image-template">
                    <li class="block w-1/2 h-24 p-1 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8">
                        <article tabindex="0"
                            class="relative w-full h-full text-transparent bg-gray-100 rounded-md shadow-sm cursor-pointer group hasImage focus:outline-none focus:shadow-outline hover:text-white">
                            <img alt="upload preview"
                                class="sticky object-cover w-full h-full bg-fixed rounded-md img-preview" />

                            <section
                                class="absolute top-0 z-20 flex flex-col w-full h-full px-3 py-2 text-xs break-words rounded-md">
                                <h1 class="flex-1"></h1>
                                <div class="flex">
                                    <span class="p-1">
                                        <i>
                                            <svg class="w-4 h-4 ml-auto fill-current pt-"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                            </svg>
                                        </i>
                                    </span>

                                    <p class="p-1 text-xs size"></p>
                                    <button class="p-1 ml-auto rounded-md delete focus:outline-none hover:bg-gray-300">
                                        <svg class="w-4 h-4 ml-auto pointer-events-none fill-current"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path class="pointer-events-none"
                                                d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                    </button>
                                </div>
                            </section>
                        </article>
                    </li>
                </template>

    </div>
    <x-slot name="scripts">
        <script>
            const fileTempl = document.getElementById("file-template"),
                imageTempl = document.getElementById("image-template"),
                empty = document.getElementById("empty");

            // use to store pre selected files
            let FILES = {};

            // check if file is of type image and prepend the initialied
            // template to the target element
            function addFile(target, file) {
                const isImage = file.type.match("image.*"),
                    objectURL = URL.createObjectURL(file);

                const clone = isImage ?
                    imageTempl.content.cloneNode(true) :
                    fileTempl.content.cloneNode(true);

                clone.querySelector("h1").textContent = file.name;
                clone.querySelector("li").id = objectURL;
                clone.querySelector(".delete").dataset.target = objectURL;
                clone.querySelector(".size").textContent =
                    file.size > 1024 ?
                    file.size > 1048576 ?
                    Math.round(file.size / 1048576) + "mb" :
                    Math.round(file.size / 1024) + "kb" :
                    file.size + "b";

                isImage &&
                    Object.assign(clone.querySelector("img"), {
                        src: objectURL,
                        alt: file.name
                    });

                empty.classList.add("hidden");
                target.prepend(clone);

                FILES[objectURL] = file;
            }

            const gallery = document.getElementById("gallery"),
                overlay = document.getElementById("overlay");

            // click the hidden input of type file if the visible button is clicked
            // and capture the selected files
            const hidden = document.getElementById("hidden-input");
            document.getElementById("button").onclick = () => hidden.click();
            hidden.onchange = (e) => {
                for (const file of e.target.files) {
                    addFile(gallery, file);
                }
            };

            // use to check if a file is being dragged
            const hasFiles = ({
                    dataTransfer: {
                        types = []
                    }
                }) =>
                types.indexOf("Files") > -1;

            // use to drag dragenter and dragleave events.
            // this is to know if the outermost parent is dragged over
            // without issues due to drag events on its children
            let counter = 0;

            // reset counter and append file to gallery when file is dropped
            function dropHandler(ev) {
                ev.preventDefault();
                for (const file of ev.dataTransfer.files) {
                    addFile(gallery, file);
                    overlay.classList.remove("draggedover");
                    counter = 0;
                }
            }

            // only react to actual files being dragged
            function dragEnterHandler(e) {
                e.preventDefault();
                if (!hasFiles(e)) {
                    return;
                }
                ++counter && overlay.classList.add("draggedover");
            }

            function dragLeaveHandler(e) {
                1 > --counter && overlay.classList.remove("draggedover");
            }

            function dragOverHandler(e) {
                if (hasFiles(e)) {
                    e.preventDefault();
                }
            }

            // event delegation to caputre delete events
            // fron the waste buckets in the file preview cards
            gallery.onclick = ({
                target
            }) => {
                if (target.classList.contains("delete")) {
                    const ou = target.dataset.target;
                    document.getElementById(ou).remove(ou);
                    gallery.children.length === 1 && empty.classList.remove("hidden");
                    delete FILES[ou];
                }
            };

            // print all selected files
            // document.getElementById("submit").onclick = () => {
            // alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
            // console.log(FILES);
            // };

            // clear entire selection
            document.getElementById("cancel").onclick = () => {
                while (gallery.children.length > 0) {
                    gallery.lastChild.remove();
                }
                FILES = {};
                empty.classList.remove("hidden");
                gallery.append(empty);
            };
        </script>
    </x-slot>

</x-app-layout>