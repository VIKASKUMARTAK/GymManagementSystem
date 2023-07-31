@extends('layout')
@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Booking
                                <a href="{{url('admin/bookings')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                            @endif

                            
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/bookings')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Select Customer <span class="text-danger">*</span></th>
                                            <td>
                                                <select class="form-control" name="user_id">
                                                    <option>--- Select Customer ---</option>
                                                    @foreach($data as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>CheckIn Date <span class="text-danger">*</span></th>
                                            <td><input name="checkin_date" type="date" class="form-control checkin-date" /></td>
                                        </tr>
                                        <tr>
                                            <th>CheckOut Date <span class="text-danger">*</span></th>
                                            <td><input name="checkout_date" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>Avaiable Packages <span class="text-danger">*</span></th>
                                            <td>
                                                <select class="form-control package-list" name="package_id">

                                                </select>
                                                <p>Price: <span class="show-package-price"></span></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="hidden" name="packageprice" class="package-price" value="" />
                                                <input type="submit" class="btn btn-primary" />
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            // Ajax
            $.ajax({
                url:"{{url('admin/bookings')}}/available-packages/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".package-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option data-price="'+row.packagetype.price+'" value="'+row.package.id+'">'+row.package.title+'-'+row.packagetype.title+'</option>';
                    });
                    $(".package-list").html(_html);

                    var _selectedPrice=$(".package-list").find('option:selected').attr('data-price');
                    $(".package-price").val(_selectedPrice);
                    $(".show-package-price").text(_selectedPrice);
                }
            });
        });

        $(document).on("change",".package-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".package-price").val(_selectedPrice);
            $(".show-package-price").text(_selectedPrice);
        });

    });
</script>
@endsection

@endsection