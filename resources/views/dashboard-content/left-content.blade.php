<div class="card">
    <div class="card-body">
        <h5 class="card-title p-2">Düzenlenmesi gereken Top 10 Şifre</h5>
        <div class="accordion" id="strong_password_accordion">
            @foreach ($getpassword as $type)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{ $type->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $type->id }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $type->id }}">
                            {{ $type->title }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $type->id }}" class="accordion-collapse collapse"
                        aria-labelledby="flush-heading{{ $type->id }}" data-bs-parent="#strong_password_accordion">
                        <div class="accordion-body">
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Düzenlenmesi gerekli!</h4>
                                <hr>
                                <ol class="list-unstyled">
                                    @if (!preg_match('/[A-Z]/', $type->password))
                                        <li>İçerisinde en az 1 adet büyük harf olmalı</li>
                                    @endif
                                    @if (!preg_match('/[a-z]/', $type->password))
                                        <li>İçerisinde en az 1 adet küçük harf olmalı</li>
                                    @endif
                                    @if (!preg_match('/\d/', $type->password))
                                        <li>İçerisinde en az 1 adet rakam olmalı</li>
                                    @endif
                                    @if (!preg_match('/[=@!%*\-+?&.\/_]/', $type->password))
                                        <li>Şu özel karakterleri içermeli <code>=@!%*-+?&./_</code></li>
                                    @else
                                        <li>
                                            <strong>Sadece</strong> bu karakterleri
                                            içermelidir.
                                            <strong>" <code>=@!%*-+?&./_</code> "</strong>
                                        </li>
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
