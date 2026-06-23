<div>

    <select id="{{ $id }}" name="{{ $name }}" class="form-control custom-select">
        <option value="">Select Brand...</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}"
                @if(isset($product) && $product->brand_id==$brand->id)
                selected
                @elseif(old('brand_id')==$brand->id)
                selected
                @endif

                > {{ $brand->name }} </option>
        @endforeach
    </select>


</div>
