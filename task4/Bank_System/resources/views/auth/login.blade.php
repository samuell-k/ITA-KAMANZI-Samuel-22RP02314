<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
           <h2 class="text-center text-3xl font-extrabold" style="color: rgb(96, 166, 11);">
  Sign In to Your Account
</h2> </div>
            <form class="mt-8 space-y-6" action="{{ url('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Email address">
                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Password">
                        @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

               <button type="submit" 
    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm 
           text-white bg-gradient-to-r from-green-500 to-green-700 
           hover:from-green-600 hover:to-green-800 focus:outline-none 
           focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
    Sign In
</button>
            </form>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Create an account</a></p>
            </div>
        </div>
    </div>

</body>
</html>
