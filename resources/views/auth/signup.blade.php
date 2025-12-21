<x-layout-simple :title="$pageTitle">
    <!--
  This example requires updating your template:

  <html class="h-full bg-white">
  <body class="h-full">
-->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" class="mx-auto h-10 w-auto" /></a>
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                Create a new account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/signup" method="POST" class="space-y-6">
                @csrf
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">
                        Full name
                    </label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" required value="{{ old('name') }}"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">
                        Email address
                    </label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" required autocomplete="email"
                            value="{{ old('email') }}"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">
                        Password
                    </label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">
                        Confirm password
                    </label>
                    <div class="mt-2">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            autocomplete="new-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                    </div>
                </div>
                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create account
                    </button>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500 text-sm">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already have an account?
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">
                    Sign in
                </a>
            </p>
        </div>
    </div>

</x-layout-simple>
