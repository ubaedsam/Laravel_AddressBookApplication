<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address Book Application</title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('icon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('icon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('icon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('icon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('icon/apple-touch-icon-60x60.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset('icon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('icon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset('icon/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-196x196.png') }}" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-16x16.png') }}" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon-128.png') }}" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('icon/mstile-144x144.png') }}" />
    <meta name="msapplication-square70x70logo" content="{{ asset('icon/mstile-70x70.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ asset('icon/mstile-150x150.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('icon/mstile-310x150.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ asset('icon/mstile-310x310.png') }}" />    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
  rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
  </head>
  <body>
    
        <nav class="bg-white shadow-lg border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('user.home') }}" class="flex items-center">
                <img src="/logo.jpg" class="h-8 mr-3" />
                <span class="self-center text-primary-700 text-1xl font-bold whitespace-nowrap dark:text-white">Address Book Application</span>
            </a>
            <div class="flex items-center md:order-2">
                <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://mdbcdn.b-cdn.net/img/new/avatars/8.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                    <span class="block px-4 py-2 text-sm text-gray-900 dark:text-white">{{ Auth::guard('web')->user()->name }}</span>
                    </li>
                </ul>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                    <span class="block px-4 py-2 text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::guard('web')->user()->email }}</span>
                    </li>
                </ul>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                    <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                    <form action="{{ route('user.logout') }}" method="POST" class="d-none" id="logout-form">
                        @csrf
                    </form>
                    </li>
                </ul>
                </div>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                <a href="{{ route('user.home') }}" class="block py-2 pl-3 pr-4 text-1xl font-bold text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                </li>
                <li>
                <a href="{{ route('user.group') }}" class="block py-2 pl-3 pr-4 text-1xl font-bold text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Group</a>
                </li>
                <li>
                <a href="{{ route('user.contact') }}" class="block py-2 pl-3 pr-4 text-1xl font-bold text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
            </div>
            </div>
        </nav>

        <div class="py-7 px-6 dark:bg-neutral-900">
          <div class="col-md-12 flex justify-center">
            <img src="/welcome.png" width="400px" class="lg:w-[600px] flex justify-center mb-2">
          </div>
          <div class="col-md-12 text-center">
            <h1 class="mt-2 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                Welcome to <br /><span class="text-primary">Web Address Book Application</span>
            </h1>
          </div>
        </div>

        <script>
            tailwind.config = {
              darkMode: "class",
              theme: {
                fontFamily: {
                  sans: ["Roboto", "sans-serif"],
                  body: ["Roboto", "sans-serif"],
                  mono: ["ui-monospace", "monospace"],
                },
              },
              corePlugins: {
                preflight: false,
              },
            };
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
        <script src="https://cdn.tailwindcss.com/3.3.0"></script>
  </body>
</html>