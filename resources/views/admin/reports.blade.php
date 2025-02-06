<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Управление заявками') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 text-red-600">{{ session('error') }}</div>
                    @endif

                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">ФИО</th>
                                <th class="border p-2">Тема</th>
                                <th class="border p-2">Секция</th>
                                <th class="border p-2">Статус</th>
                                <th class="border p-2">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="text-center">
                                    <td class="border p-2">{{ $report->fullname }}</td>
                                    <td class="border p-2">{{ $report->theme }}</td>
                                    <td class="border p-2">{{ $report->section->title }}</td>
                                    <td class="border p-2">{{ $report->status }}</td>
                                    <td class="border p-2">
                                        @if ($report->status === 'pending')
                                            <form action="{{ route('admin.reports.approve', $report) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-4 py-2 rounded">Одобрить</button>
                                            </form>
                                            <form action="{{ route('admin.reports.reject', $report) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded">Отклонить</button>
                                            </form>
                                        @else
                                            <span class="text-gray-500">Заявка {{ $report->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
