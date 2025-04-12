@if($users->count() > 0)
    <ul class="space-y-4">
        @foreach($users as $user)
            @if(!empty($user->username))
                <li class="flex items-center justify-between p-4 border border-gray-300 rounded-xl bg-white shadow hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4">
                        <img src="{{ $user->profile_picture ?? asset('imgs/default-avatar.png') }}" 
                             class="w-12 h-12 rounded-full border border-green-400 shadow-sm object-cover" 
                             alt="{{ $user->name }}'s Avatar">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $user->name }} <span class="text-sm text-gray-500"><span>@</span>{{ $user->username }}</span>
                            </h3>
                            <p class="text-sm text-gray-600">{{ Str::limit($user->bio, 100) }}</p>
                        </div>
                    </div>

                    <a href="{{ route('users.show', ['username' => $user->username]) }}"
                       class="text-sm text-white bg-green-900 px-4 py-1.5 rounded-md hover:bg-green-950 transition">
                        View Profile
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@else
    <p class="text-gray-800 text-lg font-medium">No users found!</p>
@endif
