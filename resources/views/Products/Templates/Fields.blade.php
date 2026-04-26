<div class="form-container-stack">
    <!-- Section: General Info -->
    <div class="mb-4 pt-4 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">General Information</h3>
        <p class="text-xs text-secondary">Basic product details and categorization.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input id="name" name="name" type="text" placeholder="e.g. Wireless Headset" class="form-control"
                value="{{ old('name', $product->name ?? '') }}" required />
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
            @error('slug')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Category -->
        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <div class="select-wrapper">
                <select id="category_id" name="category_id" class="form-control custom-select" required>
                    <option value="" class="bg-mesh">Select Category...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($product) && $product->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}
                            class="bg-mesh">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            @error('category_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Brand -->
        <div class="form-group">
            <label for="brand_id" class="form-label">Brand</label>
            <div class="select-wrapper">
                <select id="brand_id" name="brand_id" class="form-control custom-select" required>
                    <option value="" class="bg-mesh">Select Brand...</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ isset($product) && $product->brand_id == $brand->id ? 'selected' : (old('brand_id') == $brand->id ? 'selected' : '') }}
                            class="bg-mesh">
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            @error('brand_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Section: Pricing & Inventory -->
    <div class="mb-4 pt-4 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Pricing & Inventory</h3>
        <p class="text-xs text-secondary">Manage cost, stock, and status.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-6">
        <!-- Regular Price -->
        <div class="form-group">
            <label for="regular_price" class="form-label">Regular Price ($)</label>
            <input id="regular_price" name="regular_price" type="number" step="0.01" min="0" placeholder="0.00" class="form-control"
                value="{{ old('regular_price', $product->regular_price ?? '') }}" required />
            @error('regular_price')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sale Price -->
        <div class="form-group">
            <label for="sale_price" class="form-label">Sale Price ($)</label>
            <input id="sale_price" name="sale_price" type="number" step="0.01" min="0" placeholder="0.00" class="form-control"
                value="{{ old('sale_price', $product->sale_price ?? '') }}" />
            @error('sale_price')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <!-- SKU -->
        <div class="form-group">
            <label for="sku" class="form-label">SKU</label>
            <input id="sku" name="sku" type="text" placeholder="e.g. WH-001" class="form-control"
                value="{{ old('sku', $product->sku ?? '') }}" />
            @error('sku')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock Quantity -->
        <div class="form-group">
            <label for="stock_quantity" class="form-label">Stock Quantity</label>
            <input id="stock_quantity" name="stock_quantity" type="number" min="0" placeholder="0" class="form-control"
                value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}" />
            @error('stock_quantity')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock Status -->
        <div class="form-group">
            <label for="stock_status" class="form-label">Stock Status</label>
            <div class="select-wrapper">
                <select id="stock_status" name="stock_status" class="form-control custom-select" required>
                    <option value="instock" {{ old('stock_status', $product->stock_status ?? 'instock') == 'instock' ? 'selected' : '' }}
                        class="bg-mesh">In Stock</option>
                    <option value="outofstock" {{ old('stock_status', $product->stock_status ?? '') == 'outofstock' ? 'selected' : '' }}
                        class="bg-mesh">Out of Stock</option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            @error('stock_status')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Featured -->
        <div class="form-group">
            <label for="featured" class="form-label">Featured</label>
            <div class="select-wrapper">
                <select id="featured" name="featured" class="form-control custom-select" required>
                    <option value="no" {{ old('featured', $product->featured ?? 'no') == 'no' ? 'selected' : '' }} class="bg-mesh">No</option>
                    <option value="yes" {{ old('featured', $product->featured ?? '') == 'yes' ? 'selected' : '' }} class="bg-mesh">Yes</option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            @error('featured')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status" class="form-label">Publish Status</label>
            <div class="select-wrapper">
                <select id="status" name="status" class="form-control custom-select" required>
                    <option value="draft" {{ old('status', $product->status ?? 'draft') == 'draft' ? 'selected' : '' }} class="bg-mesh">Draft</option>
                    <option value="active" {{ old('status', $product->status ?? '') == 'active' ? 'selected' : '' }} class="bg-mesh">Active</option>
                    <option value="inactive" {{ old('status', $product->status ?? '') == 'inactive' ? 'selected' : '' }} class="bg-mesh">Inactive
                    </option>
                </select>
                <div class="select-arrow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>
            @error('status')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Section: Descriptions -->
    <div class="mb-4 pt-4 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Descriptions</h3>
        <p class="text-xs text-secondary">Short and detailed information.</p>
    </div>

    <div class="form-group mb-6">
        <label for="short_description" class="form-label">Short Description</label>
        <input id="short_description" name="short_description" type="text" placeholder="Brief summary..." class="form-control"
            value="{{ old('short_description', $product->short_description ?? '') }}" />
        @error('short_description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-8">
        <label for="description" class="form-label">Detailed Description</label>
        <textarea id="description" name="description" rows="5" class="form-control" placeholder="Full product details...">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <!-- Section: Media -->
    <div class="mb-4 pt-4 border-t border-white/5">
        <h3 class="text-lg font-semibold text-white">Media</h3>
        <p class="text-xs text-secondary">Thumbnail and gallery images.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8 mb-8">
        <!-- Thumbnail -->
        <div class="form-group">
            <label for="thumbnail" class="form-label">Main Thumbnail</label>
            <div class="mt-1 mb-4">
                @if (isset($product) && $product->thumbnail)
                    <img src="{{ asset('storage/' . $product->thumbnail) }}" class="w-32 h-32 object-cover rounded-xl border border-white/10" />
                @else
                    <div class="w-32 h-32 bg-white/5 rounded-xl border border-dashed border-white/10 flex items-center justify-center">
                        <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>
            <input id="thumbnail" name="thumbnail" type="file" class="form-control" accept="image/*" />
            <p class="text-xs text-secondary mt-1">Recommended: 800x800px. JPG, PNG. Max 2MB.</p>
            @error('thumbnail')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gallery Images -->
        <div class="form-group">
            <label for="images" class="form-label">Gallery Images</label>
            <div class="mt-1 mb-4">
                @if (isset($product) && $product->images->count() > 0)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($product->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" class="w-16 h-16 object-cover rounded-lg border border-white/10" />
                        @endforeach
                    </div>
                @else
                    <div class="w-full h-32 bg-white/5 rounded-xl border border-dashed border-white/10 flex items-center justify-center">
                        <span class="text-xs text-secondary">No gallery images</span>
                    </div>
                @endif
            </div>
            <input id="images" name="images[]" type="file" multiple class="form-control" accept="image/*" />
            <p class="text-xs text-secondary mt-1">Select multiple images if needed. Max 2MB each.</p>
            @error('images.*')
                <p class="form-error">{{ $message }}</p>
            @enderror
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
