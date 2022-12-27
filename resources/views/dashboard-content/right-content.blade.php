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
