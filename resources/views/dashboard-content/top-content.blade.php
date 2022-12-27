<div class="row row-cols-2 row-cols-sm-2 row-cols-md-.{{ $passwordtype_count }} mb-2">
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
