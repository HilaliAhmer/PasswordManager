@section('title', 'Şifre Güncelle')
<x-app-layout>
    <x-slot name="header">Şifre Kopyala</x-slot>
    <div class="card">
        <div class="card-body">
            <form class="p-2 m-1" method="POST" action="{{ route('password.clone_update', $passwordEdit->id) }}">
                @method('PUT')
                @csrf
                <label for="title" class="form-label">Şifre Başlığı</label>
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" value="{{ $passwordEdit->title }}">
                </div>
                <label for="username" class="form-label">Kullanıcı Adı</label>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" value="{{ $passwordEdit->username }}">
                </div>
                <label for="password" class="form-label">Şifre</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" id="createPassword"
                        value="{{ $passwordEdit->password }}">
                    <span class="input-group-text" onclick="myFunction()"><i class="fa fa-eye"></i></span>
                </div>
                <label for="password_type_id" class="form-label">Şifre Tipi</label>
                <div class="mb-3">
                    <select class="form-select" name="password_type_id">
                        @foreach ($passwordType as $type)
                            <option value="{{ $type->id }}"
                                {{ $type->id == $passwordEdit->password_type_id ? 'selected' : '' }}>{{ $type->id }}
                                -
                                {{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="url" class="form-label">URL</label>
                <div class="mb-3">
                    <input type="url" name="url" class="form-control" value="{{ $passwordEdit->url }}">
                </div>
                <label for="description" class="form-label">Açıklama</label>
                <div class="mb-3">
                    <textarea name="description" class="form-control" rows="5">{{ $passwordEdit->description }}</textarea>
                </div>
                <div class="mb-3 d-grid gap-2 ">
                    <button type="submit" class="btn btn-passwordmanager">Kaydet</button>
                    <a href="{{ URL::previous() }}" class="btn btn-dark" type="button">Vazgeç</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("createPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</x-app-layout>
