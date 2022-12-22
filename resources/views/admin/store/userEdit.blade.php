@section('title', 'Kullanıcı Bilgileri')
<x-app-layout>
    <x-slot name="header">Kullanıcı Bilgilerini Güncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form class="p-2 m-1" method="POST" action="{{ route('userlist.update', $userEdit->id) }}">
                @method('PUT')
                @csrf
                <label for="name" class="form-label"><strong>İsim ve Soyisim</strong></label>
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" value="{{ $userEdit->name }}">
                </div>
                <label for="email" class="form-label"><strong>E-Mail Adresi</strong></label>
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" value="{{ $userEdit->email }}">
                </div>
                <label for="type" class="form-label"><strong>Kullanıcı Tipi</strong></label>
                <div class="mb-3">
                    <input type="text" name="type" class="form-control" value="{{ $userEdit->type }}">
                </div>
                <label for="role" class="form-label"><strong>Kullanıcı Rolü</strong></label>
                <div class="mb-3">
                    <select class="form-select" name="role">
                        @foreach ($userRole as $role)
                            <option value="{{ $role->name }}" {{ $userEdit->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->id }} - {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-passwordmanager">Güncelle</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a class="btn btn-dark" href="{{ url()->previous() }}" role="button">Vazgeç</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
