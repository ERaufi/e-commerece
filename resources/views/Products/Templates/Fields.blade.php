<div class="form-container-stack">
    <!-- Section: General Info -->
    <div class="mb-1 pt-1 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">General Information</h3>
        <p class="text-xs text-secondary">Basic product details and categorization.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-3 mb-3">
        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input id="name" name="name" type="text" placeholder="e.g. Wireless Headset" class="form-control"
                value="{{ old('name', $product->name ?? '') }}" />
            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div class="form-group">
            <label for="slug" class="form-label">Slug (URL Part)</label>
            <input id="slug" name="slug" type="text" placeholder="e.g. wireless-headset" class="form-control"
                value="{{ old('slug', $product->slug ?? '') }}" />
            <p class="text-xs text-secondary mt-1">Leave empty to auto-generate from name.</p>
            @error('slue')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-3 mb-3">
        <!-- Category -->
        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <div class="select-wrapper">
                <select id="category_id" name="category_id" class="form-control custom-select">
                    <option value="">Select Category...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($product) && $product->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

        </div>

        <!-- Brand -->
        <div class="form-group">
            <label for="brand_id" class="form-label">Brand</label>
            <div class="select-wrapper">
                {{-- <select id="brand_id" name="brand_id" class="form-control custom-select">
                    <option value="">Select Brand...</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ isset($product) && $product->brand_id == $brand->id ? 'selected' : (old('category_id') == $brand->id ? 'selected' : '') }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select> --}}

                <x-brand-dropdown name="brand_id" id="brand_id" :product="$product ?? null" />
                @error('brand_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <!-- Section: Pricing & Inventory -->
    <div class="mb-1 pt-1 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Pricing & Inventory</h3>
        <p class="text-xs text-secondary">Manage cost, stock, and status.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-3 mb-2">
        <!-- Regular Price -->
        <div class="form-group">
            <label for="regular_price" class="form-label">Regular Price ($)</label>
            <input id="regular_price" name="regular_price" type="number" placeholder="0.00" class="form-control"
                value="{{ $product->regular_price ?? '' }}" />

        </div>

        <!-- Sale Price -->
        <div class="form-group">
            <label for="sale_price" class="form-label">Sale Price ($)</label>
            <input id="sale_price" name="sale_price" type="number" placeholder="0.00" class="form-control"
                value="{{ $product->sale_price ?? '' }}" />

        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-3 mb-3">
        <!-- SKU -->
        <div class="form-group">
            <label for="sku" class="form-label">SKU</label>
            <input id="sku" name="sku" type="text" placeholder="e.g. WH-001" class="form-control"
                value="{{ $product->sku ?? '' }}" />

        </div>

        <!-- Stock Quantity -->
        <div class="form-group">
            <label for="stock_quantity" class="form-label">Stock Quantity</label>
            <input id="stock_quantity" name="stock_quantity" type="number" placeholder="0" class="form-control"
                value="{{ $product->stock_quantity ?? '' }}" />

        </div>

        <!-- Stock Status -->
        <div class="form-group">
            <label for="stock_status" class="form-label">Stock Status</label>
            <div class="select-wrapper">
                <select id="stock_status" name="stock_status" class="form-control custom-select">
                    <option value="instock"
                        {{ ($product->stock_status ?? 'instock') == 'instock' ? 'selected' : '' }}>In Stock</option>
                    <option value="outofstock" {{ ($product->stock_status ?? '') == 'outofstock' ? 'selected' : '' }}>
                        Out of Stock</option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-3 mb-3">
        <!-- Featured -->
        <div class="form-group">
            <label for="featured" class="form-label">Featured</label>
            <div class="select-wrapper">
                <select id="featured" name="featured" class="form-control custom-select">
                    <option value="no" {{ ($product->featured ?? 'no') == 'no' ? 'selected' : '' }}>No</option>
                    <option value="yes" {{ ($product->featured ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status" class="form-label">Publish Status</label>
            <div class="select-wrapper">
                <select id="status" name="status" class="form-control custom-select">
                    <option value="draft" {{ ($product->status ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft
                    </option>
                    <option value="active" {{ ($product->status ?? '') == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="inactive" {{ ($product->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive
                    </option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <!-- Section: Descriptions -->
    <div class="mb-1 pt-1 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Descriptions</h3>
        <p class="text-xs text-secondary">Short and detailed information.</p>
    </div>

    <div class="form-group mb-2">
        <label for="short_description" class="form-label">Short Description</label>
        <input id="short_description" name="short_description" type="text" placeholder="Brief summary..."
            class="form-control" value="{{ $product->short_description ?? '' }}" />

    </div>

    <div class="form-group mb-3">
        <label for="description" class="form-label">Detailed Description</label>
        <textarea id="description" name="description" rows="5" class="form-control"
            placeholder="Full product details...">{{ $product->description ?? '' }}</textarea>

    </div>

    <!-- Section: Media -->
    <div class="mb-1 pt-1 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Media</h3>
        <p class="text-xs text-secondary">Thumbnail and gallery images.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-3 mb-3">
        <!-- Thumbnail -->
        <div class="form-group">
            <label for="thumbnail" class="form-label">Main Thumbnail</label>
            <div class="mt-1 mb-4">
                @if (isset($product) && $product->thumbnail)
                    <img src="{{ asset('storage/' . $product->thumbnail) }}"
                        class="w-32 h-32 object-cover rounded-xl border border-white/10" />
                @else
                    <div
                        class="w-32 h-32 bg-white/5 rounded-xl border border-dashed border-white/10 flex items-center justify-center">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>
            <input id="thumbnail" name="thumbnail" type="file" class="form-control" accept="image/*" />
            <p class="text-xs text-secondary mt-1">Recommended: 800x800px. JPG, PNG. Max 2MB.</p>

        </div>

        <!-- Gallery Images -->
        <div class="form-group">
            <label for="images" class="form-label">Gallery Images</label>
            <div class="mt-1 mb-4">
                @if (isset($product) && $product->images->count() > 0)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}"
                                class="w-16 h-16 object-cover rounded-lg border border-white/10" />
                        @endforeach
                    </div>
                @else
                    <div
                        class="w-full h-32 bg-white/5 rounded-xl border border-dashed border-white/10 flex items-center justify-center">
                        <span class="text-xs text-secondary">No gallery images</span>
                    </div>
                @endif
            </div>
            <input id="images" name="images[]" type="file" multiple class="form-control" accept="image/*" />
            <p class="text-xs text-secondary mt-1">Select multiple images if needed. Max 2MB each.</p>

        </div>
    </div>
</div>

<script>
    document.getElementById('name').addEventListener('input', function() {
        if (!document.getElementById('slug').value || this.dataset.sync === 'true') {
            let name = this.value;
            let slug = name.toLowerCase()
                .replace(/[^\w\s-]/g, '') // Remove non-word chars
                .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with -
                .replace(/^-+|-+$/g, ''); // Trim - from ends
            document.getElementById('slug').value = slug;
            this.dataset.sync = 'true';
        }
    });

    document.getElementById('slug').addEventListener('input', function() {
        document.getElementById('name').dataset.sync = 'false';
    });
</script>
