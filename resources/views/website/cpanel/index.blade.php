@extends('website.cpanel.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="col-xl-12 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Danh sách sản phẩm
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-more-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">
                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Export Options
                                    <span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                            class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24" />
                                                <circle id="Oval-5" fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                <rect id="Rectangle-9" fill="#000000" x="11" y="10" width="2" height="7"
                                                    rx="1" />
                                                <rect id="Rectangle-9-Copy" fill="#000000" x="11" y="7" width="2" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg> </span>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Activity</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">FAQ</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                        <span class="kt-nav__link-text">Settings</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip"
                                        data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>
                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <table class="table">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>images</th>
                                    <th>slug</th>
                                    <th colspan="2">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ number_format($product->price) }} đ</td>
                                        <td>{{ $product->cate_id }}</td>
                                        <td><img src="{{ $product->images }}" width="100px" alt=""></td>
                                        <td>{{ $product->slug }}</td>
                                        <td>
                                            <form class="delete-topic-form"
                                                action="{{ route('cpanel.delete', $product->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return false" class="btn btn-danger delete"><i id="delete"
                                                        class="la la-trash" style="padding-right: 0"></i></button>
                                            </form>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>

                <!--end::Section-->


            </div>

        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.delete').forEach((ee, index) => {
            ee.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.delete-topic-form')[index].submit();
                // Swal.fire({
                //     title: 'Bạn có chắc không ?',
                //     text: "Bạn sẽ không thể hoàn nguyên hành động này!",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         document.querySelectorAll('.delete-topic-form')[index].submit();
                //     }
                // })
            });
        });
    </script>
@endsection
