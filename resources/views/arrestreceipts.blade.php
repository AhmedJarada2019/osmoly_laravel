@extends('parent')
@section('content')
<div class="container" style="direction: rtl">
    <div class="row d-flex justify-content-center mt-5">
        <h2>انشاء ايصال قبض </h2>
    </div>
    <div class="row d-flex justify-content-center mt-3" >
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">ايصال القبض</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('arrestreceipts.index')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">اسم الزبون  </label>
                    <select required name="customer_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        @foreach ($customers as $customer )
                            <option value="{{$customer->id}}">{{$customer->customer_name}} - {{$customer->salakhana}}</option>
                        @endforeach
                       </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">قيمة الايصال </label>
                    <input name="amount" type="number" class="form-control" id="exampleInputPassword1" placeholder="قيمة الايصال">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">إنشاء</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <h2> ايصالات القبض </h2>
    </div>
    <div class="row mt-5" id="toprint">
        <div class="col-sm-12">
            <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
          <thead>
          <tr>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">اسم الزبون</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">الدفعة </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">باقي حساب</th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> التاريخ </th>
           </tr>
          </thead>
          <tbody>
          @foreach($ArrestReceipts as $ArrestReceipt)
          <tr>
          <td>{{ $ArrestReceipt->customer->customer_name }} - {{ $ArrestReceipt->customer->salakhana }}  </td>
          <td>{{ $ArrestReceipt->amount }}</td>
          <td>{{ $ArrestReceipt->customer->total }}</td>
          <td>{{ $ArrestReceipt->created_at }}</td>

      </tr>
              @endforeach
              <tr>
                  <td colspan="5">
                      <button class="btn btn-info " id="pp" onclick="printpart()"> طباعة الايصالات</button>
                  </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
