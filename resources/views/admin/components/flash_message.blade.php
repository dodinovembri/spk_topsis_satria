@if(session()->has('message'))
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="icon-tick"></i> {{ session()->get('message') }}
    </div>
</div>
@endif
@if(session()->has('error'))
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="icon-warning2"></i>{{ session()->get('error') }}
    </div>
</div>
@endif