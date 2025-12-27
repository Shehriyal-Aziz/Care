<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <!-- Page title -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>

        <!-- Home link with icon, moved to the right -->
        <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0 0h4m-4 0H7m4 0h4"></path>
            </svg>
            Home
        </a>
    </div>
</x-slot>



<hr class="my-6 border-gray-200">

<div class=" upgradebtn bg-[rgb(243,244,246)] shadow sm:rounded-lg p-6">
    <div class=" boxy flex items-center justify-between">
        <div>
            <h6 class="text-lg font-medium text-gray-900">Become a Doctor</h6>
            <p class="mt-1 text-sm text-gray-600">
                If you have the skills of a doctor, apply now.
            </p>
        </div>

        <div>
            @if(Auth::user()->doctorstatus != 'accepted')
                <x-button class="ml-4" onclick="window.location='{{ url('/applyfordoctor') }}'">
                    {{ __('Upgrade to Doctor') }}
                </x-button>
            @endif
        </div>
    </div>
</div>
<style>
    .boxy{
         margin-left: 50px;
         margin-right: 50px;
    }
    .upgradebtn{
       height: 300px;
       justify-content: center;
       align-content: center;
    }
</style>

<hr class="my-6 border-gray-200">



        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')

            <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
            @endif
        </div>
    </div>
</x-app-layout>