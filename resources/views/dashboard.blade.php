@section('title', 'Anasayfa')
<x-app-layout>
    <div class="container text-center">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-.{{ $passwordtype_count }} mb-2">
            {{-- Top Password Type and Password Count --}}
            @foreach ($passwordtypes as $type)
                <div class="col col-sm col-md">
                    <div class="text-center">
                        <div class="card text-bg-passwordmanager mb-3">
                            <div class="card-header">
                                <strong>{{ $type->type_name }}</strong>
                            </div>
                            <div class="card-body">

                                <h5 class="card-title">
                                    <i class="{{ $type->sembol }} fa-3x"></i>
                                </h5>
                                <p class="card-text"><strong>{{ $type->stores_count }} Şifre</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                {{-- bAŞLAT --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title p-2">Düzenlenmesi gereken Top 10 Şifre</h5>
                        <div class="accordion" id="strong_password_accordion">
                            @foreach ($getpassword as $type)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading{{ $type->id }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $type->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $type->id }}">
                                            {{ $type->title }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $type->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading{{ $type->id }}"
                                        data-bs-parent="#strong_password_accordion">
                                        <div class="accordion-body">
                                            <div class="alert alert-warning" role="alert">
                                                <h4 class="alert-heading">Düzenlenmesi gerekli!</h4>
                                                <hr>
                                                <ol class="list-unstyled">
                                                    <li>1- Şifren en az 8 karakterden oluşmalı</li>
                                                    <li>2- İçerisinde en az 1 adet büyük harf olmalı</li>
                                                    <li>3- İçerisinde en az 1 adet küçük harf olmalı</li>
                                                    <li>4- Sadece şu özel karakterleri içermeli <code>@!%*+?&</code></li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- bİTİR --}}
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                {{-- bAŞLAT --}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title p-2">Son eklenen 10 şifre</h5>
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
                </div>
                {{-- bİTİR --}}
            </div>
        </div>
    </div>
</x-app-layout>
