<x-app-layout>
    <x-slot name="header">Listele</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="$" class="btn btn-outline-secondary"><i class="fa-regular fa-square-plus"></i> Password
                    Ekle</a>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Password Title</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">URL</th>
                            <th scope="col">Description</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passwordStore as $password)
                            <tr>
                                <td>{{ $password->title }}</td>
                                <td>{{ $password->username }}</td>
                                <td>********</td>
                                <td>{{ $password->url }}</td>
                                <td>{{ $password->description }}</td>
                                <td class="grid">
                                    <a href="#" class="btn btn-sm btn-primariy"><i class="fa fa-edit"></i></a>
                                    <!-- Button trigger modal START -->
                                    <a href="#" class="btn btn-sm btn-primariy"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <!-- Button trigger modal END -->
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
