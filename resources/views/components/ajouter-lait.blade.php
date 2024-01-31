<div>
    <button id="rest" type="button" class="btn btn-info mt-2">
        restar <i class="fa fa-plus color-primary"></i>
    </button>

    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#ajouterlait">
        Ajouter le lait <i class="fa fa-plus color-info"></i>
    </button>



    <div class="modal fade" id="ajouterlait" tabindex="-1" aria-labelledby="ajouterlaitLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <legend>ajouter le lait </legend>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('milk_store') }}" method="post">


                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">

                            <select class="form-select" id="id_user" name="id_user"
                                aria-label="Default select example">
                                <option selected value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                                </option>
                            </select>

                        </div>
                        <div class="mb-3">

                            <select class="form-select" name="id_client" id="id_client"
                                aria-label="Default select example">
                                <option>shoisi une clinet</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->id }} - {{ $client->nameCLI }}
                                    </option>
                                @endforeach

                            </select>
                            <span class="text-danger">
                                @error('id_client')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">

                            <select class="form-select" name="period" id="period"
                                aria-label="Default select example">
                                <option value="matin">matin</option>
                                <option value="soir">soir</option>
                            </select>
                            <span class="text-danger">
                                @error('period')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">quantity de lait</label>
                            <input type="number" step="0.01" id="quantity" name="quantity" class="form-control"
                                placeholder="ex: 20" pattern="[0-9]*" inputmode="numeric">
                            <span class="text-danger">
                                @error('quantity')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="T" id="T"
                                aria-label="Default select example">
                                <option value="1">T 1</option>
                                <option value="2">T 2</option>
                                <option value="3">T 3</option>
                                <option value="4">Lban</option>
                            </select>
                            <span class="text-danger">
                                @error('T')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="denisty" class="form-label">density</label>
                            <input type="number" id="density" name="density" class="form-control" value="25"
                                pattern="[0-9-.]*" inputmode="numeric">
                            <span class="text-danger">
                                @error('density')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="heat" class="form-label">Température de lait</label>
                            <input type="number" id="heat" name="heat" class="form-control" value="20"
                                pattern="[0-9]*" inputmode="numeric">
                            <span class="text-danger">
                                @error('heat')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annullé</button>
                        <button type="submit" id="sub" class="btn btn-primary"> Enregistrer </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
