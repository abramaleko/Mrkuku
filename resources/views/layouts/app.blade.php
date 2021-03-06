<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="title" content="Mr Kuku">
    <meta name="description"
        content="Wekeza na sisi ukuze kipato chako kwa asilimia 10 kila mwezi kwenye mabanda yetu ya kisasa">
    <meta name="keywords"
        content="Kuza kipato chako,modern poultry farming, broiler chicken farm,kuku wa broiler,grow your income">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Tariq Machibya">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Mr kuku ' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- styles section --}}
    {{ $styles ?? '' }}

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <a href="/">
                    <div class="flex items-center">
                        <img src="{{ asset('images/logo.jpeg') }}" class="w-12 h-12" alt="Mr kuku">
                        <span class="mx-2 text-2xl font-semibold text-white">Kuku</span>
                    </div>
                </a>
            </div>

            <nav class="mt-10">
                <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100  {{ request()->routeIs('dashboard') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                    href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/social-icons/dashboard.png') }}" alt="dashboard"
                        class="w-6 h-6">

                    <span class="mx-3">Dashboard</span>
                </a>

                @can('view investments')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/ui-elements">
                        <svg class="w-6 h-6" viewBox="-29 0 487 487.71802" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m308.949219 398.578125 70.199219-33.15625c15.476562-7.816406 34.363281-2.085937 42.890624 13.007813l-142.691406 92.300781c-19.128906 8.828125-40.597656 11.257812-61.21875 6.929687l-98.410156-27.621094c-9.058594-2.539062-18.746094-1.480468-27.039062 2.960938l-20.582032 11.011719 2.769532-100.371094.820312.019531c29.410156-20.894531 68.03125-23.597656 100.0625-7l5.890625 3.050782c9.207031 4.769531 19.378906 7.398437 29.75 7.679687l57.847656 1.597656c18.15625.496094 34.046875 12.335938 39.710938 29.589844zm0 0"
                                fill="#f7caa5" />
                            <path
                                d="m328.210938 222.5c0 59.652344-48.359376 108.011719-108.011719 108.011719-59.652344 0-108.011719-48.359375-108.011719-108.011719s48.359375-108.011719 108.011719-108.011719c59.652343 0 108.011719 48.359375 108.011719 108.011719zm0 0"
                                fill="#fedb41" />
                            <path
                                d="m72.097656 464.011719-.308594 11.296875-63.429687-1.738282 3.828125-139.210937 63.441406 1.742187-.761718 27.539063zm0 0"
                                fill="#00efd1" />
                            <g fill="#083863">
                                <path
                                    d="m220.863281 266.175781c-.894531-.195312-1.816406-.230469-2.726562-.101562-9.1875-1.003907-16.132813-8.785157-16.097657-18.027344 0-4.417969-3.582031-8-8-8-4.417968 0-8 3.582031-8 8-.054687 15.421875 10.273438 28.945313 25.160157 32.960937v7.992188c0 4.417969 3.582031 8 8 8s8-3.582031 8-8v-7.515625c17.132812-3.585937 28.78125-19.546875 26.976562-36.957031-1.800781-17.410156-16.472656-30.644532-33.976562-30.648438-10.03125 0-18.160157-8.128906-18.160157-18.160156 0-10.027344 8.128907-18.160156 18.160157-18.160156s18.160156 8.132812 18.160156 18.160156c0 4.417969 3.582031 8 8 8s8-3.582031 8-8c-.023437-16.160156-11.347656-30.101562-27.160156-33.433594v-7.285156c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v7.773438c-16.507813 4.503906-27.132813 20.53125-24.859375 37.488281 2.277344 16.960937 16.75 29.621093 33.859375 29.617187 9.953125-.078125 18.117187 7.871094 18.296875 17.820313.183594 9.953125-7.679688 18.195312-17.632813 18.480469zm0 0" />
                                <path
                                    d="m104.1875 222.5c0 64.070312 51.941406 116.011719 116.011719 116.011719 64.070312 0 116.011719-51.941407 116.011719-116.011719s-51.941407-116.011719-116.011719-116.011719c-64.039063.074219-115.9375 51.972657-116.011719 116.011719zm116.011719-100.011719c55.234375 0 100.011719 44.777344 100.011719 100.011719s-44.777344 100.011719-100.011719 100.011719-100.011719-44.777344-100.011719-100.011719c.0625-55.207031 44.804688-99.949219 100.011719-100.011719zm0 0" />
                                <path
                                    d="m375.644531 358.226562-62.652343 29.59375c-8.679688-16.074218-25.273438-26.296874-43.53125-26.828124l-57.855469-1.597657c-9.160157-.265625-18.144531-2.582031-26.289063-6.789062l-5.886718-3.046875c-30.140626-15.714844-66.0625-15.675782-96.171876.097656l.367188-13.339844c.125-4.414062-3.359375-8.09375-7.777344-8.214844l-63.441406-1.742187c-2.121094-.058594-4.179688.726563-5.71875 2.183594-1.542969 1.460937-2.441406 3.472656-2.496094 5.59375l-3.828125 139.210937c-.121093 4.417969 3.359375 8.09375 7.777344 8.214844l63.429687 1.742188h.222657c4.332031-.003907 7.875-3.453126 7.992187-7.78125l.183594-6.652344 16.488281-8.824219c6.464844-3.476563 14.03125-4.304687 21.097657-2.308594l98.414062 27.617188c.167969.050781.339844.089843.515625.128906 7.117187 1.488281 14.371094 2.238281 21.640625 2.234375 15.386719.007812 30.59375-3.308594 44.574219-9.730469.34375-.160156.675781-.34375.992187-.546875l142.691406-92.300781c3.554688-2.296875 4.703126-6.964844 2.621094-10.652344-10.59375-18.796875-34.085937-25.953125-53.359375-16.261719zm-311.445312 105.5625-.140625 3.300782-47.457032-1.300782 3.375-123.214843 47.488282 1.300781zm211.292969-.089843c-17.378907 7.84375-36.785157 10.007812-55.464844 6.183593l-98.148438-27.546874c-11.042968-3.117188-22.867187-1.824219-32.972656 3.609374l-8.429688 4.511719 2.261719-81.929687c26.683594-17.75 60.914063-19.574219 89.332031-4.761719l5.890626 3.046875c10.285156 5.3125 21.636718 8.246094 33.207031 8.574219l57.851562 1.601562c14.777344.421875 27.707031 10.058594 32.332031 24.097657.414063 1.265624.757813 2.550781 1.027344 3.855468l-86.179687-2.378906c-4.417969-.121094-8.09375 3.359375-8.21875 7.777344-.121094 4.417968 3.363281 8.09375 7.777343 8.21875l95.089844 2.617187h.222656c4.332032.003907 7.878907-3.445312 8-7.78125.09375-3.476562-.167968-6.953125-.777343-10.378906l64.277343-30.367187c.0625-.027344.125-.058594.1875-.089844 9.117188-4.613282 20.140626-3.070313 27.640626 3.871094zm0 0" />
                                <path
                                    d="m228.199219 84v-76c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v76c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0" />
                                <path
                                    d="m288.199219 84v-36c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v36c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0" />
                                <path
                                    d="m168.199219 84v-36c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v36c0 4.417969 3.582031 8 8 8s8-3.582031 8-8zm0 0" />
                            </g>
                        </svg>

                        <span class="mx-3">My Investments</span>
                    </a>
                @endcan

                @can('view earnings')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/tables">
                        <svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="m313.801 94.915s49.06-63.674 34.953-81.941c-4.808-6.225-8.908 2.229-18.851 2.229-11.683 0-11.683-7.644-23.367-7.644-11.682 0-11.682 7.644-23.364 7.644-11.681 0-11.681-7.644-23.362-7.644s-11.681 7.644-23.363 7.644c-9.955 0-14.038-8.564-18.878-2.336-14.114 18.166 34.229 82.047 34.229 82.047-213.505 140.358-144.664 331.239-18.607 331.239h99.973c126.437 0 194.852-190.415-19.363-331.238z"
                                                            fill="#eabc6b" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m313.801 94.915s49.06-63.674 34.953-81.941c-4.808-6.225-8.908 2.229-18.851 2.229-11.683 0-11.683-7.644-23.367-7.644-11.682 0-11.682 7.644-23.364 7.644-.575 0-1.101-.032-1.622-.068-4.694 20.12-25.846 51.466-37.95 68.249 4.767 6.995 8.198 11.53 8.198 11.53-2.848 1.872-5.635 3.755-8.383 5.645 203.99 140.211 135.734 325.593 10.978 325.593h78.771c126.437.001 194.852-190.414-19.363-331.237z"
                                                        fill="#e8ae4d" />
                                                </g>
                                                <g>
                                                    <path
                                                        d="m322.923 117.562c-28.507 7.199-56.671 7.2-85.183 0-9.924-2.506-15.549-13.665-11.978-23.808.04-.113.08-.227.12-.34 2.994-8.504 11.486-13.276 19.809-11.187 23.343 5.861 45.932 5.862 69.282 0 8.323-2.09 16.814 2.683 19.809 11.187.04.113.08.227.12.34 3.57 10.144-2.055 21.302-11.979 23.808z"
                                                        fill="#ffe07d" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <g>
                                                                        <g>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="m54.883 458.902 108.566 40.41c9.221 3.432 18.98 5.189 28.818 5.189h111.886c15.658 0 30.993-4.45 44.219-12.83l140.092-88.771c9.243-8.207 10.956-22 4.002-32.219-7.608-11.181-20.194-13.125-34.043-6.576l-136.393 60.055.161-22.129c-1.806-18.163-15.791-32.74-33.864-35.298l-83.059-9.563c-19.16-2.711-28.735-9.132-45.438-18.903-22.804-13.34-48.748-20.371-75.167-20.371h-29.78v141.006z"
                                                                                            fill="#ffddce" />
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="m54.883 458.902 108.566 40.41c9.221 3.432 18.98 5.189 28.818 5.189h111.886c15.658 0 30.993-4.45 44.219-12.83l140.092-88.771c9.243-8.207 10.956-22 4.002-32.219-7.608-11.181-20.194-13.125-34.043-6.576l-136.393 60.055.161-22.129c-1.806-18.163-15.791-32.74-33.864-35.298l-83.059-9.563c-19.16-2.711-28.735-9.132-45.438-18.903-22.804-13.34-48.748-20.371-75.167-20.371h-29.78v141.006z"
                                                                                            fill="#ffddce" />
                                                                                    </g>
                                                                                    <path
                                                                                        d="m492.467 370.682c-7.608-11.181-20.194-13.125-34.043-6.576l-37.516 16.519c1.817 2.876 3.262 5.171 3.262 5.171 6.953 10.219 5.24 24.011-4.002 32.219l-81.629 51.725c-10.751 4.922-22.473 7.504-34.385 7.504h-111.886c-9.838 0-19.598-1.757-28.818-5.189l-108.566-40.41v27.258l108.566 40.41c9.221 3.432 18.98 5.189 28.818 5.189h91.412 20.474c15.658 0 30.993-4.45 44.219-12.83l140.092-88.77c9.242-8.208 10.956-22.001 4.002-32.22z"
                                                                                        fill="#ffcbbe" />
                                                                                    <g>
                                                                                        <path
                                                                                            d="m312.008 379.236-.004.534.352-.155c-.113-.129-.232-.253-.348-.379z"
                                                                                            fill="#f5dbcc" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                            <path
                                                                                d="m78.244 480.527c0 7.877-6.386 14.263-14.263 14.263h-34.423c-7.877 0-14.263-6.386-14.263-14.263v-174.644c0-7.877 6.386-14.263 14.263-14.263h34.423c7.877 0 14.263 6.386 14.263 14.263z"
                                                                                fill="#407093" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                    <path
                                        d="m498.667 366.464c-9.551-14.036-25.752-17.463-43.352-9.181l-9.328 4.107c14.708-31.35 16.533-66.297 9.211-99.307-8.409-37.913-28.72-74.641-60.368-109.164-2.798-3.053-7.541-3.259-10.595-.46-3.053 2.798-3.259 7.541-.46 10.595 29.846 32.556 48.95 66.967 56.782 102.276 8.249 37.193 3.45 75.549-17.601 106.2l-93.342 41.099.077-10.542c.002-.266-.01-.532-.037-.797-2.155-21.667-18.717-38.93-40.276-41.98-.064-.01-.128-.018-.193-.025l-82.961-9.552c-31.901-4.541-40.117-23.658-83.321-34.559-2.985-25.33.994-52.299 11.9-79.336 16.425-40.718 48.558-80.278 93.104-114.711 16.603 11.772 90.676 13.237 107.252-1.949 8.492 6.449 16.597 13.095 24.147 19.822 1.429 1.274 3.211 1.9 4.986 1.9 2.064 0 4.12-.847 5.601-2.51 2.755-3.092 2.481-7.832-.611-10.587-8.276-7.373-17.178-14.648-26.515-21.679 2.188-9.278-.874-20.137-8.954-26.601 23.479-35.612 30.308-58.921 20.875-71.133-6.479-8.389-14.539-4.452-17.981-2.77-5.834 2.848-9.015 2.998-14.383-.514-10.241-6.701-21.005-6.917-31.576 0-5.436 3.557-9.717 3.557-15.151 0-10.242-6.701-21.002-6.917-31.575 0-5.43 3.554-8.623 3.334-14.365.48-3.438-1.709-11.489-5.711-18.009 2.679-9.221 11.868-3.052 34.442 18.843 68.843-1.341.725-2.619 1.576-3.812 2.548-8.708-9.196-22.975-18.787-43.607-16.483-17.113 1.915-29.732-3.74-37.306-8.82-3.44-2.304-8.098-1.386-10.404 2.052-2.306 3.44-1.387 8.098 2.052 10.404 9.655 6.473 25.701 13.679 47.322 11.268 15.94-1.788 26.756 6.358 33.489 14.648-.092.32-.177.642-.256.964-5.743.09-14.326.626-23.778 2.592-22.732 4.729-39.606 15.532-48.799 31.244-2.091 3.574-.889 8.168 2.685 10.26 3.575 2.091 8.168.888 10.259-2.686 13.674-23.369 47.051-26.227 60.308-26.406.057.165.124.328.184.492-47.308 36.493-80.244 77.19-97.932 121.04-11.18 27.717-15.646 55.485-13.379 81.874-7.191-1.064-14.465-1.635-21.774-1.685v-4.535c0-11.999-9.762-21.76-21.761-21.76h-34.424c-11.999 0-21.761 9.762-21.761 21.76v174.644c0 12 9.762 21.761 21.761 21.761h34.423c11.999 0 21.761-9.762 21.761-21.761v-2.136l75.091 27.949c10.091 3.755 20.667 5.66 31.434 5.66h111.886c17.106 0 33.785-4.84 48.233-13.995 149.259-94.62 140.195-88.733 141.057-89.497 12.023-10.672 14.269-28.746 5.224-42.04zm-177.58-256.172c-27.422 6.924-54.084 6.924-81.512 0-11.769-2.975-8.359-23.965 4.289-20.793 24.538 6.16 48.394 6.16 72.934 0 12.428-3.12 16.247 17.771 4.289 20.793zm-98.279-91.361c.059.029.118.059.174.087 10.149 5.044 19.042 5.318 29.251-1.361 12.776-8.363 14.163 5.046 30.938 5.046 8.076 0 12.533-2.916 15.787-5.046 5.437-3.558 9.719-3.556 15.155 0 10.254 6.71 18.932 6.379 29.376 1.342 1.543 5.562-1.949 22.143-24.185 55.249-11.042-.188-27.066 10.657-72.428.562-22.188-33.534-25.619-50.276-24.068-55.879zm261.085 377.99-139.534 88.417c-12.043 7.631-25.946 11.666-40.205 11.666h-111.886c-8.975 0-17.791-1.588-26.203-4.719l-80.323-29.897v-80.755c0-4.142-3.357-7.499-7.498-7.499s-7.498 3.357-7.498 7.499v98.894c0 3.73-3.035 6.764-6.764 6.764h-34.424c-3.73 0-6.764-3.035-6.764-6.764v-174.644c0-3.73 3.034-6.763 6.764-6.763h34.423c3.73 0 6.764 3.034 6.764 6.763v40.694c0 4.142 3.357 7.499 7.498 7.499s7.498-3.357 7.498-7.499v-21.162c62.031.475 75.978 33.17 118.476 39.181.064.01.128.018.192.025l82.957 9.551c14.526 2.097 25.705 13.664 27.323 28.227l-.104 14.264h-77.365c-4.141 0-7.499 3.357-7.499 7.499s3.357 7.499 7.499 7.499h84.809c.947 0 2.041-.21 2.993-.625.153-.068 136.263-59.995 136.422-60.065 9.811-4.36 18.756-4.983 24.822 3.931 4.716 6.927 3.672 16.292-2.373 22.019z" />
                                    <path
                                        d="m282.307 340.22c4.141 0 7.499-3.357 7.499-7.499v-12.43c21.051-3.416 33.334-20.455 36.006-36.351 3.338-19.857-7.063-37.126-26.497-43.995-3.434-1.214-6.594-2.375-9.51-3.496v-47.812c8.871 1.471 14.197 6.062 14.585 6.405 3.046 2.77 7.76 2.565 10.555-.465 2.808-3.044 2.616-7.788-.428-10.596-.529-.488-9.713-8.757-24.712-10.486v-10.664c0-4.142-3.357-7.499-7.499-7.499-4.141 0-7.498 3.357-7.498 7.499v11.27c-1.808.346-3.66.786-5.563 1.359-12.72 3.831-22.228 14.738-24.815 28.463-2.347 12.455 1.602 24.433 10.305 31.259 4.997 3.919 11.287 7.507 20.073 11.343v59.301c-8.672-.367-14.01-1.995-23.322-8.087-3.465-2.266-8.113-1.297-10.38 2.17-2.267 3.465-1.296 8.113 2.17 10.38 12.241 8.008 20.424 10.097 31.532 10.529v11.903c0 4.142 3.357 7.499 7.499 7.499zm-18.316-116.838c-4.281-3.358-6.13-9.75-4.823-16.681 1.212-6.428 5.631-14.238 14.403-16.88.417-.126.827-.234 1.237-.344v40.505c-4.49-2.242-8.011-4.399-10.817-6.6zm30.326 30.703c18.66 6.595 17.504 22.617 16.705 27.37-1.654 9.841-8.878 20.347-21.217 23.509v-52.504c1.46.534 2.951 1.073 4.512 1.625z" />
                                </g>
                            </g>
                        </svg>

                        <span class="mx-3">My Earnings</span>
                    </a>
                @endcan

                @can('view bank accounts')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="/forms">
                        <svg id="Layer_5" enable-background="new 0 0 64 64" viewBox="0 0 64 64" class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <g>
                                        <path d="m31 34-5.2 4h-15.8v-16h22 22v16h-15.8l-5.2-4z" fill="#ecc19c" />
                                    </g>
                                    <g>
                                        <path d="m22 12c0 5.52 4.48 10 10 10h-22-4v-1l16.12-10.55c-.08.5-.12 1.02-.12 1.55z"
                                            fill="#cf9e76" />
                                    </g>
                                    <g>
                                        <path d="m58 21v1h-4-22c5.52 0 10-4.48 10-10 0-.53-.04-1.05-.12-1.55z"
                                            fill="#cf9e76" />
                                    </g>
                                    <g>
                                        <path d="m25.8 38-7.8 6h-14-1c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1h7z"
                                            fill="#ccd1d9" />
                                    </g>
                                    <g>
                                        <path d="m62 39v4c0 .55-.45 1-1 1h-1-14l-7.8-6h15.8 7c.55 0 1 .45 1 1z"
                                            fill="#ccd1d9" />
                                    </g>
                                    <g>
                                        <path d="m18 46h2v16h-16v-18h14z" fill="#e6e9ed" />
                                    </g>
                                    <g>
                                        <path d="m46 46v-2h14v18h-16v-16z" fill="#e6e9ed" />
                                    </g>
                                    <g>
                                        <path d="m8 48h8v10h-8z" fill="#aab2bd" />
                                    </g>
                                    <g>
                                        <path d="m48 48h8v10h-8z" fill="#aab2bd" />
                                    </g>
                                    <g>
                                        <path d="m46 44v2h-2-3l-9-7.59-9 7.59h-3-2v-2l7.8-6 5.2-4h2l5.2 4z"
                                            fill="#a0d468" />
                                    </g>
                                    <g>
                                        <path d="m41 46h-1-16-1l9-7.59z" fill="#b4dd7f" />
                                    </g>
                                    <g>
                                        <path d="m24 46v16h-4v-16h3z" fill="#ccd1d9" />
                                    </g>
                                    <g>
                                        <path d="m41 46h3v16h-4v-16z" fill="#ccd1d9" />
                                    </g>
                                    <g>
                                        <path d="m24 46h16v16h-16z" fill="#e6e9ed" />
                                    </g>
                                    <g>
                                        <path
                                            d="m36 54v8h-8v-8c0-2.21 1.79-4 4-4 1.1 0 2.1.45 2.83 1.17.72.73 1.17 1.73 1.17 2.83z"
                                            fill="#aab2bd" />
                                    </g>
                                    <g>
                                        <path d="m14 26h6v8h-6z" fill="#69d6f4" />
                                    </g>
                                    <g>
                                        <path d="m24 26h6v8h-6z" fill="#69d6f4" />
                                    </g>
                                    <g>
                                        <path d="m34 26h6v8h-6z" fill="#69d6f4" />
                                    </g>
                                    <g>
                                        <path d="m44 26h6v8h-6z" fill="#69d6f4" />
                                    </g>
                                    <g>
                                        <path
                                            d="m41.88 10.45c.08.5.12 1.02.12 1.55 0 5.52-4.48 10-10 10s-10-4.48-10-10c0-.53.04-1.05.12-1.55h.01c.74-4.79 4.88-8.45 9.87-8.45s9.13 3.66 9.87 8.45z"
                                            fill="#fcd770" />
                                    </g>
                                </g>
                                <g>
                                    <path
                                        d="m31 19h2v-2c1.654 0 3-1.346 3-3s-1.346-3-3-3h-2c-.552 0-1-.449-1-1s.448-1 1-1h3v1h2v-3h-3v-2h-2v2c-1.654 0-3 1.346-3 3s1.346 3 3 3h2c.552 0 1 .449 1 1s-.448 1-1 1h-3v-1h-2v3h3z" />
                                    <path
                                        d="m61 37h-6v-14h4v-2.541l-16.213-10.6c-.999-5.044-5.454-8.859-10.787-8.859s-9.788 3.815-10.787 8.859l-16.213 10.6v2.541h4v14h-6c-1.103 0-2 .897-2 2v4c0 1.103.897 2 2 2v18h58v-18c1.103 0 2-.897 2-2v-4c0-1.103-.897-2-2-2zm-22.695-16c2.738-1.924 4.555-5.061 4.676-8.626l13.192 8.626zm-6.305-18c4.963 0 9 4.038 9 9s-4.037 9-9 9-9-4.038-9-9 4.037-9 9-9zm-10.981 9.374c.121 3.565 1.938 6.702 4.676 8.626h-17.868zm-10.019 10.626h42v14h-14.46l-2.6-2h5.06v-10h-8v8h-2v-8h-8v10h5.06l-2.6 2h-14.46zm24 38h-6v-7c0-1.654 1.346-3 3-3s3 1.346 3 3zm-3-12c-2.757 0-5 2.243-5 5v7h-2v-14h14v14h-2v-7c0-2.757-2.243-5-5-5zm-9-2v14h-2v-14zm2.737-2 6.263-5.281 6.263 5.281zm15.263 2h2v14h-2zm.365-2-9.365-7.897-9.365 7.897h-3.635v-.508l12.34-9.492h1.32l12.34 9.492v.508zm-12.365-12h-4v-6h4zm6 0v-6h4v6zm-32 6h19.86l-5.2 4h-14.66zm2 6h12v2h2v14h-14zm54 16h-14v-14h2v-2h12zm2-18h-14.66l-5.2-4h19.86z" />
                                    <path d="m51 25h-8v10h8zm-2 8h-4v-6h4z" />
                                    <path d="m13 35h8v-10h-8zm2-8h4v6h-4z" />
                                    <path d="m57 59v-12h-10v12zm-8-10h6v8h-6z" />
                                    <path d="m7 59h10v-12h-10zm2-10h6v8h-6z" />
                                </g>
                            </g>
                        </svg>

                        <span class="mx-3">Bank Accounts</span>
                    </a>

                @endcan

                <!--for investors-->
                @can('live support')
                <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('investor.support') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                    href="{{ route('investor.support') }}">
                    <img src="{{ asset('images/social-icons/support.png') }}" alt="dashboard" class="h-7 w-7">
                    <span class="mx-3">Support</span>
                </a>
                @endcan
                   <!--for admins-->
                   @can('support service')
                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.support') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                       href="{{ route('admin.support') }}">
                       <img src="{{ asset('images/social-icons/support.png') }}" alt="dashboard" class="h-7 w-7">
                       <span class="mx-3">Support</span>
                   </a>
                   @endcan
                {{-- @can('manage contacts')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.contacts') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                        href="{{ route('admin.contacts') }}">
                        <img src="{{ asset('images/social-icons/contact.png') }}" alt="dashboard" class="w-6 h-6">
                        <span class="mx-3">Contacts</span>
                    </a>
                @endcan --}}
                @can('manage jobs')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('jobDashboard') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                        href="{{ route('jobDashboard') }}">
                        <img src="{{ asset('images/social-icons/jobs.png') }}" alt="jobs"
                            class="w-6 h-6">
                        <span class="mx-3">Jobs</span>
                    </a>
                @endcan

                @can('manage users')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.users') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                        href="{{ route('admin.users') }}">
                        <img src="{{ asset('images/social-icons/management.png') }}" alt="dashboard"
                            class="w-6 h-6">
                        <span class="mx-3">Users</span>
                    </a>
                @endcan
                @can('view subscribers')
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('admin.subscribers') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                        href="{{ route('admin.subscribers') }}">
                        <img src="{{ asset('images/social-icons/subscription.png') }}" alt="dashboard"
                            class="w-6 h-6">
                        <span class="mx-3">Subscribers</span>
                    </a>
                @endcan
                <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ request()->routeIs('profile.show') ? 'text-gray-100 bg-gray-700 bg-opacity-25' : '' }}"
                    href="{{ route('profile.show') }}">
                    <img src="{{ asset('images/social-icons/settings.png') }}" class="w-6 h-6" alt="settings">
                    <span class="mx-3">Profile Settings</span>
                </a>
            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>

                    <div class="relative mx-4 lg:mx-0">
                       <a href="/">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <img src="{{asset('images/home.png')}}" class="w-5 h-5">
                        </span>
                        <p class="text-gray-700 pl-9 hover:text-blue-500">
                            Home
                        </p>
                       </a>
                    </div>
                </div>

                <div class="flex items-center">
                    {{-- <div x-data="{ notificationOpen: false }" class="relative">
                        <button @click="notificationOpen = ! notificationOpen"
                            class="flex mx-4 text-gray-600 focus:outline-none">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>

                        <div x-show="notificationOpen" @click="notificationOpen = false"
                            class="fixed inset-0 z-10 w-full h-full" style="display: none;"></div>

                        <div x-show="notificationOpen"
                            class="absolute right-0 z-10 mt-2 overflow-hidden bg-white rounded-lg shadow-xl w-80"
                            style="width: 20rem; display: none;">
                            <a href="#"
                                class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                    alt="avatar">
                                <p class="mx-2 text-sm">
                                    <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                        class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                    src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
                                    alt="avatar">
                                <p class="mx-2 text-sm">
                                    <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                    src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                    alt="avatar">
                                <p class="mx-2 text-sm">
                                    <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                                        class="font-bold text-indigo-400" href="#">Test with TDD</span> artical . 1h
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600">
                                <img class="object-cover w-8 h-8 mx-1 rounded-full"
                                    src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=398&amp;q=80"
                                    alt="avatar">
                                <p class="mx-2 text-sm">
                                    <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                </p>
                            </a>
                        </div>
                    </div> --}}

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                            class="relative block w-8 h-8 overflow-hidden rounded-full shadow focus:outline-none">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="object-cover w-full h-full" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 z-10 w-full h-full" style="display: none;"></div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl"
                            style="display: none;">
                            @can('manage auth')
                                <!-- Authorization Management -->
                                <div class="block px-4 py-3 text-xs text-gray-400">
                                    {{ __('Manage Authorization') }}
                                </div>
                                <a href="{{ route('admin.roles') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                                    {{ __('Manage Roles') }}
                                </a>
                                <a href="{{ route('admin.permissions') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                                    {{ __('Manage Permissions') }}
                                </a>
                            @endcan
                            @can('manage users')
                                <a href="{{ route('admin.users') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
                                    {{ __('Manage Users') }}
                                </a>
                            @endcan
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile
                            </a>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">API
                                    Tokens
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                       this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Log
                                    Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200" id="main">
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
    {{ $scripts ?? '' }}

</body>

</html>
