@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-3xl font-bold mb-4">Contact Messages</h2>
    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-green-800 text-white">
            <tr>
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Message</th>
                <th class="p-2">Sent At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
                <tr class="border-t border-gray-200">
                    <td class="p-2">{{ $msg->name }}</td>
                    <td class="p-2">{{ $msg->email }}</td>
                    <td class="p-2">{{ $msg->message }}</td>
                    <td class="p-2">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
