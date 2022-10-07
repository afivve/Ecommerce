@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            @error('name')
                            <small class="text-danger">{{ ($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                            @error('slug')
                            <small class="text-danger">{{ ($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ ($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="image">Image</label>
                            <img src="{{ asset('uploads/category/'.$category->image) }}" width="60px" height="60px">
                            <input type="file" name="image" class="form-control">
                            @error('image')
                            <small class="text-danger">{{ ($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="status">Status</label></br>
                            <input type="checkbox" name="status" value="{{ $category->status == '1' ? 'checked': '' }}">
                            @error('status')
                            <small class="text-danger">{{ ($message) }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <textarea name="meta_title" class="form-control" rows="3">{{ $category->meta_title }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection