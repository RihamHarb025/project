@forelse ($users as $user)
<tr class="border-b hover:bg-gray-50 transition">
  <td class="py-3 px-4">{{ $user->name }}</td>
  <td class="py-3 px-4">{{ $user->email }}</td>
  <td class="py-3 px-4">
    @if($user->is_admin)
      Admin
    @else
      User
    @endif
  </td>
  <td class="py-3 px-4">
    @if ($user->banned)
      <form action="{{ route('admin.users.unban', $user->id) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-orange-500 text-white rounded-lg p-2 hover:bg-orange-700">Unban</button>
      </form>
    @else
      <form action="{{ route('admin.users.ban', $user->id) }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-orange-500 text-white rounded-lg p-2 w-16 hover:bg-orange-700">Ban</button>
      </form>
    @endif
  </td>
</tr>
@empty
<tr>
  <td colspan="4" class="py-4 text-center text-gray-500">No users found.</td>
</tr>
@endforelse
