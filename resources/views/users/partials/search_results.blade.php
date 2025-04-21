@if($users->count() > 0)
    <ul class="space-y-4">
        @foreach($users as $user)
            @if(!empty($user->username) && $user->id != auth()->id())  <!-- Exclude the current logged-in user -->
                <li class="flex flex-col sm:flex-row items-center justify-between p-4 border border-gray-300 rounded-xl bg-white shadow hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        <!-- User Avatar -->
                        <img src="{{ $user->profile_picture ?? asset('imgs/default-avatar.png') }}" 
                             class="w-12 h-12 rounded-full border border-green-400 shadow-sm object-cover" 
                             alt="{{ $user->name }}'s Avatar">

                        <div>
                            <!-- User Name and Username -->
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $user->name }} 
                                <span class="text-sm text-gray-500"><span>@</span>{{ $user->username }}</span>
                            </h3>
                            <p class="text-sm text-gray-600">{{ Str::limit($user->bio, 100) }}</p>
                        </div>
                    </div>

                    <!-- Buttons Container -->
                    <div class="flex gap-4 ml-auto mt-4 sm:mt-0 sm:flex-row sm:gap-4 sm:ml-6">
                        <!-- View Profile Button -->
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" 
                           class="text-white bg-green-900 px-4 py-2 rounded-md hover:bg-green-950 transition">
                            View Profile
                        </a>

                        <!-- Admin Only Actions -->
                        @if(auth()->check() && auth()->user()->is_admin)
                            <!-- Delete User -->
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white rounded-lg px-4 py-2 hover:bg-red-700 transition">
                                    Delete User
                                </button>
                            </form>

                            <!-- Ban or Unban -->
                            @if($user->banned)
                                <form action="{{ route('users.unban', ['id' => $user->id]) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Unban this user?');">
                                    @csrf
                                    <button class="bg-orange-500 text-white rounded-lg px-4 py-2 hover:bg-blue-700 transition">
                                        Unban User
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('users.ban', ['id' => $user->id]) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Ban this user?');">
                                    @csrf
                                    <button class="bg-orange-500 text-white rounded-lg px-4 py-2 hover:bg-orange-700 transition">
                                        Ban User
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
@else
    <p class="text-gray-800 text-lg font-medium">No users found!</p>
@endif
