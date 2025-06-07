@extends('admin.layouts.app')
@section('title','Foydalanuvchilar')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Foydalanuvchilar</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Foydalanuvchilar</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Foydalanuvchilar ro'yxati</h3>

            <div class="card-tools">
                <form method="GET" action="{{ localized_route('users.index') }}">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Ism yoki email..."
                            value="{{ request('search') }}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i> Qidirish
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ism</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Yaratilgan sana</th>
                        <th class="col-md-2">Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role->name === 'doctor')
                                    <span class="badge badge-info">Shifokor</span>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($user->role->name) }}</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <!-- Ko'rish tugmasi -->
                                <a href="{{ localized_route('users.show', $user->id) }}" class="btn btn-info btn-sm" title="Ko‘rish">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Tahrirlash tugmasi -->
                                <a href="{{ localized_route('users.edit', $user->id) }}" class="btn btn-primary btn-sm ml-1" title="Tahrirlash">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- O'chirish tugmasi -->
                                <form action="{{ localized_route('users.destroy', $user->id) }}" method="POST"
                                      onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-1" title="O'chirish">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                                <!-- Adminlikni berish yoki olib tashlash -->
                                @if ($user->role->name === 'doctor')
                                    <form action="{{ localized_route('users.promoteToAdmin', $user->id) }}" method="POST" style="display:inline-block;" class="ml-1">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm" title="Admin sifatida tanlash">
                                            <i class="fas fa-user-shield"></i>
                                        </button>
                                    </form>
                                @elseif ($user->role->name === 'admin')
                                    <form action="{{ localized_route('users.demoteFromAdmin', $user->id) }}" method="POST" style="display:inline-block;" class="ml-1">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-sm" title="Adminlikni olib tashlash">
                                            <i class="fas fa-user-slash"></i>
                                        </button>
                                    </form>
                                @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Foydalanuvchi topilmadi.</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $users->appends(['search' => request('search')])->links() }}
        </div>
    </div>


</div>
@endsection


