<x-app-layout>
    <x-slot name="header">Şifre Güncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form class="p-1 m-1" method="POST" action="{{ route('password.update',[$passedit->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Şifre Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $passedit->title}}">
                </div>
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="username" class="form-control" value="{{ $passedit->username }}">
                </div>
                <div class="form-group">
                    <label>Şifre</label>
                    <input type="text" name="password" class="form-control" value="{{ $passedit->password }}">
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="url" name="url" class="form-control" value="{{ $passedit->url }}">
                </div>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="description" class="form-control" rows="5" >{{ $passedit->description }}</textarea>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-primary">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
