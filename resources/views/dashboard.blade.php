<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Подать заявку на участие в конференции') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($existingReport)
                        <p class="text-lg text-gray-600">Вы уже отправили заявку на участие.</p>
                    @else
                        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="fullname" class="block text-sm font-medium text-gray-700">ФИО:</label>
                                <input type="text" id="fullname" name="fullname"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="theme" class="block text-sm font-medium text-gray-700">Тема
                                    выступления:</label>
                                <input type="text" id="theme" name="theme"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <div class="mb-4">
                                <label for="section_id" class="block text-sm font-medium text-gray-700">Секция:</label>
                                <select name="section_id" id="section_id"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="block text-sm font-medium text-gray-700">Загрузить фото
                                    спикера:</label>
                                <input type="file" id="photo" name="photo"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <button type="submit" class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded">
                                Отправить заявку
                            </button>
                        </form>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">← Вернуться к списку
                            конференций</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
