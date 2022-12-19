<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            <div class="flex items-center  mt-4">
                <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                        style="" >
                    </a>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url('auth/facebook') }}">
                    <img src="https://scontent.fbom19-1.fna.fbcdn.net/v/t39.2365-6/294967112_614766366879300_4791806768823542705_n.png?_nc_cat=105&amp;ccb=1-7&amp;_nc_sid=ad8a9d&amp;_nc_ohc=tWdI3DiNAqEAX9ANpQa&amp;_nc_ht=scontent.fbom19-1.fna&amp;oh=00_AfCr8MudVQCY1RPfKIisczaL_xsM541vp77RulvjKhqKRw&amp;oe=63A5EEA4"
                    width="50%">
                </a>
            </div>
            <div class="flex items-center mt-4 pl-1">
                <a href="{{ url('/login/twitter') }}"> 
                <img src="https://cdn.cms-twdigitalassets.com/content/dam/developer-twitter/auth-docs/sign-in-with-twitter-gray.png.twimg.1920.png"
                     >
                </a>
            </div>
            <div class="flex items-center mt-4">
                <a href="{{ url('/login/github') }}"> 
                <img src="https://coderwall-assets-0.s3.amazonaws.com/uploads/picture/file/4363/github.png">
                </a>
            </div>
           {{-- auth button provide by fb --}}
           {{-- <div class="flex items-center justify-end mt-4">
               <div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true"></div>
           </div> --}}
            <script async defer crossorigin="   anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0&appId=1498119710682767&autoLogAppEvents=1" nonce="IvNKVpzQ"></script>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
