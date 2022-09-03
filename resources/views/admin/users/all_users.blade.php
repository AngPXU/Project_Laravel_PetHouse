@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Người dùng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Người dùng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo "<h4><strong>Thông báo:</strong>&nbsp;$message</h4>";
                                    Session::put('message',null);
                                }
                            ?>
                        </h4>
                        <div class="card-header-action">
                            <a href="{{URL::to('/add-brand-product')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm loại thú cưng
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số ĐT</th>
                                        <th>Mật khẩu</th>
                                        <th>Admin</th>
                                        <th>Author</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($admin as $key => $user)
                                    @php
                                        $i++;
                                    @endphp
                                    <form action="{{url('/assign-roles')}}" method="post">
                                    @csrf
                                    <tr>
                                        <td style="text-align:center;">{{$i}}</td>
                                        <td style="text-align:center;">{{$user->admin_name}}</td>
                                        <td style="text-align:center;">{{$user->admin_email}}<input type="hidden" name="admin_email" value="{{$user->admin_email}}"></td>
                                        <td style="text-align:center;">{{$user->admin_phone}}</td>
                                        <td style="text-align:center;">{{$user->admin_password}}</td>
                                        {{-- <td>
                                            <input type="checkbox" name="admin_role" class="custom-control-input" {{$user->hasRole('admin') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="author_role" class="custom-control-input" {{$user->hasRole('author') ? 'checked' : ''}}>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="user_role" class="custom-control-input" {{$user->hasRole('admin') ? 'checked' : ''}}>
                                        </td> --}}
                                    </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection