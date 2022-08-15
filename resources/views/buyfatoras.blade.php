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
                        <h4>فواتير البيع</h4>

                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                         <div class="col-sm-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                        <tr>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">الاسم </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">السلخانة</th>
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
                            @foreach ( $buyfatora as $buyfatora )
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$buyfatora->customer->customer_name}}</td>
                                <td>{{$buyfatora->salakhana}}</td>
                                <td>{{$buyfatora->city}}</td>
                                <td>{{$buyfatora->phone_number}}</td>
                                <td>{{$buyfatora->quantity}}</td>
                                <td>{{$buyfatora->quantity_type}}</td>
                                <td>{{$buyfatora->total}}</td>
                                <td>{{$buyfatora->buy_date}}</td>
                                <td><a href="" data-toggle="modal" data-target="#edit_form{{$buyfatora->id}}"><i class="fas fa-edit" style="font-size: 34px;"></i></a>

                                    <div class="modal fade" id="edit_form{{$buyfatora->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_form{{$buyfatora->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="edit_form{{$buyfatora->id}}Label">تعديل فاتورة الشراء</h5>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{route('buyfatora.update',$buyfatora->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">اسم الزبون </label>
                                                  <input type="text" required name="customer_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم الزبون" value="{{$buyfatora->name}}">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">اسم السلخانة </label>
                                                  <input type="text" name="hazera_name" class="form-control" id="exampleInputPassword1" placeholder="اسم السلخانة" value="{{$buyfatora->salakhana}}">
                                                </div>
                                                <div class="form-group" data-select2-id="29">
                                                    <label>City</label>
                                                    <select required name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                      <option data-select2-id="3">Alabama</option>
                                                      <option data-select2-id="35">Alaska</option>
                                                      <option data-select2-id="36">California</option>
                                                      <option data-select2-id="37">Delaware</option>
                                                      <option data-select2-id="38">Tennessee</option>
                                                      <option data-select2-id="39">Texas</option>
                                                      <option data-select2-id="40">Washington</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputtext1">رقم الهاتف</label>
                                                  <input type="text" required name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف" value="{{$buyfatora->phone_number}}">
                                                </div>
                                                <div class="form-group" style="display: inline;">
                                                  <label for="exampleInputtext1">الكمية</label>
                                                  <input type="text" required name="quantity" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="الكمية" value="{{$buyfatora->quantity}}">
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-radio" style="display: inline">
                                                        <input class="custom-control-input" required type="radio" id="customRadio1" name="quantity_type" value="pieces">
                                                        <label for="customRadio1"  class="custom-control-label">بالقطعة</label>
                                                      </div>
                                                      <div class="custom-control custom-radio" style="display: inline">
                                                        <input class="custom-control-input" required type="radio" id="customRadio" name="quantity_type" value="kilo">
                                                        <label for="customRadio" class="custom-control-label">بالكيلو </label>
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputtext1">إجمالي الفاتورة</label>
                                                  <input type="text" required name="total" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="إجمالي الفاتورة" value="{{$buyfatora->total}}">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputtext1">تاريخ البيع</label>
                                                  <input type="text" required name="buy_date" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="تاريخ الشراء" value="{{$buyfatora->buy_date}}">
                                                </div>
                                                <button type="submit" class="btn btn-warning btn-block">حفظ التعديل </button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                <td>
                                     <form method="POST" action="{{route('buyfatora.destroy', $buyfatora->id)}}" onsubmit="return confirm('هل أنت متأكد من حذف الفاتورة');">
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
