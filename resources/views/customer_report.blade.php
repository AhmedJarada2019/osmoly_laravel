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
                        <h4>تقرير زبون </h4>
                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                         <div class="col-sm-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                        <tr>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">اسم السلخانة</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">الكمية </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> التاريخ </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">سعر البيع </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> اجمالي الفاتورة </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fatora as $fatora)
                        <tr>
                        <td>{{ $fatora->salakhana }}</td>
                        <td>{{ $fatora->quantity }}</td>
                        <td>{{ $fatora->sale_date }}</td>
                        <td>{{ $fatora->sale_price }}</td>
                        <td>{{ $fatora->total_sale }}</td>
                    </tr>
                            @endforeach
                            <tr class="text-bold">
                                <td colspan="4">الاجمالي</td>
                                <td>{{$sum_total}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <button class="btn btn-info " id="ss"> طباعة التقرير</button>
                                </td>
                            </tr>
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
