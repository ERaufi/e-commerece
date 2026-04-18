<div class="form-container-stack">
                        <!-- Brand Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Brand Name</label>
                            <input id="name" name="name" type="text" placeholder="e.g. Apple, Nike"
                                class="form-control" value="{{$brand->name??''}}" required />
                        </div>

                        <!-- Slug -->
                        <div class="form-group">
                            <label for="slug" class="form-label">Slug (URL Part)</label>
                            <input id="slug" name="slug" type="text" placeholder="e.g. apple-inc"
                                class="form-control" value="{{$brand->slug??''}}" />
                            <p class="form-hint">Leave empty to auto-generate from name.</p>
                        </div>


                        @if(isset($brand) && $brand->image)
                        <img src="{{asset('storage/'.$brand->image)}}" style="width: 150px"
                        @endif
                        <!-- Image -->
                        <div class="form-group">
                            <label for="image" class="form-label">Brand Image / Logo</label>
                            <input id="image" name="image" type="file" class="form-control" accept="image/*" />
                            <p class="form-hint">Recommended: 400x400px. JPG, PNG. Max 2MB.</p>
                        </div>
                    </div>
