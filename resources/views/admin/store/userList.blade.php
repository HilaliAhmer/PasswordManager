@section('title','Kullanıcı Listesi')
<x-app-layout>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered table-hover caption-top">
                    <caption>Kullanıcı Listesi</caption>
                    <thead>
                        <tr>
                            <th scope="col">İsim ve Soyisim</th>
                            <th scope="col">Email</th>
                            <th scope="col">Kullanıcı Tipi</i></th>
                            <th scope="col">Rol</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('userlist.edit', $user->id) }}"
                                        class="btn btn-sm btn-primariy"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
