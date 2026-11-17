<x-app-layout>
    <div class="page-header">
        <h1 class="page-title">{{ __('Профиль') }}</h1>
    </div>

    <div class="space-y-6">
        <!-- Информация о профиле -->
        <div class="card">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Обновление пароля -->
        <div class="card">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Удаление аккаунта -->
        <div class="card">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
