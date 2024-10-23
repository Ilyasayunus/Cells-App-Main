<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @if (Request::is('admin/indikator'))
                    <h1 class="m-0">{{ $title }}</h1>
                @elseif(Request::is('admin/indikator*'))
                    <h1 style="text-align: center" class="m-0">{{ $title }}</h1>
                @else
                    <h1 class="m-0">{{ $title }}</h1>
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol> --}}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
