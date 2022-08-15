@extends('parent')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-right: 0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">لوحة التحكم</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($payments)}}</h3>
                <p>إيصال دفع </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('paymentreceipts.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($arrests)}}</h3>
                <p>إيصال قبض </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('arrestreceipts.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($customers)}}</h3>

                <p>الزبائن - سلخانة</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('customer.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{count($vendors)}}</h3>

                <p>الموردين - الحظائر</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('vendor.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
                <div class="row">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role= "alert">
                        <strong>تم اضافة فاتورة بنجاح </strong>
                    </div>
                @endif
                  <div class="card w-100" style="direction: rtl;">
                    <div class="card-header">
                      <h3 class="card-title" >الفواتير المضافة</h3>
                      <a href="#" class="btn btn-sm btn-tool" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-download"> اضافة فاتورة شراء</i>
                      </a>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" style="width: 160%">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">اضافة فاتورة شراء</h5>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('fatoras.store')}}" method="POST">
                                @csrf
                                @method('POST')
                               <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-select2-id="29">
                                        <label>اسم المورد </label>
                                        <select required name="vendor_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                         @foreach ($vendors as $vendor )
                                         <option value="{{$vendor->id}}">{{$vendor->vendor_name}} - {{$vendor->hazera}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">اسم الحظيرة </label>
                                      <select required name="hazera_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach ($vendors as $vendor )
                                      <option value="{{$vendor->hazera}}">{{$vendor->hazera}}</option>
                                      @endforeach
                                      </select>
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
                                      <input type="text" required name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="form-group" style="display: inline;">
                                      <label for="exampleInputtext1">الكمية</label>
                                      <input type="text" required name="quantity" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="الكمية">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">سعر الشراء </label>
                                        <input type="text" name="buy_price" class="form-control" id="exampleInputPassword1" placeholder="سعر الشراء">
                                      </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio" style="display: inline">
                                            <input class="custom-control-input" required type="radio" id="customRadio1" name="buy_q_type" value="pieces">
                                            <label for="customRadio1"  class="custom-control-label">بالقطعة</label>
                                          </div>
                                          <div class="custom-control custom-radio" style="display: inline">
                                            <input class="custom-control-input" required type="radio" id="customRadio" name="buy_q_type" value="kilo">
                                            <label for="customRadio" class="custom-control-label">بالكيلو </label>
                                          </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" data-select2-id="29">
                                        <label>اسم الزبون </label>
                                        <select required name="customer_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                         @foreach ($customers as $customer )
                                         <option value="{{$customer->id}}">{{$customer->customer_name}} - {{$customer->salakhana}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">اسم السلخانة </label>
                                        <select required name="salakhana" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            @foreach ($customers as $customer )
                                            <option value="{{$customer->salakhana}}">{{$customer->salakhana}}</option>
                                            @endforeach
                                           </select>
                                    </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">سعر البيع </label>
                                        <input type="text" name="sale_price" class="form-control" id="exampleInputPassword1" placeholder="سعر البيع">
                                      </div>
                                      <div class="form-group">
                                        <div class="custom-control custom-radio" style="display: inline">
                                            <input class="custom-control-input" required type="radio" id="customRadio6" name="sale_q_type" value="pieces">
                                            <label for="customRadio6"  class="custom-control-label">بالقطعة</label>
                                          </div>
                                          <div class="custom-control custom-radio" style="display: inline">
                                            <input class="custom-control-input" required type="radio" id="customRadio5" name="sale_q_type" value="kilo">
                                            <label for="customRadio5" class="custom-control-label">بالكيلو </label>
                                          </div>
                                    </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">مصاريف اضافية </label>
                                        <input type="text" name="extra_cost" class="form-control" id="exampleInputPassword1" placeholder="مصاريف اضافية">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputtext1">تاريخ الفاتورة</label>
                                        <input type="date" required name="sale_date" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="تاريخ الفاتورة">
                                      </div>
                               </div>
                                <button type="submit" class="btn btn-success btn-block">إضافة</button>
                               </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <a href="#" class="btn btn-sm btn-tool" data-toggle="modal" data-target="#exampleModal2">
                        <i class="fas fa-download">اضافة زبون</i>
                      </a>
                      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModal2Label">اضافة زبون</h5>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="{{route('customer.store')}}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">اسم الزبون</label>
                                  <input type="text" name="customer_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم الزبون">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">اسم السلخانة </label>
                                  <input type="text" name="salakhana" class="form-control" id="exampleInputPassword1" placeholder="اسم السلخانة">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputtext1">المدينة</label>
                                  <select required name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($cities as $city )
                                    <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>                                </div>
                                <div class="form-group">
                                  <label for="exampleInputtext1">رقم الهاتف</label>
                                  <input type="text" name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">اضافة زبون</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a href="#" class="btn btn-sm btn-tool" data-toggle="modal" data-target="#exampleModal3">
                        <i class="fas fa-download">اضافة مورد</i>
                      </a>
                      <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModal3Label">اضافة مورد</h5>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('vendor.store')}}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">اسم المورد</label>
                                  <input type="text" name="vendor_name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="اسم المورد">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">اسم الحظيرة </label>
                                  <input type="text" name="hazera" class="form-control" id="exampleInputPassword1" placeholder="اسم الحظيرة">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputtext1">المدينة</label>
                                  <select required name="city" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($cities as $city )
                                    <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                  <label for="exampleInputtext1">رقم الهاتف</label>
                                  <input type="text" name="phone_number" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="رقم الهاتف">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">إضافة</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                         <div class="col-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                            <thead>
                            <tr>
                            <th  >اسم المورد  </th>
                            <th  >الحظيرة </th>
                            <th  >المدينة </th>
                            <th  >رقم الهاتف</th>
                            <th  >الكمية</th>
                            <th  >سعر الشراء </th>
                            <th  >نوع الشراء </th>
                            <th  >اسم الزبون  </th>
                            <th  >السلخانة</th>
                            <th  >سعر البيع  </th>
                            <th  >نوع البيع</th>
                            <th  >تكلفة اضافية</th>
                            <th  >اجمالي فاتورة الشراء</th>
                            <th>اجمالي فاتورة البيع</th>
                            <th>تاريخ المعاملة</th> <th>تاريخ المعاملة</th>
                            </tr>
                            </thead>
                        <tbody>
                        @foreach ($fatoras as $fatora)
                        <tr class="odd">
                            <td>{{$fatora->vendor->vendor_name}}</td>
                            <td>{{$fatora->hazera_name}}</td>
                            <td>{{$fatora->city}}</td>
                            <td>{{$fatora->phone_number}}</td>
                            <td>{{$fatora->quantity}}</td>
                            <td>{{$fatora->buy_price}}</td>
                            <td>{{$fatora->buy_q_type}}</td>
                            <td>{{$fatora->customer->customer_name}}</td>
                            <td>{{$fatora->salakhana}}</td>
                            <td>{{$fatora->sale_price}}</td>
                            <td>{{$fatora->sale_q_type}}</td>
                            <td>{{$fatora->extra_cost}}</td>
                            <td>{{$fatora->total_buy}}</td>
                            <td>{{$fatora->total_sale}}</td>
                            <td>{{$fatora->sale_date}}</td>
                            <td>
                            <form method="POST" action="{{route('fatoras.destroy', $fatora->id)}}" onsubmit="return confirm('هل أنت متأكد من حذف الفاتورة');">
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
  </div>
  @endsection
