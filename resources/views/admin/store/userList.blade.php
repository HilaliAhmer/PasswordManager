@section('title', 'Kullanıcı Listesi')
<x-app-layout>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-hover caption-top">
                    <caption>Kullanıcı Listesi</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <h5>
                                        <code>
                                            <span class="badge rounded-pill text-bg-secondary">{{ $user->type }}</span>
                                        </code>
                                    </h5>
                                </td>

                                <td>
                                    @foreach ($user->roles as $role)
                                        @switch($role->name)
                                            @case('IT Super Admin')
                                                <span class="badge rounded-pill text-bg-danger">{{ $role->name }}</span>
                                            @break

                                            @case('IT SAP')
                                                <span class="badge rounded-pill text-bg-primary">{{ $role->name }}</span>
                                            @break

                                            @case('IT Non-SAP')
                                                <span class="badge rounded-pill text-bg-warning">{{ $role->name }}</span>
                                            @break

                                            @case('IT Standart User')
                                                <span class="badge rounded-pill text-bg-success">{{ $role->name }}</span>
                                            @break
                                        @endswitch
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('userlist.edit', $user->id) }}" class="btn btn-sm btn-primariy"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('userlist.destroy', $user->id) }}"
                                        class="btn btn-sm btn-primariy"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
</x-app-layout>
