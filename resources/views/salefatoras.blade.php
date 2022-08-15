@extends('parent')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="margin-right: 0">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
                <div class="row" style="direction: rtl">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h4>فواتير الشراء</h4>

                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                         <div class="col-sm-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                        <tr>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">الاسم </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">الحظيرة</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">المدينة </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">رقم الهاتف</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">الكمية</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">كيلو/ قطعة</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">الاجمالي</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">تاريخ البيع</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $salefatoras as $salefatoras )
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$salefatoras->vendor->vendor_name}}</td>
                                <td>{{$salefatoras->hazera_name}}</td>
                                <td>{{$salefatoras->city}}</td>
                                <td>{{$salefatoras->phone_number}}</td>
                                <td>{{$salefatoras->quantity}}</td>
                                <td>{{$salefatoras->quantity_type}}</td>
                                <td>{{$salefatoras->total}}</td>
                                <td>{{$salefatoras->sale_date}}</td>
                                <td><a href="" data-toggle="modal" data-target="#edit_form{{$salefatoras->id}}"><i class="fas fa-edit" style="font-size: 34px;"></i></a>

                                    <div class="modal fade" id="edit_form{{$salefatoras->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_form{{$salefatoras->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="edit_form{{$salefatoras->id}}Label">تعديل فاتورة الشراء</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('salefatora.update',$salefatoras->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group" data-select2-id="29">
                                                        <label>اسم المورد </label>
                                                        <select required name="vendor_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                         @foreach ($vendors as $vendor )
                                                         <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                                                         @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputPassword1">اسم الحظيرة </label>
                                                      <input type="text"  name="hazera_name" class="form-control" id="exampleInputPassword1" placeholder="اسم الحظيرة" value="{{$salefatoras->hazera_name}}">
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
                                                      <input type="text" required name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف" value="{{$salefatoras->phone_number}}">
                                                    </div>
                                                    <div class="form-group" style="display: inline;">
                                                      <label for="exampleInputtext1">الكمية</label>
                                                      <input type="text" required name="quantity" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="الكمية" value="{{$salefatoras->quantity}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio" style="display: inline">
                                                            <input class="custom-control-input" @if ($salefatoras->quantity_type == 'pieces') checked @endif  required type="radio" id="customRadio1" name="quantity_type" value="pieces">
                                                            <label for="customRadio1"  class="custom-control-label">بالقطعة</label>
                                                          </div>
                                                          <div class="custom-control custom-radio" style="display: inline">
                                                            <input class="custom-control-input" @if ($salefatoras->quantity_type == 'kilo') checked @endif required type="radio" id="customRadio" name="quantity_type" value="kilo">
                                                            <label for="customRadio" class="custom-control-label">بالكيلو </label>
                                                          </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputtext1">إجمالي الفاتورة</label>
                                                      <input type="text" required name="total" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="إجمالي الفاتورة" value="{{$salefatoras->total}}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputtext1">تاريخ الشراء</label>
                                                      <input type="text" required name="sale_date" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="تاريخ الشراء" value="{{$salefatoras->sale_date}}">
                                                    </div>
                                                    <button type="submit" class="btn btn-warning btn-block">حفظ التعديل </button>
                                                  </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                <td>
                                     <form method="POST" action="{{route('salefatora.destroy', $salefatoras->id)}}" onsubmit="return confirm('هل أنت متأكد من حذف الفاتورة');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
