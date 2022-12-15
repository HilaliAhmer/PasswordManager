<x-app-layout>
    <x-slot name="header">Listele</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('stores.create') }}" class="btn btn-outline-secondary "><i
                        class="fa-regular fa-square-plus"></i> Yeni Şifre</a>
            </h5>
            <div class="table-responsive-md">
                <table class="table table-bordered table-hover caption-top">
                    <caption>System and Networks</caption>
                    <thead>
                        <tr>
                            <th scope="col">Şifre Adı</th>
                            <th scope="col">Kullanıcı Adı</th>
                            <th scope="col">Şifre</th>
                            <th scope="col">URL</th>
                            <th scope="col">Açıklama</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passwordStore as $password)
                            <tr>
                                <td>{{ Str::limit($password->title, 20) }}</td>
                                <td><strong>{{ $password->username }}</strong></td>
                                <td>
                                    <div class="input-group">
                                        <input id="{{ $password->id }}" type="password"
                                            class="form-control form-control-sm" value="{{ $password->password }}"
                                            disabled readonly>
                                        <i class="input-group-text pt-7 fas fa-eye"></i>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ $password->url }}">{{ Str::limit($password->url, 20, '...') }}</a>
                                </td>
                                <td>{{ Str::limit($password->description, 20, '...') }}</td>
                                <td>
                                    <a href="{{ route('stores.edit', $password->id) }}"
                                        class="btn btn-sm btn-primariy"><i class="fa fa-edit"></i></a>
                                    @if (Auth()->user()->type == 'admin')
                                        <a href="#" class="btn btn-sm btn-primariy"><i
                                                class="fa-solid fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $passwordStore->links() }}
            </div>
        </div>
</x-app-layout>
<script>
    var parent = document.querySelector(".card");
    // password show/hide helper function
    function showHide(input, i) {
        if (input.getAttribute("type") === "password") {
            input.setAttribute("type", "text");
            i.setAttribute("class", "input-group-text pt-7 fas fa-eye");
        } else {
            input.setAttribute("type", "password");
            i.setAttribute("class", "input-group-text pt-7 fas fa-eye");
        }
    }
    // event delegation on event target match
    parent.addEventListener("click", event => {
        if (event.target.matches("i")) {
            var spanElm = event.target;
            var inputElm = spanElm.previousElementSibling;
            showHide(inputElm, spanElm);
        }
    });
</script>
