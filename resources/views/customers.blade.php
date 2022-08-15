@extends('parent')
@section('content')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper"style="margin-right: 0">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> نجاح</h5>
        تم اضافة زبون بنجاح
      </div>
@endif
@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> فشل</h5>
    الزبون لديه معملات مسجلة لا يمكن حذفه
  </div>

@endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
                <div class="row" style="direction: rtl">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h4>الزبائن</h4>

                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                         <div class="col-sm-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                        <tr>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">الاسم </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">اسم السلخانة</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">المدينة </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">رقم الهاتف</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">عدد العمليات </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">اجمالي العمليات</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">تاريخ الإضافة</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $customer as $customer )
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$customer->customer_name}}</td>
                                <td>{{$customer->salakhana}}</td>
                                <td>{{$customer->city}}</td>
                                <td>{{$customer->phone_number}}</td>
                                <td>{{count($customer->fatoras)}}</td>
                                <td>{{$customer->total}}</td>
                                <td>{{$customer->created_at}}</td>
                                <td><a href="" data-toggle="modal" data-target="#edit_form{{$customer->id}}"><i class="fas fa-edit" style="font-size: 34px;"></i></a>

                                    <div class="modal fade" id="edit_form{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_form{{$customer->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="edit_form{{$customer->id}}Label">تعديل فاتورة الشراء</h5>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{route('customer.update',$customer->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">اسم الزبون</label>
                                                  <input type="text" required name="customer_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم المورد" value="{{$customer->customer_name}}">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">اسم السلخانة </label>
                                                  <input type="text" required name="salakhana" class="form-control" id="exampleInputPassword1" placeholder="اسم السلخانة" value="{{$customer->salakhana}}">
                                                </div>
                                                <div class="form-group" data-select2-id="29">
                                                    <label>City</label>
                                                    <select required name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                            @foreach ($cities as $city )
                                                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputtext1">رقم الهاتف</label>
                                                  <input type="text" required name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف" value="{{$customer->phone_number}}">
                                                </div>
                                                <button type="submit" class="btn btn-warning btn-block">حفظ التعديل </button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                <td>
                                     <form method="POST" action="{{route('customer.destroy', $customer->id)}}" onsubmit="return confirm('هل أنت متأكد من حذف الزبون');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                              </td>
                              <td>
                                <a  data-toggle="modal" class="btn btn-info" data-target="#report{{$customer->id}}">
                                    تقرير المورد <i class="fas fa-eye"></i>
                                </a>
                                <div class="modal fade" id="report{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="report{{$customer->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="report{{$customer->id}}Label">طلب تقرير</h5>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('customer_report')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$customer->id}}" name="customer_id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">اسم الزبون</label>
                                                <input type="text" required name="customer_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم المورد" value="{{$customer->customer_name}}">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword1">اسم السلخانة </label>
                                                <input type="text" required name="salakhana" class="form-control" id="exampleInputPassword1" placeholder="اسم السلخانة" value="{{$customer->salakhana}}">
                                              </div>
                                            <div class="form-group">
                                                <label for="exampleInputtext1">بداية الفترة</label>
                                                <input type="date" required name="date_from" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="تاريخ الفاتورة">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputtext1">نهاية الفترة</label>
                                                <input type="date" required name="date_to" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="تاريخ الفاتورة">
                                              </div>
                                            <button type="submit" class="btn btn-info btn-block"> تنفيذ الطلب   </button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </td>
                              </tr>
                            @endforeach
                       </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection
