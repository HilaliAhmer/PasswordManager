@section('title', 'Bilgi İşlem Şifreler')
<x-app-layout>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 d-grid mb-2">
                        <a href="{{ route('password.create') }}" class="btn btn-passwordmanager"><i
                                class="fa-regular fa-square-plus"></i> Yeni Şifre</a>
                    </div>
                    <div class="col-md-4 d-grid mb-2">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" name="title" placeholder="Şifre ara" class="form-control"
                                    value="{{ request()->get('title') }}">
                                <div class="input-group-text"><i class="fa fa-search"></i></div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="border border-primary border-1 opacity-50">
                <div class="table-responsive-md">
                    <table class="table table-hover caption-top">
                        @foreach ($listname as $lname)
                            <caption>{{ $lname->type_name }}</caption>
                        @endforeach
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
                            @foreach ($passwordUserStore as $password)
                                <tr>
                                    <td>
                                        <p data-bs-toggle="title-tooltip" data-bs-title="{{ $password->title }}">
                                            {{ Str::limit($password->title, config('app.text_limit')) }}
                                        </p>
                                    </td>
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
                                        <a href="{{ $password->url }}"
                                            target="_blank">{{ Str::limit($password->url, config('app.text_limit'), '...') }}</a>
                                    </td>
                                    <td>
                                        <p data-bs-toggle="description-tooltip"
                                            data-bs-title="{{ $password->description }}">
                                            {{ Str::limit($password->description, config('app.text_limit'), '...') }}
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('password.edit', $password->id) }}"
                                            class="btn btn-sm btn-primariy"><i class="fa fa-edit"></i></a>
                                        @role('IT Super Admin')
                                            <a href="{{ route('password.destroy', $password->id) }}"
                                                class="btn btn-sm btn-primariy"><i class="fa-solid fa-trash"></i></a>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $passwordUserStore->links('pagination.custom') }}
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

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="description-tooltip"')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
