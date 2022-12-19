@section('title','Anasayfa')
<x-app-layout>
    <div class="container text-center">
        <div class="row  row-cols-sm-2 row-cols-md-4 mb-2">
            {{-- 1 --}}
            <div class="col col-sm col-md">
                <div class="text-center">
                    <div class="pb-3 fs-2">
                        <strong>Bilgi İşlem</strong>
                    </div>
                    <div>
                        <i class="fa-solid fa-sitemap fa-5x"></i>
                    </div>
                    <div class="pb-3 fs-4">
                        <strong>{{ $getitcountdashboard }} Şifre</strong>
                    </div>

                </div>
            </div>
            {{-- 2 --}}
            <div class="col col-sm col-md">
                <div class="text-center">
                    <div class="pb-3 fs-2">
                        <strong>System ve Network</strong>
                    </div>
                    <div>
                        <i class="fa-solid fa-ethernet fa-5x"></i>
                    </div>
                    <div class="pb-3 fs-4">
                        <strong>{{ $getsystemcountdashboard }} Şifre</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <ol class="list-group list-group-numbered">
                    @foreach ($getpassworddashboard as $p)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    {{ Str::limit($p->title, config('app.text_limit')) }}
                                </div>
                                {{ Str::limit($p->description, config('app.text_limit')) }}
                            </div>
                            <small
                                class="text-mute">{{ $p->created_at ? $p->created_at->diffForHumans() . ' oluşturuldu' : null }}
                            </small>
                        </li>
                    @endforeach
                </ol>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">

            </div>
        </div>
    </div>
</x-app-layout>
