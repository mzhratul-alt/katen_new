@extends('layouts.backend_master')

@section('main_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h3 class="mb-20">All Posts</h3>
            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>F. Image</h6>
                            </th>
                            <th>
                                <h6>Title</h6>
                            </th>
                            <th>
                                <h6>Author</h6>
                            </th>
                            <th>
                                <h6>Category</h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                            <th>
                                <h6>Is Featured?</h6>
                            </th>
                            <th>
                                <h6>Created At</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr>
                            <td class="min-width">
                                <img class="img-thumbnail" src="{{ asset('storage/posts/' . $post->featured_image) }}"
                                    alt="" width="60">
                            </td>
                            <td class="min-width">
                                <p>{{ limit_my_string($post->title,10) }}</p>
                            </td>
                            <td class="min-width">
                                <p>{{ $post->user->name }}</p>
                            </td>
                            <td class="min-width">
                                <p>{{ $post->category->name }}</p>
                            </td>
                            <td class="min-width">
                                <div class="form-check form-switch toggle-switch">
                                    <input class="form-check-input change_status" type="checkbox" {{ $post->status ?
                                    'checked' : '' }} data-post-id="{{ $post->id }}">
                                </div>
                            </td>
                            <td class="min-width">
                                <a href="{{ route('post.change_featured', $post->id) }}"
                                    class="post_featured_btn main-btn {{ $post->is_featured ? 'warning' : 'light' }}-btn btn-hover btn-sm" data-post-id="{{ $post->id }}">
                                    <i class="lni lni-star-{{ $post->is_featured ? 'fill' : 'empty' }}"></i>
                                </a>
                            </td>
                            <td class="min-width">
                                <p>{{ formatMyDate($post->created_at) }}</p>
                            </td>
                            <td>
                                <div class="action">
                                    <button class="text-info">
                                        <i class="lni lni-eye"></i>
                                    </button>
                                    <button class="text-warning">
                                        <i class="lni lni-pencil-alt"></i>
                                    </button>
                                    <button class="text-danger">
                                        <i class="lni lni-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- end table row -->
                        @empty
                        <tr>
                            <td>
                                <div class="alert alert-danger">No Post Found!</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@push('additional-js')
<script src="{{ asset('backend/assets/js/sweetalert2@11.js') }}"></script>
<script>
    const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });



        $('.change_status').on('change', function() {
            $.ajax({
                url: "{{ route('post.change_status') }}",
                method: "GET",
                data: {
                    post_id: $(this).data('post-id')
                },
                success: function() {
                    Toast.fire({
                        icon: "success",
                        title: "Status changed successfully."
                    });
                }
            })
        })

</script>
@endpush
