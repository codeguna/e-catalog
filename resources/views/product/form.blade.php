<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" class="form-control-file{{ $errors->has('picture') ? ' is-invalid' : '' }}"
                id="picture" name="picture">
            @if ($errors->has('picture'))
                <div class="invalid-feedback">
                    {{ $errors->first('picture') }}
                </div>
            @endif

            @if (!empty($product->picture))
                <div class="mt-2">
                    <img class="profile-user-img img-fluid" src="/product_pictures/{{ $product->picture }}"
                        style="height: 50px" alt="Product picture" loading="lazy">
                </div>
                <small class="text-danger">{{ $product->picture }}</small>
            @endif
        </div>


        <div class="form-group">
            <label>Product Type</label>
            <select class="form-control" name="type" required>
                <option disabled {{ is_null($product->type) ? 'selected' : '' }}>== Select Type ==</option>
                <option value="1" {{ $product->type == 1 ? 'selected' : '' }}>Satuan</option>
                <option value="2" {{ $product->type == 2 ? 'selected' : '' }}>Paket</option>
                <option value="3" {{ $product->type == 3 ? 'selected' : '' }}>Sekolah</option>
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
