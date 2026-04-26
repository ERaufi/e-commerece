<div class="form-container-stack">
                        <!-- Category Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Category Name</label>
                            <input id="name" name="name" type="text" placeholder="e.g. Electronics, Clothing"
                                class="form-control" value="{{$category->name??''}}" required />
                        </div>

                        <!-- Slug -->
                        <div class="form-group">
                            <label for="slug" class="form-label">Slug (URL Part)</label>
                            <input id="slug" name="slug" type="text" placeholder="e.g. electronics, clothing"
                                class="form-control" value="{{$category->slug??''}}" />
                            <p class="form-hint">Leave empty to auto-generate from name.</p>
                        </div>


                        @if(isset($category) && $category->image)
                        <img src="{{asset('storage/'.$category->image)}}" style="width: 150px"
                        @endif
                        <!-- Image -->
                        <div class="form-group">
                            <label for="image" class="form-label">Category Image / Logo</label>
                            <input id="image" name="image" type="file" class="form-control" accept="image/*" />
                            <p class="form-hint">Recommended: 400x400px. JPG, PNG. Max 2MB.</p>
                        </div>
                    </div>
