<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ediatar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label class="@error('product_name') border-danger text-danger @enderror">Nombre
                                Producto</label>
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <span
                                        class="input-group-text @error('product_name') border-danger text-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z" />
                                        </svg>
                                    </span>
                                    <input class="form-control @error('product_name') is-invalid @enderror"
                                        type="text" name="product_name"
                                        value="{{ old('product_name', $product->name) }}" placeholder="Nombre Producto">
                                </div>
                                @error('product_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="@error('product_unit') border-danger text-danger @enderror">Unidad de medida
                                producto</label>
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <span
                                        class="input-group-text @error('product_unit') border-danger text-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z" />
                                        </svg>
                                    </span>
                                    <select class="form-control" name="product_unit">
                                        <option value="">SELECIONE UNIDAD</option>
                                        @foreach ($productUnits as $productUnit)
                                            <option value="{{ $productUnit->id }}"
                                                {{ old('product_unit', $product->productUnit->id) == $productUnit->id ? 'selected' : '' }}>
                                                {{ $productUnit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_unit')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="@error('providers_id') border-danger text-danger @enderror">Proveedor</label>
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <span
                                        class="input-group-text @error('providers_id') border-danger text-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z" />
                                        </svg>
                                    </span>
                                    <select class="form-control" name="providers_id">
                                        <option value="">SELECIONE PROVEDOR</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}"
                                                {{ old('providers_id', $product->productProvider->id) == $provider->id ? 'selected' : '' }}>
                                                {{ $provider->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('providers_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="@error('product_category') border-danger text-danger @enderror">Categoria
                                Producto</label>
                            <div class="form-group mb-4">
                                <div class="input-group input-group-alternative">
                                    <span
                                        class="input-group-text @error('product_category') border-danger text-danger @enderror">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C2.25 2 1.49 2.759 1.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6ZM14.886 7.9v.164c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456v-1.3c-1.114 0-1.49-.362-1.49-1.456V4.352C14.51 2.759 13.75 2 12.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6ZM7.5 11.5V9.207l-1.621 1.621-.707-.707L6.792 8.5H4.5v-1h2.293L5.172 5.879l.707-.707L7.5 6.792V4.5h1v2.293l1.621-1.621.707.707L9.208 7.5H11.5v1H9.207l1.621 1.621-.707.707L8.5 9.208V11.5h-1Z" />
                                        </svg>
                                    </span>
                                    <select class="form-control" name="product_category">
                                        <option value="">SELECIONE UNIDAD</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                {{ old('product_category', $product->productCategory->id) == $productCategory->id ? 'selected' : '' }}>
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_category')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="@error('product_description') border-danger text-danger @enderror">Descripción
                            Producto</label>
                        <textarea style="resize: none;" name="product_description" class="form-control" rows="5" cols="10">{{ old('product_description', $product->description) }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Cancelar</button>
                    <button type="submit" class="btn btn-warning"><strong>EDITAR</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
