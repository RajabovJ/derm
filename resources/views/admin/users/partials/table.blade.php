@forelse ($users as $index => $user)
    <tr onclick="window.location='{{ route('users.show', $user->id) }}'" style="cursor:pointer;">
        <td>{{ $users->firstItem() + $index }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if ($user->role && $user->role->name === 'doctor')
                <span class="badge badge-info">Shifokor</span>
            @else
                <span class="badge badge-secondary">{{ ucfirst($user->role->name ?? 'Nomaʼlum') }}</span>
            @endif
        </td>
        <td>{{ $user->created_at->format('Y-m-d') }}</td>
        <td>
            <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Haqiqatan o‘chirmoqchimisiz?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> O'chirish
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">Foydalanuvchilar topilmadi.</td>
    </tr>
@endforelse
